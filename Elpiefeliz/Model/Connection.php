<?php

class Database {
    private $host;
    private $database;
    private $user;
    private $passwd;
    private $charset;

    public function __construct(){
        $this->host = 'localhost';
        $this->database = 'elpiefeliz';
        $this->user = 'root';
        $this->passwd = '';
        $this->charset = 'utf8mb4';
    }
    
    public function connect(){
        try {
            $connection = "mysql:host=".$this->host.";dbname=".$this->database.";charset=".$this->charset;

            $con = new PDO($connection, $this->user, $this->passwd);

            return $con;

        } catch (PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
            exit();
        }
    }
}

?>