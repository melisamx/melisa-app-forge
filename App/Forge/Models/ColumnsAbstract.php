<?php namespace App\Forge\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class ColumnsAbstract extends BaseUuid
{
    
    protected $connection = 'forge';
    
    protected $table = 'columns';
    
    protected $fillable = [
        'id', 'idTable', 'name', 'idColumnType', 'required', 'isAutoIncrement', 'isPrimaryKey', 'isForeignKey', 'order', 'maxLength'
    ];
    
    public $timestamps = false;
    
    /* incrementing */
    
}
