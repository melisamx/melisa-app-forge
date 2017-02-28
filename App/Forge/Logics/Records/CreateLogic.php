<?php namespace App\Forge\Logics\Records;

use App\Forge\Logics\Connections\HelperLogic;
use App\Forge\Logics\Columns\PagingLogic;
use Melisa\core\LogicBusiness;

/**
 * Create record on table
 *
 * @author Luis Josafat Heredia Contreras
 */
class CreateLogic
{
    use LogicBusiness;
    
    protected $helperConnection;
    protected $columnsTable;
    
    public function __construct(HelperLogic $helperConnection, PagingLogic $columnsTable)
    {
        $this->helperConnection = $helperConnection;
        $this->columnsTable = $columnsTable;
    }
    
    public function init($keyConnection, $database, $table, $input = [])
    {
        
        $flyConnection = $this->helperConnection->getFlyConnectionByKey($keyConnection, $database);
        
        if( !$flyConnection) {
            return false;
        }
        
        $columns = $this->getColumns($flyConnection, $database, $table);
        
        if( !$columns) {
            return false;
        }
        
        $input = $this->getValidateInput($input, $columns);
        
        if( !$input) {
            return false;
        }
        
        $flyConnection->beginTransaction();
        
        $id = $this->createRecord($flyConnection, $table, $input);
        
        if( $id === false) {
            return false;
        }
        
        $event = [
            'id'=>$id,
            'keyConnection'=>$keyConnection,
            'database'=>$database,
            'table'=>$table,
        ];
        
        if( !$this->emitEvent('records.create.success', $event)) {
            return $flyConnection->commit();
        }
        
        $flyConnection->commit();
        return $event;
        
    }
    
    public function createRecord($flyConnection, $table, $input)
    {
        
        $id = $flyConnection
                ->table($table)
                ->insertGetId($input);
        
        if( $id === false) {
            return false;
        }
        
        if (isset($input['id']) && !empty($input['id'])) {
            return $id;
        }
        
        return $id;
        
    }
    
    public function getValidateInput(&$input, &$columns)
    {
        
        $validations = [];
        
        foreach($columns as $column) {
            
            if( $column['columnName'] === 'idIdentityCreated') {
                $input ['idIdentityCreated']= $this->getIdentity();
            }
            
            if( in_array($column['columnName'], [
                'idIdentityUpdated'
                ])) {
                continue;
            }
            
            if( $column['columnName'] === 'createdAt' && isset($column['defaultValue']) 
                && !is_null($column['defaultValue'])) {
                continue;
            }
            
            if( $column['isPrimaryKey'] && $column['maxLength'] == 36 && 
                    $column['columnName'] === 'id') {
                $input ['id']= app('uuid')->v5();
                continue;
            }
            
            /**
             * ignore primary key
             * autoincrement and uuid
             */
            if( $column['isAutoIncrement'] || (
                $column['isPrimaryKey'] && in_array($column['dataType'], [
                    'smallint',
                    'int'
                ]) && $column['isAutoIncrement']
                )) {
                continue;
            }
            
            $validations [$column['columnName']]= [
                'bail',
                /* Pending XSS validation */
//                'xss',
            ];
            
            if($column['required']) {
                $validations [$column['columnName']][]= 'required';
            } else {
                $validations [$column['columnName']][]= 'sometimes';
            }
            
            if( $column['dataType'] === 'tinyint' 
                    && isset($input[$column['columnName']]) 
                    && $input[$column['columnName']] === 'on') {
                $input [$column['columnName']]= true;
            }
            
        }
        
        $validator = validator()->make($input, $validations);
        
        if( $validator->fails()) {
            return $this->setErrors($validator);
        }
        
        return $input;
        
    }
    
    public function setErrors(&$validator)
    {
        
        foreach($validator->errors()->toArray() as $field => $error) {
            $this->error($field . ' is invalid: '. implode(',', $error));
        }
        return false;
        
    }
    
    public function getColumns($flyConnection, $database, $table)
    {
        
        $modelConnection = $this->helperConnection->getModelConnection();
        
        $columns = $this->columnsTable->init([
            'idConnection'=>$modelConnection->id,
            'database'=>$database,
            'table'=>$table
        ]);
        
        if( !$columns) {
            return false;
        }
        
        if( !count($columns['data'])) {
            return [];
        }
        
        return $columns['data'];
        
    }
    
}
