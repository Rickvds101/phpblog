<?php

class db {
    private $host;
    private $user;
    private $pw;
    private $dbaam;


    public function connect(){

    $this->host = "localhost";
    $this->user = "root";
    $this->pw = "";
    $this->dbnaam = "blog";

try{
    $dsn = "mysql:host=".$this->host.";dbname=".$this->dbnaam;
    $pdo = new PDO($dsn, $this->user, $this->pw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}catch(PDOException $e){
    echo $e->getMessage();
}

    }

}