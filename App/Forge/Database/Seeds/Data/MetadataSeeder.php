<?php namespace App\Forge\Database\Seeds\Data;

use Melisa\Laravel\Database\InstallSeeder;
use App\Forge\Models\Metadata;
use App\Forge\Models\MetadataTypes;

/**
 * 
 * 
 * @author Luis Josafat Heredia Contreras
 */
class MetadataSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->createMetadata('BOOLEAN', 'columnSortable', 'Columna ordenable', true);
        $this->createMetadata('BOOLEAN', 'valueIsPassword', 'El valor es una contraseña', false);
        $this->createMetadata('VARCHAR', 'inputValidations', 'Validaciones en la entrada de datos', 'bail|required|xss');
        $this->createMetadata('BOOLEAN', 'allowFilter', 'El valor puede ser filtrado');
        $this->createMetadata('VARCHAR', 'valueSanitizes', 'Desinfección aplicada al valor');
        $this->createMetadata('VARCHAR', 'textColumn', 'Texto a mostrar en columna');
        
    }
    
    public function createMetadata($type, $key, $name, $defaultValue = NULL)
    {
        
        $metadataType = MetadataTypes::where('key', $type)->firstOrFail();
        
        return Metadata::updateOrCreate([
            'idMetadataType'=>$metadataType->id,
            'key'=>$key,
            'name'=>$name,
            'defaultValue'=>$defaultValue,
        ]);
        
    }
    
}
