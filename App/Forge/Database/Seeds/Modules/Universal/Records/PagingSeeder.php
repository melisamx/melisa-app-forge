<?php namespace App\Forge\Database\Seeds\Modules\Universal\Records;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installModule([
            [
                'name'=>'Paginar registros de una tabla',
                'url'=>'/forge.php/connections/',
                'description'=>'Módulo para paginar registros de una tabla',
                'task'=>[
                    'key'=>'task.forge.records.paging',
                    'name'=>'Paginar registros de una tabla',
                    'description'=>'Permitir paginar registros de una tabla',
                    'pattern'=>'read'
                ],
            ],
        ]);
        
    }
    
}
