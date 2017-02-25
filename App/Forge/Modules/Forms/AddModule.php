<?php namespace App\Forge\Modules\Forms;

use App\Core\Logics\Modules\Outbuildings;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class AddModule extends Outbuildings
{
    
    public function dataDictionary() {
        
        $input = $this->getInput();
        
        if( !$input) {
            return false;
        }
        
        $data = melisa('array')->mergeDefault($input, [
            'token'=>csrf_token(),
        ]);
        
        foreach($data['modules'] as $i=>$module) {
            if(isset($data['tpls'][$i])) {
                $data ['modules'][$i]= $this->module($module) . $data['tpls'][$i];
            } else {
                $data ['modules'][$i]= $this->module($module);
            }
        }
        
        return [
            'success'=>true,
            'data'=>$data
        ];
        
    }
    
}
