<?php namespace App\Forge\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class DataSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->call(Data\DriversSeeder::class);
        $this->call(Data\MetadataTypesSeeder::class);
        $this->call(Data\ColumnsTypesSeeder::class);
        $this->call(Data\MetadataSeeder::class);
        $this->call(Data\ConnectionsSeeder::class);
        
    }
    
}
