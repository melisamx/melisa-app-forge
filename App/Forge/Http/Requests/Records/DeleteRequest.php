<?php namespace App\Forge\Http\Requests\Records;

use Melisa\Laravel\Http\Requests\WithFilter;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class DeleteRequest extends WithFilter
{
    
    protected $rules = [
        'idConnection'=>'sometimes|xss',
        'database'=>'sometimes|xss',
        'table'=>'sometimes|xss',
        'id'=>'bail|required|xss|alpha_dash|max:36',
    ];
    
}
