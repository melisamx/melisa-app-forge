<?php namespace App\Forge\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class ConnectionsAbstract extends BaseUuid
{
    
    protected $connection = 'forge';
    
    protected $table = 'connections';
    
    protected $fillable = [
        'id', 'name', 'key', 'idDriver', 'idIdentityCreated', 'active', 'hostname', 'userName', 'port', 'createdAt', 'updatedAt', 'idIdentityUpdated', 'password', 'lastSync', 'database'
    ];
    
    public $timestamps = true;
    
    /* incrementing */
    
}
