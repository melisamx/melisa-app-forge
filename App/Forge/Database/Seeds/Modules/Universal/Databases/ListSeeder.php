<?php namespace App\Forge\Database\Seeds\Modules\Universal\Databases;

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
                'name'=>'Lista de base de datos sobre de una conexión',
                'url'=>'/forge.php/connections/',
                'description'=>'Módulo para listar base de datos de una conexión',
                'task'=>[
                    'key'=>'task.forge.databases.list',
                    'name'=>'Listar base de datos de una conexión',
                    'description'=>'Permitir listar base de datos de una conexión',
                    'pattern'=>'read'
                ],
            ],
        ]);
        
    }
    
}
