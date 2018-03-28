<?php

namespace App\Forge\Http\Controllers\Modules;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Forge\Modules\Forge\ViewModule;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ForgeController extends Controller
{
    
    public function view(ViewModule $module)
    {
        return $module->render();        
    }
    
}
