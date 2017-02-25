<?php namespace App\Forge\Database\Seeds\Data;

use Melisa\Laravel\Database\InstallSeeder;
use App\Forge\Models\Connections;
use App\Forge\Models\Drivers;

/**
 * 
 * 
 * @author Luis Josafat Heredia Contreras
 */
class ConnectionsSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $name = 'Forge test';
        
        Connections::updateOrCreate([
            'name'=>$name
        ], [
            'idIdentityCreated'=>$this->findIdentity()->id,
            'idDriver'=>Drivers::where('key', 'mysql')->first()->id,
            'userName'=>env('DB_USERNAME'),
            'hostname'=>'localhost',
            'key'=>str_slug($name),
            'port'=>3306,
            'password'=>env('DB_PASSWORD'),
            'database'=>env('DB_DATABASE_APP'),
        ]);
        
    }
    
}
