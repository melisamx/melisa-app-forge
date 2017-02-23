<?php namespace App\Forge\Database\Seeds\Data;

use Melisa\Laravel\Database\InstallSeeder;
use App\Forge\Models\ColumnsTypes;

/**
 * 
 * 
 * @author Luis Josafat Heredia Contreras
 */
class ColumnsTypesSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        ColumnsTypes::updateOrCreate([
            'name'=>'Texto largo',
            'key'=>'TEXT'
        ]);        
        ColumnsTypes::updateOrCreate([
            'name'=>'Texto variable',
            'key'=>'VARCHAR'
        ]);
        ColumnsTypes::updateOrCreate([
            'name'=>'Texto fijo',
            'key'=>'CHAR'
        ]);
        ColumnsTypes::updateOrCreate([
            'name'=>'Booleano',
            'key'=>'BOOLEAN'
        ]);
        ColumnsTypes::updateOrCreate([
            'name'=>'Numero entero',
            'key'=>'INTEGER'
        ]);
        ColumnsTypes::updateOrCreate([
            'name'=>'Numero con decimales',
            'key'=>'DOUBLE'
        ]);
        ColumnsTypes::updateOrCreate([
            'name'=>'Fecha',
            'key'=>'DATE'
        ]);
        ColumnsTypes::updateOrCreate([
            'name'=>'Fecha con tiempo',
            'key'=>'DATETIME'
        ]);
        
    }
    
}
