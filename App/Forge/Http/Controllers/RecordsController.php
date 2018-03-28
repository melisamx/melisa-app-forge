<?php

namespace App\Forge\Http\Controllers;

use Illuminate\Http\Request;

use Melisa\Laravel\Http\Controllers\Controller;

use App\Forge\Logics\Records\PagingLogic;
use App\Forge\Logics\Records\PagingByKeyLogic;
use App\Forge\Logics\Records\DeleteLogic;
use App\Forge\Logics\Records\DeleteByKeyLogic;
use App\Forge\Logics\Records\CreateLogic;
use App\Forge\Http\Requests\Records\PagingRequest;
use App\Forge\Http\Requests\Records\PagingByKeyRequest;
use App\Forge\Http\Requests\Records\DeleteRequest;
use App\Forge\Http\Requests\Records\DeleteByKeyRequest;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class RecordsController extends Controller
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
        $result = $logic->init($request->allValid());
        return response()->paging($result);        
    }
    
    public function pagingByKey(
        $keyConnection, 
        $database, 
        $table, 
        PagingByKeyRequest $request, 
        PagingByKeyLogic $logic
    )
    {        
        $request->merge([
            'keyConnection'=>$keyConnection,
            'database'=>$database,
            'table'=>$table,
        ]);
        $result = $logic->init($request->allValid());
        return response()->paging($result);        
    }
    
    public function delete(
        $idConnection, 
        $database, 
        $table, 
        DeleteRequest $request, 
        DeleteLogic $logic
    )
    {        
        $request->merge([
            'idConnection'=>$idConnection,
            'database'=>$database,
            'table'=>$table,
        ]);
        $result = $logic->init($request->allValid());
        return response()->data($result);        
    }
    
    public function deleteByKey(
        $keyConnection, 
        $database, 
        $table, 
        DeleteByKeyRequest $request, 
        DeleteByKeyLogic $logic
    )
    {        
        $request->merge([
            'keyConnection'=>$keyConnection,
            'database'=>$database,
            'table'=>$table,
        ]);
        $result = $logic->init($request->allValid());
        return response()->data($result);        
    }
    
    public function create(
        $keyConnection,
        $database, 
        $table, 
        Request $request, 
        CreateLogic $logic
    )
    {
        $result = $logic->init($keyConnection, $database, $table, $request->all());
        return response()->data($result);        
    }
    
}
