<?php

namespace App\DAO;

class Conexao{

    private static $conn = null;

    private function __construct(){

    }

    public static function getInstance(){
        if(self::$conn === null){
            try{
                self::$conn = new \PDO("mysql:host=localhost:3306;dbname=engenharia2", 'root', '');
            }catch (\Exception $e){
                echo $e->getMessage();
            }
        }
        return self::$conn;
    }
}