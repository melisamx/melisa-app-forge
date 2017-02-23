<?php namespace App\Forge\Logics\Tables;

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
        
        return $this->getTables($flyConnection, $input['database']);
        
    }
    
    public function getTables(&$flyConnection, $database)
    {
        
        $result = $flyConnection->select('show tables');
        $modelConnection = $this->helperConnection->getModelConnection(); 
        
        foreach($result as $i => $table) {
            
            $tables []= [
                'idConnection'=>$modelConnection->id,
                'database'=>$modelConnection->database,
                'name'=>$table->{'Tables_in_' . $database}
            ];
            
        }
        
        return [
            'total'=>count($tables),
            'data'=>$tables
        ];
        
    }
    
    
}
