<?php namespace App\Forge\Logics\Databases;

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
        
        $flyConnection = $this->helperConnection->getFlyConnection($input['idConnection']);
        
        if( !$flyConnection) {
            return false;
        }
        
        return $this->getDatabases($flyConnection);
        
    }
    
    public function getDatabases(&$flyConnection)
    {
        
        $result = $flyConnection->select('show databases');
        $modelConnection = $this->helperConnection->getModelConnection(); 
        
        foreach($result as $i => $table) {
            
            $tables []= [
                'idConnection'=>$modelConnection->id,
                'database'=>$modelConnection->database,
                'name'=>$table->Database
            ];
            
        }
        
        return [
            'total'=>count($tables),
            'data'=>$tables
        ];
        
    }
    
}
