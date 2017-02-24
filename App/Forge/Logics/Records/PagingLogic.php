<?php namespace App\Forge\Logics\Records;

use App\Forge\Logics\Connections\HelperLogic;

/**
 * Paging list records on table
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
        
        return $this->getRecords($flyConnection, $input);
        
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
