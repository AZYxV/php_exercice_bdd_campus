<?php

class bdd
{
    private $pdo = null;
    private static $instance = null;
    protected string $host;
    protected string $user;
    protected string $pass;
    protected string $base;
    protected string $table;

    function __construct()
    {
        $this->host = 'localhost:6603';
        $this->user = 'root';
        $this->pass = 'helloworld';
        $this->base = 'db_boardgames';
        $this->table = 'users';
        $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->base, $this->user, $this->pass);
    }

    public static function getInstance()
    {
        if (is_null(self::$instance))
        {
            self::$instance = new bdd();
        }
        return self::$instance;
    }


    public function query($query): false|PDOStatement
    {
        try {
            return $this->pdo->query($query);
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }

    }

}