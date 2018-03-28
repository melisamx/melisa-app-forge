<?php

namespace App\Forge\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Forge\Logics\Databases\PagingLogic;
use App\Forge\Http\Requests\Databases\PagingRequest;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class DatabasesController extends Controller
{
    
    public function paging(
        $idConnection, 
        PagingRequest $request, 
        PagingLogic $logic
    )
    {        
        $request->merge([
            'idConnection'=>$idConnection
        ]);
        $result = $logic->init($request->allValid());
        return response()->paging($result);        
    }
    
}
