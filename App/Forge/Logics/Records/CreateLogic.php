<?php namespace App\Forge\Logics\Records;

use App\Forge\Logics\Connections\HelperLogic;
use App\Forge\Logics\Columns\PagingLogic;

/**
 * Create record on table
 *
 * @author Luis Josafat Heredia Contreras
 */
class CreateLogic
{
    
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
        
        return $this->createRecord($flyConnection, $table, $input);
        
    }
    
    public function createRecord($flyConnection, $table, $input)
    {
        
        $flyConnection->beginTransaction();
        
        $id = $flyConnection
                ->table($table)
                ->insertGetId($input);
        
        if( !$id) {
            $flyConnection->rollBack();
            return false;            
        }
        
        $flyConnection->commit();
        
        return [
            'id'=>$id
        ];
        
    }
    
    public function getValidateInput(&$input, &$columns)
    {
        
        $validations = [];
        
        foreach($columns as $column) {
            
            /**
             * ignore primary key
             * autoincrement and uuid
             */
            if( $column['isAutoIncrement'] || (
                $column['isPrimaryKey'] && $column['maxLength'] == 36) || (
                $column['isPrimaryKey'] && in_array($column['dataType'], [
                    'smallint',
                    'int'
                ])
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
            
        }
        
        $validator = validator()->make($input, $validations);
        
        if( $validator->fails()) {
            return $this->setErrors($validator);
        }
        
        return $input;
        
    }
    
    public function setErrors(&$validator)
    {
        dd($validator);
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
