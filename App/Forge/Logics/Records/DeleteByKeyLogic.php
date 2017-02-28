<?php namespace App\Forge\Logics\Records;

use App\Forge\Logics\Connections\HelperLogic;
use App\Forge\Logics\Records\DeleteLogic;

/**
 * Paging list records on table
 *
 * @author Luis Josafat Heredia Contreras
 */
class DeleteByKeyLogic extends DeleteLogic
{
    
    public function getFlyConnection(&$input)
    {
        return $this->helperConnection->getFlyConnectionByKey($input['keyConnection'], $input['database']);
    }
}
