<?php 
namespace App\Core;
class Db{
    protected static \PDO|null $bdd=null;
    public static function openConnexion(){
        try {
            if(self::$bdd==null){
                self::$bdd = new \PDO('mysql:host=localhost;dbname=poo_database;charset=utf8', 'root', '');
            }
            return self::$bdd;
        } catch (\Exception $th) {
            dd($th->getMessage());
        }
        
    }

     public static function closeConnexion(){
           self::$bdd=null;
    }
    
    
}