<?php namespace App\Forge\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class DatabasesAbstract extends BaseUuid
{
    
    protected $connection = 'forge';
    
    protected $table = 'databases';
    
    protected $fillable = [
        'id', 'idConnection', 'name', 'active', 'readOnly'
    ];
    
    public $timestamps = false;
    
    /* incrementing */
    
}
