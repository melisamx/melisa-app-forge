<?php namespace App\Forge\Modules\Forms;

use App\Core\Logics\Modules\Outbuildings;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ViewModule extends Outbuildings
{
    
    public function dataDictionary() {
        
        $input = $this->getInput();
        
        if( !$input) {
            return false;
        }
        
        $data = melisa('array')->mergeDefault($input, [
            'token'=>csrf_token(),
        ]);
        
        return [
            'success'=>true,
            'data'=>$data
        ];
        
    }
    
}
