<?php namespace App\Forge\tests\Records;

use App\Forge\tests\TestCase;
use App\Forge\Models\Connections;
use Melisa\Laravel\Database\InstallUser;

class DeleteTest extends TestCase
{
    use InstallUser;
    
    /**
     * @test
     * @group dev
     */
    public function simple()
    {
        
        $user = $this->findUser();
        $connection = Connections::where('name', 'Forge test')->first();
        
        $this->actingAs($user)
        ->json('post', "connections/$connection->id/databases/$connection->database/tables/connections/delete", [
            'id'=>$connection->id,
        ])
        ->seeJson([
            'success'=>true,
        ]);
        
    }
    
}
