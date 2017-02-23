<?php namespace App\Forge\tests\Records;

use App\Forge\tests\TestCase;
use App\Forge\Models\Connections;
use Melisa\Laravel\Database\InstallUser;

class PagingTest extends TestCase
{
    use InstallUser;
    
    /**
     * @test
     * @group completed
     */
    public function simple()
    {
        
        $user = $this->findUser();
        $connection = Connections::where('name', 'Forge test')->first();
        
        $this->actingAs($user)
        ->json('get', "connections/$connection->id/databases/$connection->database/tables/connections/paging", [
            'page'=>1,
            'start'=>0,
            'limit'=>25,
        ])
        ->dump()
        /*->seeJson([
            'success'=>true,
        ])
        ->seeJsonStructure([
            'data'=>[
                '*'=>[
                    'idConnection', 'database', 'columnName'
                ]
            ],
            'total'
        ])*/;
        
    }
    
}
