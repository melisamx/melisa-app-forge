<?php namespace App\Forge\Database\Seeds\Modules\Universal\Columns;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ListSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installModule([
            [
                'name'=>'Listar columnas de una tabla',
                'url'=>'/forge.php/connections/',
                'description'=>'Módulo para listar columnas de una tabla',
                'task'=>[
                    'key'=>'task.forge.columns.list',
                    'name'=>'Listar columnas de una tabla',
                    'description'=>'Permitir listar columnas de una tabla',
                    'pattern'=>'read'
                ],
            ],
        ]);
        
    }
    
}
