<?php 
namespace Model;

abstract class Model{
    private static $_bdd;


    private static function setBdd(){
        self::$_bdd = new \PDO('mysql:host='.$_ENV['HOST'].";dbname=".$_ENV['DB_NAME'].";charset=utf8", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    }

    protected function getBdd(){
        if(self::$_bdd == null){
            self::setBdd();
        }

        return self::$_bdd;
    }

    protected function getAll($table, $obj){
        $var = [];
        $req = self::getBdd()->prepare('SELECT * FROM '. $table . " ORDER BY id desc");
        $req->execute();

        while($data = $req->fetch(\PDO::FETCH_ASSOC)){
            $var[]= new $obj($data);
        }
        return $var;
    }
}