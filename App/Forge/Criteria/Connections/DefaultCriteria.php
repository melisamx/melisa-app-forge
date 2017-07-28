<?php

namespace App\Forge\Criteria\Connections;

use Melisa\Laravel\Criteria\FilterCriteria;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class DefaultCriteria extends FilterCriteria
{
    
    public function apply($model, $repository, array $input = [])
    {        
        $builder = parent::apply($model, $repository, $input);        
        $builder = $builder->join('drivers as d', 'd.id', '=', 'connections.idDriver');
        
        if( isset($input['query'])) {            
            $builder = $builder->where('connections.name', 'like', '%' . $input['query'] . '%');            
        }
        
        return $builder
            ->select([
                'connections.id',
                'connections.name',
                'connections.key',
                'd.name as driverName',
                'd.key as driverKey',
                'connections.hostname',
                'connections.port',
                'connections.active',
                'connections.lastSync',
            ])
            ->orderBy('connections.name');
        
    }
    
}
