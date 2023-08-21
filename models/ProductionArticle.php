<?php 
namespace App\Models;
use App\Core\Model;
class ProductionArticle extends Model{
    private int $id;
    private int $quantitePA;
    private string $dateProd;
    public int $idArticleVente;
    public int $prodId;

    protected static function tableName(){
        return 'productionarticle';
    }

    public ArticleVente $articleModel;
    public function __construct()
    {
        $this->articleModel = new ArticleVente;
    }

    public function getId()
    {
             return $this->id;
    }

    public function setId($id)
    {
         if($id>0){
           $this->id = $id;
         }

             return $this;
    }


    public function getQuantite()
    {
        return $this->quantitePA;
    }
 
    public function setQuantite($qteStock)
    {
        $this->quantitePA = $qteStock;

        return $this;
    }

    public function article(){
        return $this->articleModel->find($this->idArticleVente);
      }
 
      public static function findDetailByProduction(int $prodId){
         return parent::query("select * from ".  self::tableName() ." where prodId=:prodId  ",["prodId"=>$prodId]);
      }


}