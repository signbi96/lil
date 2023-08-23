<?php
namespace App\Models;
use App\Core\Model;
use App\Models\Unite;
use App\Models\CategorieUnite;
use App\Models\Categorie;
class CategorieUnite extends Model{
    public  int $id;
    public int $idCategorie;
    public string $libelle;
    public int $idUnite;
     protected static function tableName(){
               return "categorieunite";
      }
      public Unite $UniteModel;
      public function __construct()
      {
          $this->UniteModel = new Unite;
      }
      
      public function unite(){
        return $this->UniteModel-> find($this->idUnite);
      }
 
      public static function findDetailByCategorie(int $idCategorie){
         return parent::query("select * from ".  self::tableName() ." where idCategorie=:idCategorie  ",["idCategorie"=>$idCategorie]);
      }


     

}

