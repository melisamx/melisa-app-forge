<?php namespace App\Forge\Database\Seeds\Modules\Desktop\Forge;

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
                'name'=>'Ver administrador de base de datos Forge',
                'url'=>'/forge.php/modules/forge/view',
                'description'=>'Módulo interfaz para ver administrador de base de datos Forge',
                'nameSpace'=>'Melisa.forge.view.desktop.forge.view.Wrapper',
                'task'=>[
                    'key'=>'task.forge.forge.view.access',
                    'name'=>'Acceso a ver administrador de base de datos Forge de forge',
                    'description'=>'Permitir acceso a ver administrador de base de datos Forge de forge',
                    'pattern'=>'access'
                ],
                'option'=>[
                    'key'=>'option.forge.forge.view.access',
                    'name'=>'Opción para ver administrador de base de datos Forge de forge',
                    'text'=>'Forge Database',
                    'iconClassSmall'=>'x-fa fa fa-database',
                    'iconClassMedium'=>'x-fa fa fa-database fa-3x',
                    'iconClassLarge'=>'x-fa fa fa-database fa-5x',
                ],
                'menu'=>[
                    [
                        'key'=>'menu.forge.forge.view.access',
                        'name'=>'Menú crud de administrador de base de datos Forge de forge',
                        'options'=>[
                            'option.forge.forge.add.access',
                            'option.forge.forge.update.access',
                            'option.forge.forge.remove.access',
                        ]
                    ]
                ]
            ],
        ]);
        
    }
    
}
