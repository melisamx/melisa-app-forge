<?php namespace App\Forge\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ColumnsRelationsAbstract extends Base
{
    
    protected $connection = 'forge';
    
    protected $table = 'columnsRelations';
    
    protected $fillable = [
        'id', 'idColumn', 'idDatabase', 'idTable', 'idColumnRelation', 'onDeleteCascade', 'onUpdateCascade'
    ];
    
    public $timestamps = false;
    
    public $incrementing = true;
    
}
