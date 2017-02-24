<?php namespace App\Forge\Database\Seeds\Modules\Universal\Tables;

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
                'name'=>'Listar tablas de una base de datos',
                'url'=>'/forge.php/connections/',
                'description'=>'Módulo para listar tablas de una base de datos',
                'task'=>[
                    'key'=>'task.forge.tables.list',
                    'name'=>'Listar tablas de una base de datos',
                    'description'=>'Permitir listar tablas de una base de datos',
                    'pattern'=>'read'
                ],
            ],
        ]);
        
    }
    
}
