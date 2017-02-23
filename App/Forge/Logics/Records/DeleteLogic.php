<?php namespace App\Forge\Logics\Records;

use App\Forge\Logics\Connections\HelperLogic;

/**
 * Paging list records on table
 *
 * @author Luis Josafat Heredia Contreras
 */
class DeleteLogic
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
        
        return $this->deleteRecord($flyConnection, $input);
        
    }
    
    public function deleteRecord(&$flyConnection, $input)
    {
        
        $flyConnection->beginTransaction();
        
        $result = $flyConnection
                ->table($input['table'])
                ->where([
                    'id'=>$input['id']
                ])
                ->delete();
        
        if( !$result) {
            $flyConnection->rollBack();
            return false;            
        }
        
        $flyConnection->commit();
        
        return [
            'id'=>$input['id']
        ];        
        
    }
    
}
