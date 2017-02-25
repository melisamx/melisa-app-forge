<?php namespace App\Forge\Database\Seeds\Modules\Universal\Records;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class CreateSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installModule([
            [
                'name'=>'Crear registro',
                'url'=>"/forge.php/records/create/",
                'description'=>'Módulo para crear registro',
                'task'=>[
                    'key'=>'task.forge.records.create',
                    'name'=>'Acceso para crear registro',
                    'description'=>'Permitir crear registro',
                    'pattern'=>'create'
                ],
                'event'=>[
                    'key'=>'event.forge.records.create.success',
                    'description'=>'Crear registro'
                ]
            ],
        ]);
        
    }
    
}
