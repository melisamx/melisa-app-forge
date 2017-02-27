<?php namespace App\Forge\Database\Seeds\Modules\Desktop\Forms;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ViewSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installModule([
            [
                'name'=>'Ver formulario',
                'url'=>'/forge.php/forms/view/',
                'description'=>'Módulo interfaz para ver formulario',
                'nameSpace'=>'Melisa.forge.view.desktop.forms.view.Wrapper',
                'task'=>[
                    'key'=>'task.forge.forms.view.access',
                    'name'=>'Acceso a ver formulario',
                    'description'=>'Permitir acceso a ver formulario',
                    'pattern'=>'access'
                ],
                'event'=>[
                    'key'=>'event.forge.forms.view.access',
                    'description'=>'Visualización de formulario ver satisfactorio (forge)'
                ]
            ],
        ]);
        
    }
    
}
