<?php

namespace App\Forge\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Forge\Modules\Forms\AddModule;
use App\Forge\Modules\Forms\ViewModule;
use App\Forge\Logics\Forms\AddLogic;
use App\Forge\Logics\Forms\ViewLogic;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class FormsController extends Controller
{
    
    public function add(
        $keyConnection,
        $database, 
        $table, 
        AddModule $module, 
        AddLogic $logic
    )
    {
        $result = $logic->init($keyConnection, $database, $table);
        return $module->withInput($result)->render();        
    }
    
    public function view(
        $keyConnection,
        $database, 
        $table, 
        ViewModule $module,
        ViewLogic $logic
    )
    {
        $result = $logic->init($keyConnection, $database, $table);
        return $module->withInput()->render($result);
    }
    
}
