<?php namespace App\Forge\Logics\Forms;

use Melisa\core\LogicBusiness;
use App\Forge\Logics\Connections\HelperLogic;
use App\Forge\Logics\Columns\PagingLogic;
use App\Core\Logics\Modules\Outbuildings\Module;

/**
 * Description of AddLogic
 *
 * @author Luis Josafat Heredia Contreras
 */
class AddLogic
{
    use LogicBusiness;
    
    protected $helperConnection;
    protected $columnsTable;
    protected $modules;
    
    public function __construct(HelperLogic $helperConnection, PagingLogic $columnsTable, Module $modules)
    {
        $this->helperConnection = $helperConnection;
        $this->columnsTable = $columnsTable;
        $this->modules = $modules;
    }
    
    public function init($keyConnection, $database, $table)
    {
        
        $flyConnection = $this->helperConnection->getFlyConnectionByKey($keyConnection, $database);
        
        if( !$flyConnection) {
            return false;
        }
        
        $metadata = $this->getMetadata($flyConnection, $database, $table);
        
        if( !$metadata) {
            return false;
        }
        
        $metadata ['fields']= $this->getFields($flyConnection, $database, $table);
        
//        $event = [
//            'id'=>$id,
//            'keyConnection'=>$keyConnection,
//            'database'=>$database,
//            'table'=>$table,
//        ];
//        
//        if( !$this->emitEvent('form.add.build.success', $event)) {
//            return $flyConnection->commit();
//        }
        
        return $metadata;
        
    }
    
    public function getMetadata(&$flyConnection, $database, $table)
    {
        
        $modelConnection = $this->helperConnection->getModelConnection();
        
        return [
            'tpls'=>[
                'submit'=>"$modelConnection->key/$database/$table/"
            ],
            'modules'=>[
                'submit'=>'task.forge.records.create'
            ],
            'wrapper'=>[
                'title'=>"Agregar $table"
            ]
        ];        
    }
    
    public function getFields($flyConnection, $database, $table)
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
        
        return $this->buildFields($columns['data'], $database, $table);
        
    }
    
    public function buildFields(&$columns, $database, $table)
    {
        
        $fields = [];
        
        foreach($columns as $column) {
            
            if( $this->ignoreField($column)) {
                continue;
            }
            
            $fieldDefinition = [
                'name'=>$column['columnName'],
                'allowBlank'=>!$column['required'],
                'fieldLabel'=>ucfirst($column['columnName'])
            ];
            
            $this->buildCombobox($column, $fieldDefinition, $database, $table);
            $this->buildTextfield($column, $fieldDefinition);
            $this->buildDatefield($column, $fieldDefinition);
            $this->buildNumberfield($column, $fieldDefinition);
            $this->buildCheckbox($column, $fieldDefinition);
            
            $fieldDefinition ['allowBlank']= !$column['required'];
            $fieldDefinition ['fieldLabel']= ucfirst($column['columnName']);
            
            $fields []= $fieldDefinition;
            
        }
        
        return $fields;
        
    }
    
    public function buildCombobox(&$column, &$fieldDefinition, $database, $table)
    {
        
        if( !isset($column['related'])) {
            return;
        }
        
        if( $column['related']['database'] !== $database) {
            return;
        }
        
        $module = $this->modules->get('task.forge.records.paging');
        $modelConnection = $this->helperConnection->getModelConnection();
        $url = implode('/', [
            $module.$modelConnection->id,
            'databases',
            $database,
            'tables',
            $column['related']['table'],
            'paging'
        ]);
        
        $fieldDefinition ['xtype']= 'combodefault';
        $fieldDefinition ['store']= [
            'proxy'=>[
                'type'=>'ajax',
                'url'=>$url,
                'reader'=>[
                    'type'=>'json',
                    'rootProperty'=>'data'
                ]
            ]
        ];
        
    }
    
    public function buildDatefield(&$column, &$fieldDefinition)
    {
        
        if( !in_array($column['dataType'], [
                'date',
        ])) {
            return;
        }
        
        $fieldDefinition ['xtype']= 'datefield';
        
    }
    
    public function buildTextfield(&$column, &$fieldDefinition)
    {
        
        if( !in_array($column['dataType'], [
                'varchar',
                'char',
        ])) {
            return;
        }
        
        if( isset($column['related'])) {
            return;
        }
        
        $fieldDefinition ['xtype']= 'textfield';
        $fieldDefinition ['maxLength']= $column['maxLength'];
            
    }
    
    public function buildNumberfield(&$column, &$fieldDefinition)
    {
        
        if( !in_array($column['dataType'], [
            'decimal',
            'smallint',
            'int',
        ]) || isset($column['related'])) {
            return;
        }
        
        $fieldDefinition ['xtype']= 'numberfield';
        
        if( $column['scale'] > 0) {
            $fieldDefinition ['allowDecimals']= true;
        }
        
    }
    
    public function buildCheckbox(&$column, &$fieldDefinition)
    {
        
        if( !in_array($column['dataType'], [
            'tinyint'
        ])) {
            return;
        }
        
        $fieldDefinition ['xtype']= 'checkbox';
        
    }
    
    public function ignoreField(&$column)
    {
        
        /*
         * ignore primary key
         * autoincrement and uuid
         */
        if( $column['isAutoIncrement'] || (
            $column['isPrimaryKey'] && $column['maxLength'] == 36) || (
            $column['isPrimaryKey'] && in_array($column['dataType'], [
                'smallint',
                'int'
            ]) && $column['isAutoIncrement']
            )) {
            return true;
        }
        
        if( in_array($column['columnName'], [
            'createdAt',
            'updatedAt',
            'idIdentityCreated',
            'idIdentityUpdated'
        ])) {
            return true;
        }
        
        return false;
        
    }
    
}
