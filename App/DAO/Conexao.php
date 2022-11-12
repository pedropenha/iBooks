<?php

namespace App\DAO;

class Conexao{

    private static $conn = null;

    private function __construct(){

    }

    public static function getInstance(){
        if(self::$conn === null){
            try{
                self::$conn = new \PDO("mysql:host='localhost';dbname='iBooks'", 'root', '', array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            }catch (\Exception $e){
                echo $e->getMessage();
            }
        }

        return self::$conn;
    }
}