<?php

abstract class Database
{
    public static $pdo;

    private $host = "localhost";
    private $dbName = "arcadiapoo";
    private $user = "root";
    private $password = "";

    protected function connect() {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO("$dsn;charset=UTF8", $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $pdo;
    }
}