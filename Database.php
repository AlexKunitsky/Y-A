<?php
class Database
{
    protected $connection;
    protected $config;
    private $_results, $_query, $_count;
    
    public function __construct()
    {
        $this->config = include('config.php');

        try
        {
            $this->connection = new PDO(
                "mysql:host={$this->config['db_host']};dbname={$this->config['db_name']}",
                $this->config['db_username'],
                $this->config['db_password']
            );

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            echo "Connection error: {$e->getMessage()}";
        }
    }

    public function query($query)
    {
        $this->_query = $this->connection->query($query);
        $a = $this->connection->prepare($query);
        if($a->execute()) {
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
            return true;
        }

        return false;
        
    }

    public function results()
    {
        return $this->_results;
    }

}