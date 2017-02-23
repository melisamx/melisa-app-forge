<?php namespace App\Forge\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class TablesAbstract extends BaseUuid
{
    
    protected $connection = 'forge';
    
    protected $table = 'tables';
    
    protected $fillable = [
        'id', 'idDatabase', 'name', 'active', 'readOnly'
    ];
    
    public $timestamps = false;
    
    /* incrementing */
    
}
