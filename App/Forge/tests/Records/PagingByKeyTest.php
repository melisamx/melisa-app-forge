<?php namespace App\Forge\tests\Records;

use Melisa\Laravel\Database\InstallUser;
use App\Forge\tests\TestCase;

class PagingByKeyTest extends TestCase
{
    use InstallUser;
    
    /**
     * @test
     * @group completed
     */
    public function simple()
    {
        
        $user = $this->findUser();
        $database = env('DB_DATABASE_APP');
        
        $this->actingAs($user)
        ->json('get', "records/paging/default/$database/connections/", [
            'page'=>1,
            'start'=>0,
            'limit'=>25,
        ])
        ->seeJson([
            'success'=>true,
        ]);
        
    }
    
}
