<?php namespace App\Forge\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class ConnectionsRepository extends Repository
{
    
    public function model() {
        
        return 'App\Forge\Models\Connections';
        
    }
    
}
