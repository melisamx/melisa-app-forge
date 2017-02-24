<?php namespace App\Forge\Modules\Forge;

use App\Core\Logics\Modules\Outbuildings;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ViewModule extends Outbuildings
{
    
    public function dataDictionary() {
        
        return [
            'success'=>true,
            'data'=>[
                'token'=>csrf_token(),
                'modules'=>[
                    'connections'=>$this->module('task.forge.connections.paging'),
                    'databases'=>$this->module('task.forge.databases.list'),
                    'tables'=>$this->module('task.forge.tables.list'),
                    'columns'=>$this->module('task.forge.columns.list'),
                    'records'=>$this->module('task.forge.records.paging'),
                    'recordsDelete'=>$this->module('task.forge.records.delete', false),
                ],
                'wrapper'=>[
                    'title'=>'Forge Database'
                ]
            ]
        ];
        
    }
    
}
