<?php namespace App\Forge\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;

use App\Forge\Logics\Tables\PagingLogic;
use App\Forge\Http\Requests\Tables\PagingRequest;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class TablesController extends Controller
{
    
    public function paging($idConnection, $database, PagingRequest $request, PagingLogic $logic)
    {
        
        $request->merge([
            'idConnection'=>$idConnection,
            'database'=>$database,
        ]);
        
        return response()->paging(
            $logic->init(
                $request->allValid()
            )
        );
        
    }
    
}
