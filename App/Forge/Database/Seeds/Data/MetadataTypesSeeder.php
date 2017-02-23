<?php namespace App\Forge\Database\Seeds\Data;

use Melisa\Laravel\Database\InstallSeeder;
use App\Forge\Models\MetadataTypes;

/**
 * 
 * 
 * @author Luis Josafat Heredia Contreras
 */
class MetadataTypesSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        MetadataTypes::updateOrCreate([
            'name'=>'Texto largo',
            'key'=>'TEXT'
        ]);        
        
        MetadataTypes::updateOrCreate([
            'name'=>'JSON',
            'key'=>'JSON'
        ]);        
        MetadataTypes::updateOrCreate([
            'name'=>'Texto variable',
            'key'=>'VARCHAR'
        ]);
        MetadataTypes::updateOrCreate([
            'name'=>'Texto fijo',
            'key'=>'CHAR'
        ]);
        MetadataTypes::updateOrCreate([
            'name'=>'Booleano',
            'key'=>'BOOLEAN'
        ]);
        MetadataTypes::updateOrCreate([
            'name'=>'Numero entero',
            'key'=>'INT'
        ]);
        MetadataTypes::updateOrCreate([
            'name'=>'Numero con decimales',
            'key'=>'DOUBLE'
        ]);
        MetadataTypes::updateOrCreate([
            'name'=>'Fecha',
            'key'=>'DATE'
        ]);
        MetadataTypes::updateOrCreate([
            'name'=>'Fecha con tiempo',
            'key'=>'DATETIME'
        ]);
        
    }
    
}
