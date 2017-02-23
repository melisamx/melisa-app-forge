<?php namespace App\Forge\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class DatabasesRepository extends Repository
{
    
    public function model() {
        
        return 'App\Forge\Models\Databases';
        
    }
    
}
