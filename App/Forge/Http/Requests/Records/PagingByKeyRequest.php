<?php namespace App\Forge\Http\Requests\Records;

use Melisa\Laravel\Http\Requests\WithFilter;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingByKeyRequest extends WithFilter
{
    
    protected $rules = [
        'page'=>'bail|required|xss|numeric',
        'start'=>'bail|required|xss|numeric',
        'limit'=>'bail|required|xss|numeric',
        'sort'=>'bail|sometimes|xss|json|sort:name,createdAt',
        'keyConnection'=>'sometimes|xss',
        'database'=>'sometimes|xss',
        'table'=>'sometimes|xss',
    ];
    
}
