<?php namespace App\Forge\Models;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class Connections extends ConnectionsAbstract
{
    
    public function driver()
    {
        return $this->hasOne('App\Forge\Models\Drivers', 'id', 'idDriver');
    }    
    
}
