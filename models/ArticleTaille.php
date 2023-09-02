<?php
namespace App\Models;
use App\Core\Model;
class ArticleTaille extends Model{
    public  int $id;
    public int $idArtile;
    public string $idTaille;
     protected static function tableName(){
               return "articletaille";
      }
    //   public Unite $UniteModel;
    //   public function __construct()
    //   {
    //       $this->UniteModel = new Unite;
    //   }
      
    //   public function unite(){
    //     return $this->UniteModel-> find($this->idUnite);
    //   }
 
    //   public static function findDetailByCategorie(int $idCategorie){
    //      return parent::query("select * from ".  self::tableName() ." where idCategorie=:idCategorie  ",["idCategorie"=>$idCategorie]);
    //   }

    //   public static function findDetailByUnite(int $idUnite){
    //     return parent::query("select * from ".  self::tableName() ." where idUnite=:idUnite  ",["idUnite"=>$idUnite]);
    //  }
   

}

