<?php

namespace App\Forge\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Forge\Logics\Columns\PagingLogic;
use App\Forge\Http\Requests\Columns\PagingRequest;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ColumnsController extends Controller
{
    
    public function paging(
        $idConnection, 
        $database, 
        $table, 
        PagingRequest $request, 
        PagingLogic $logic
    )
    {        
        $request->merge([
            'idConnection'=>$idConnection,
            'database'=>$database,
            'table'=>$table,
        ]);
        return response()->paging(
            $logic->init(
                $request->allValid()
            )
        );        
    }
    
}
