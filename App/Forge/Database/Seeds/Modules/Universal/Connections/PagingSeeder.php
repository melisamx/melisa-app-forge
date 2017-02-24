<?php namespace App\Forge\Database\Seeds\Modules\Universal\Connections;

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
                'name'=>'Paginar lista de conexiones',
                'url'=>'/forge.php/connections/',
                'description'=>'Módulo para paginar lista de conexiones',
                'task'=>[
                    'key'=>'task.forge.connections.paging',
                    'name'=>'Paginar lista de conexiones',
                    'description'=>'Permitir paginar lista de conexiones',
                    'pattern'=>'read'
                ],
            ],
        ]);
        
    }
    
}
