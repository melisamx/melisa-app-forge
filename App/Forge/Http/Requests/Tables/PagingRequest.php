<?php namespace App\Forge\Http\Requests\Tables;

use Melisa\Laravel\Http\Requests\WithFilter;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingRequest extends WithFilter
{
    
    protected $rules = [
        'page'=>'bail|required|xss|numeric',
        'start'=>'bail|required|xss|numeric',
        'limit'=>'bail|required|xss|numeric',
        'sort'=>'bail|sometimes|xss|json|sort:name,createdAt',
        'idConnection'=>'sometimes|xss',
        'database'=>'sometimes|xss',
    ];
    
}
