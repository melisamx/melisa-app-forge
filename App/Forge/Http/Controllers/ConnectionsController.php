<?php

namespace App\Forge\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use Melisa\Laravel\Logics\PagingLogic;
use App\Forge\Http\Requests\Connections\PagingRequest;
use App\Forge\Repositories\ConnectionsRepository;
use App\Forge\Criteria\Connections\DefaultCriteria;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ConnectionsController extends Controller
{
    
    public function paging(
        PagingRequest $request, 
        ConnectionsRepository $repository, 
        DefaultCriteria $criteria)
    {
        
        $logic = new PagingLogic($repository, $criteria);        
        $result = $logic->init($request->allValid());
        return response()->paging($result);        
    }
    
}
