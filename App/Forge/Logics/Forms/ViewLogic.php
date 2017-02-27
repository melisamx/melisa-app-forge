<?php namespace App\Forge\Logics\Forms;

/**
 * View module
 *
 * @author Luis Josafat Heredia Contreras
 */
class ViewLogic
{
    
    public function init($keyConnection, $database, $table)
    {
        
        return [
            'modules'=>[
                'paging'=>"/forge.php/records/paging/$keyConnection/$database/$table/"
            ],
            'wrapper'=>[
                'title'=>ucfirst($table),
            ]
        ];
        
    }
    
}
