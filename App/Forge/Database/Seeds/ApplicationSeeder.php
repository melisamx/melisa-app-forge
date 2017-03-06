<?php namespace App\Forge\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ApplicationSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installApplication('forge', [
            'name'=>'Forge',
            'description'=>'Application Forge',
            'nameSpace'=>'Melisa.forge',
            'typeSecurity'=>'art',
            'version'=>'1.0.3'
        ]);
        
    }
    
}
