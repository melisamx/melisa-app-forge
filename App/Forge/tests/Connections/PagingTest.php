<?php namespace App\Forge\tests\Connections;

use App\Forge\tests\TestCase;
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
        
        $this->actingAs($user)
        ->json('get', 'connections/', [
            'page'=>1,
            'start'=>0,
            'limit'=>25,
        ])
        ->seeJson([
            'success'=>true,
        ])
        ->seeJsonStructure([
            'data'=>[
                '*'=>[
                    'id', 'name'
                ]
            ],
            'total'
        ]);
        
    }
    
}
