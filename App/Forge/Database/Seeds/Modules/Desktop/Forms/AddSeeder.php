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
                'nameSpace'=>'Melisa.forge.view.desktop.contacts.add.Wrapper',
                'task'=>[
                    'key'=>'task.forge.contacts.add.access',
                    'name'=>'Acceso a agregar formulario',
                    'description'=>'Permitir acceso a agregar formulario',
                    'pattern'=>'access'
                ],
                'option'=>[
                    'key'=>'option.forge.contacts.add.access',
                    'name'=>'Opción para agregar formulario',
                    'text'=>'Agregar formulario'
                ],
                'event'=>[
                    'key'=>'event.forge.contacts.add.access',
                    'description'=>'Acceso al módulo agregar formularios'
                ]
            ],
        ]);
        
    }
    
}
