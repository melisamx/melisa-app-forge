<?php namespace App\Forge\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class MetadataAbstract extends Base
{
    
    protected $connection = 'forge';
    
    protected $table = 'metadata';
    
    protected $fillable = [
        'id', 'name', 'key', 'idMetadataType', 'defaultValue'
    ];
    
    public $timestamps = false;
    
    public $incrementing = true;
    
}
