<?php namespace App\Forge\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class OptionsSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installOption('option.forge.access', [
            'name'=>'Option main de aplicación forge',
            'text'=>'Forge',
            'isSubMenu'=>true,
            'iconClassSmall'=>'x-fa fa fa-database',
            'iconClassMedium'=>'x-fa fa fa-database fa-3x',
            'iconClassLarge'=>'x-fa fa fa-database fa-5x',
        ]);
        
    }
    
}
