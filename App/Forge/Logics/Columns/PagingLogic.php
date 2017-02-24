<?php namespace App\Forge\Logics\Columns;

use App\Forge\Logics\Connections\HelperLogic;

/**
 * Paging list databses on connection
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingLogic
{
    
    protected $helperConnection;
    
    public function __construct(HelperLogic $helperConnection)
    {
        $this->helperConnection = $helperConnection;
    }
    
    public function init($input = [])
    {
        
        $flyConnection = $this->helperConnection->getFlyConnection($input['idConnection'], $input['database']);
        
        if( !$flyConnection) {
            return false;
        }
        
        return $this->getColumns($flyConnection, $input['database'], $input['table']);
        
    }
    
    public function getColumns(&$flyConnection, $database, $table)
    {
        
        $result = $flyConnection->select($this->getQuery($database, $table));
        $modelConnection = $this->helperConnection->getModelConnection(); 
        $columns = [];        
        
        foreach($result as $i => $column) {
            
            $definition = [
                'idConnection'=>$modelConnection->id,
                'database'=>$modelConnection->database,
                'table'=>$table,
                'columnName'=>$column->COLUMN_NAME,
                'required'=>$column->IS_NULLABLE === 'NO' ? true : false,
                'isAutoIncrement'=>is_null($column->AUTO_INCREMENT) ? false : true,
                'isPrimaryKey'=>$column->CONSTRAINT_TYPE === 'PRIMARY KEY' ? true : false,
                'isForeignKey'=>$column->CONSTRAINT_TYPE === 'FOREIGN KEY' ? true : false,
                'maxLength'=>($column->CHARACTER_MAXIMUM_LENGTH > 0) ? 
                    (int)$column->CHARACTER_MAXIMUM_LENGTH : 
                    (int)$column->NUMERIC_PRECISION
            ];
            
            if( $definition['isForeignKey']) {
                $definition ['related']= [
                    'database'=>$column->REFERENCED_TABLE_SCHEMA,
                    'table'=>$column->REFERENCED_TABLE_NAME,
                    'column'=>$column->REFERENCED_COLUMN_NAME
                ];
            }
            
            if( !is_null($column->NUMERIC_SCALE)) {
                $definition ['scale']= (int)$column->NUMERIC_SCALE;
            }
            
            $columns []= $definition;
            
        }
        
        return [
            'total'=>count($columns),
            'data'=>$columns
        ];
        
    }
    
    public function getQuery($database, $table)
    {
        
        return implode(' ', [
            'select',
                'c.TABLE_SCHEMA,',
                't.TABLE_NAME,',
                'c.COLUMN_NAME,',
                'c.ORDINAL_POSITION,',
                'c.DATA_TYPE,',
                't.AUTO_INCREMENT,',
                'c.CHARACTER_MAXIMUM_LENGTH,',
                'c.COLUMN_DEFAULT,',
                'c.IS_NULLABLE,',
                'c.NUMERIC_PRECISION,',
                'c.NUMERIC_SCALE,',
                'n.CONSTRAINT_TYPE,',
                'n.CONSTRAINT_TYPE,',
                'k.REFERENCED_TABLE_SCHEMA,',
                'k.REFERENCED_TABLE_NAME,',
                'k.REFERENCED_COLUMN_NAME',
            'FROM INFORMATION_SCHEMA.TABLES t',
            'LEFT JOIN INFORMATION_SCHEMA.COLUMNS c ON t.TABLE_SCHEMA=c.TABLE_SCHEMA AND t.TABLE_NAME=c.TABLE_NAME',
            'LEFT JOIN INFORMATION_SCHEMA.KEY_COLUMN_USAGE k ON c.TABLE_SCHEMA=k.TABLE_SCHEMA AND c.TABLE_NAME=k.TABLE_NAME AND c.COLUMN_NAME=k.COLUMN_NAME',
            'LEFT JOIN INFORMATION_SCHEMA.TABLE_CONSTRAINTS n ON k.CONSTRAINT_SCHEMA=n.CONSTRAINT_SCHEMA AND k.CONSTRAINT_NAME=n.CONSTRAINT_NAME AND k.TABLE_SCHEMA=n.TABLE_SCHEMA AND k.TABLE_NAME=n.TABLE_NAME',
            'WHERE',
            "t.TABLE_TYPE='BASE TABLE'",
            "AND t.TABLE_NAME = '" . $table . "'",
            "AND c.TABLE_SCHEMA='" . $database . "'",
            'ORDER BY c.ORDINAL_POSITION asc'
        ]);
        
    }
    
    
}