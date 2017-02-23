<?php namespace App\Forge\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class ColumnsMetadataAbstract extends BaseUuid
{
    
    protected $connection = 'forge';
    
    protected $table = 'columnsMetadata';
    
    protected $fillable = [
        'id', 'idColumn', 'idMetadata', 'value'
    ];
    
    public $timestamps = false;
    
    /* incrementing */
    
}
