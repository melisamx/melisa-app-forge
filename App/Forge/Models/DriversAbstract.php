<?php namespace App\Forge\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class DriversAbstract extends Base
{
    
    protected $connection = 'forge';
    
    protected $table = 'drivers';
    
    protected $fillable = [
        'id', 'name', 'key', 'portDefault'
    ];
    
    public $timestamps = false;
    
    public $incrementing = true;
    
}
