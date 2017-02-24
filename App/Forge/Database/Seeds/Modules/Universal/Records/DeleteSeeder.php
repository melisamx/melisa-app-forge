<?php namespace App\Forge\Database\Seeds\Modules\Universal\Records;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class DeleteSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installModule([
            [
                'name'=>'Eliminar registros',
                'url'=>'/forge.php/connections/',
                'description'=>'Módulo para eliminar registros',
                'task'=>[
                    'key'=>'task.forge.records.delete',
                    'name'=>'Acceso a eliminar registros',
                    'description'=>'Permitir eliminar registros',
                    'pattern'=>'delete'
                ],
                'event'=>[
                    'key'=>'event.forge.records.delete.success',
                    'description'=>'Registro de tabla eliminado'
                ],
            ],
        ]);
        
    }
    
}
