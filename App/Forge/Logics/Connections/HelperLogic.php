<?php namespace App\Forge\Logics\Connections;

use App\Forge\Repositories\ConnectionsRepository;

/**
 * Get connection
 *
 * @author Luis Josafat Heredia Contreras
 */
class HelperLogic
{
    
    protected $connecitonsRepo;

    public function __construct(ConnectionsRepository $connecitonsRepo)
    {
        $this->connecitonsRepo = $connecitonsRepo;
    }
    
    public function getFlyConnectionByKey($key, $database = null)
    {
        
        $this->connection = $this->getConnectionByKey($key);
        
        if( !$this->connection) {
            return false;
        }
        
        return $this->createFlyConnection($this->connection->id, $database);
        
    }
    
    public function getFlyConnection($idConnection, $database = null)
    {
        
        $this->connection = $this->getConnection($idConnection);
        
        if( !$this->connection) {
            return false;
        }
        
        return $this->createFlyConnection($idConnection, $database);
        
    }
    
    public function getModelConnection()
    {
        return $this->connection;
    }
    
    public function getConnectionByKey($key)
    {
        
        $connection = $this->connecitonsRepo
            ->with([
                'driver'
            ])
            ->findBy('key', $key);
        
        if( !$connection) {
            return false;
        }
        
        return $connection;
        
    }
    
    public function getConnection($idConnection)
    {
        
        $connection = $this->connecitonsRepo
            ->with([
                'driver'
            ])
            ->find($idConnection);
        
        if( !$connection) {
            return false;
        }
        
        return $connection;
        
    }
    
    public function createFlyConnection($idConnection, $database)
    {
        
        config([
            "database.connections.$idConnection"=>[
                'driver'=>$this->connection->driver->key,
                'host'=>$this->connection->hostname,
                'username'=>$this->connection->userName,
                'database'=>is_null($database) ? $this->connection->database : $database,
                'password'=>$this->connection->password,
                'collation'=>'utf8_unicode_ci',
                'charset' => 'utf8',
            ]
        ]);
        
        return \DB::connection($idConnection);
        
    }
        
}
