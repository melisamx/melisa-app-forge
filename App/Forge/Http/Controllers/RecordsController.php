<?php namespace App\Forge\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;

use App\Forge\Logics\Records\PagingLogic;
use App\Forge\Logics\Records\DeleteLogic;
use App\Forge\Http\Requests\Records\PagingRequest;
use App\Forge\Http\Requests\Records\DeleteRequest;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class RecordsController extends Controller
{
    
    public function paging($idConnection, $database, $table, PagingRequest $request, PagingLogic $logic)
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
    
    public function delete($idConnection, $database, $table, DeleteRequest $request, DeleteLogic $logic)
    {
        
        $request->merge([
            'idConnection'=>$idConnection,
            'database'=>$database,
            'table'=>$table,
        ]);
        
        return response()->data(
            $logic->init(
                $request->allValid()
            )
        );
        
    }
    
}
