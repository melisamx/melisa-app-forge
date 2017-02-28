<?php namespace App\Forge\Logics\Records;

use App\Forge\Logics\Connections\HelperLogic;
use Melisa\core\LogicBusiness;

/**
 * Paging list records on table
 *
 * @author Luis Josafat Heredia Contreras
 */
class DeleteLogic
{
    use LogicBusiness;
    
    protected $helperConnection;
    
    public function __construct(HelperLogic $helperConnection)
    {
        $this->helperConnection = $helperConnection;
    }
    
    public function init($input = [])
    {
        
        $flyConnection = $this->getFlyConnection($input);
        
        if( !$flyConnection) {
            return false;
        }
        
        $flyConnection->beginTransaction();
        
        $result = $this->deleteRecord($flyConnection, $input);
        
        if( !$result) {
            return false;
        }
        
        $modelConnection = $this->helperConnection->getModelConnection();
        
        $event = [
            'id'=>$input['id'],
            'keyConnection'=>$modelConnection->key,
            'database'=>$input['database'],
            'table'=>$input['table'],
        ];
        
        if( !$this->emitEvent('records.delete.success', $event)) {
            return $flyConnection->commit();
        }
        
        $flyConnection->commit();
        return $event;
        
    }
    
    public function getFlyConnection(&$input)
    {   
        return $this->helperConnection->getFlyConnection($input['idConnection'], $input['database']);
    }
    
    public function deleteRecord(&$flyConnection, $input)
    {
        
        return $flyConnection
                ->table($input['table'])
                ->where([
                    'id'=>$input['id']
                ])
                ->delete();      
        
    }
    
}
