<?php 
namespace App\Models;
use App\Core\Model;


 class Fournisseur extends Model{
     
         public int $id;
         public string $nom;
         public string $prenom;
         public string $email;
         public string $password;
          protected static function tableName(){
                return "Fournisseur";
          }
        
          
 public static function recupFournisseurs(){
  return self::query('SELECT * FROM '.static::tableName());
}
}