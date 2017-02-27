<?php namespace App\Forge\Logics\Records;

use App\Forge\Logics\Connections\HelperLogic;
use Melisa\core\LogicBusiness;

/**
 * Paging list records on table
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingLogic
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
            return $this->error('Imposible get connection on fly');
        }
        
        $result = $this->getRecords($flyConnection, $input);
        
        if( $result === false) {
            return false;
        }
        
        $modelConnection = $this->helperConnection->getModelConnection();
        
        $event = [
            'keyConnection'=>$modelConnection->key,
            'database'=>$input['database'],
            'table'=>$input['table'],
        ];
        
        if( !$this->emitEvent('records.paging.success', $event)) {
            return false;
        }
        
        return $result;
        
    }
    
    public function getFlyConnection(&$input)
    {   
        return $this->helperConnection->getFlyConnection($input['idConnection'], $input['database']);
    }
    
    public function getRecords(&$flyConnection, $input)
    {
        
        $result = $flyConnection
                ->table($input['table'])
                ->paginate($input['limit']);
        
        if( $result->total() === 0) {            
            return [
                'total'=>0,
                'data'=>[],
            ];            
        }
        
        $data = $result->toArray()['data'];
        
        $columns = [];
        foreach(array_keys(get_object_vars($data[0])) as $column) {
            $columns []= [
                'dataIndex'=>$column,
                'text'=>ucfirst($column)
            ];
        }
        
        return [
            'total'=>$result->total(),
            'data'=>$result->toArray()['data'],
            'metaData'=>$columns
        ];        
        
    }
    
}
