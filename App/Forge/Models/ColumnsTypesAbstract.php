<?php namespace App\Forge\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ColumnsTypesAbstract extends Base
{
    
    protected $connection = 'forge';
    
    protected $table = 'columnsTypes';
    
    protected $fillable = [
        'id', 'name', 'key'
    ];
    
    public $timestamps = false;
    
    public $incrementing = true;
    
}
