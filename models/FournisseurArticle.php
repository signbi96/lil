<?php
namespace App\Models;
use App\Core\Model;
use App\Models\Fournisseur;
use App\Models\FournisseurArticle;

class FournisseurArticle extends Model{
    public  int $id;
    public int $idFournisseur;
    public int $idArticle;
     protected static function tableName(){
               return "fournisseurarticle";
      }
      public Fournisseur $FournisseureModel;
      public function __construct()
      {
          $this->FournisseurModel = new Fournisseur;
      }
      
      public function fournisseur(){
        return $this->FournisseurModel-> find($this->$idFournisseur);
      }
 
      public static function findDetailByFournisseur(int $idCategorie){
         return parent::query("select * from ".  self::tableName() ." where idFournisseur=:idFournisseur  ",["idFournisseur"=>$idFournisseur]);
      }


}

