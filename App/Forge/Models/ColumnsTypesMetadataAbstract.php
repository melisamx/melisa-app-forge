<?php namespace App\Forge\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ColumnsTypesMetadataAbstract extends Base
{
    
    protected $connection = 'forge';
    
    protected $table = 'columnsTypesMetadata';
    
    protected $fillable = [
        'id', 'idColumnType', 'idMetadata', 'active', 'defaultValue'
    ];
    
    public $timestamps = false;
    
    public $incrementing = true;
    
}
