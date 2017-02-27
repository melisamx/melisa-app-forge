<?php namespace App\Forge\Logics\Records;

use App\Forge\Logics\Records\PagingLogic;

/**
 * Paging list records on table
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingByKeyLogic extends PagingLogic
{
    
    public function getFlyConnection(&$input)
    {
        return $this->helperConnection->getFlyConnectionByKey($input['keyConnection'], $input['database']);
    }
    
}
