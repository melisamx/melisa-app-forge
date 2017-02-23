<?php namespace App\Forge\Database\Seeds\Data;

use Melisa\Laravel\Database\InstallSeeder;
use App\Forge\Models\Drivers;

/**
 * 
 * 
 * @author Luis Josafat Heredia Contreras
 */
class DriversSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        Drivers::updateOrCreate([
            'name'=>'MySQL Server',
            'key'=>'mysql'
        ], [
            'portDefault'=>'3306',
        ]);        
        Drivers::updateOrCreate([
            'name'=>'SQL Server',
            'key'=>'sqlsrv'
        ], [
            'portDefault'=>'1433'
        ]);
        Drivers::updateOrCreate([
            'name'=>'PostgreSQL',
            'key'=>'pgsql'
        ], [
            'portDefault'=>'5432'
        ]);
        
    }
    
}
