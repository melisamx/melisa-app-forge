<?php namespace App\Forge\Database\Seeds\Modules;

use Illuminate\Database\Seeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ModulesUniversalSeeder extends Seeder
{
    
    public function run()
    {
        
        $this->call(Universal\Connections\PagingSeeder::class);
        $this->call(Universal\Databases\ListSeeder::class);
        $this->call(Universal\Tables\ListSeeder::class);
        $this->call(Universal\Columns\ListSeeder::class);
        $this->call(Universal\Records\PagingSeeder::class);
        $this->call(Universal\Records\DeleteSeeder::class);
        $this->call(Universal\Records\CreateSeeder::class);
        
    }
    
}
