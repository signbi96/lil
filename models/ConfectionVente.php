<?php
namespace App\Models;
use App\Core\Model;
class ConfectionVente extends Model{
    public  int $id;
    public int $qteCV;
    public int $idArticleConfection;
    public int $idArticleVente;
     protected static function tableName(){
               return "ConfectionVente";
      }
      public ArticleConfection $articleModel;
      public function __construct()
      {
          $this->articleModel = new ArticleConfection;
      }
      
      public function article(){
        return $this->articleModel-> find($this->idArticleConfection);
      }
 
      public static function findDetailArticleVente(int $idArticleVente){
         return parent::query("select * from ".  self::tableName() ." where idArticleConfection=:idArticleConfection  ",["idArticleConfection"=>$idArticleConfection]);
      }
      
}