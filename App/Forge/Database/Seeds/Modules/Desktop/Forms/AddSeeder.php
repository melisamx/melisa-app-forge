<?php namespace App\Forge\Database\Seeds\Modules\Desktop\Forms;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class AddSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installModule([
            [
                'name'=>'Agregar formulario',
                'url'=>'/forge.php/forms/',
                'description'=>'Módulo interfaz para agregar formulario',
                'nameSpace'=>'Melisa.forge.view.desktop.forms.add.Wrapper',
                'task'=>[
                    'key'=>'task.forge.forms.add.access',
                    'name'=>'Acceso a agregar formulario',
                    'description'=>'Permitir acceso a agregar formulario',
                    'pattern'=>'access'
                ],
                'event'=>[
                    'key'=>'event.forge.forms.add.access',
                    'description'=>'Visualización de formulario agregar satisfactorio (forge)'
                ]
            ],
        ]);
        
    }
    
}
