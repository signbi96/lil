<?php 
namespace App\Models;
use App\Core\Model;
class ArticleConfection extends Model{
    public int $id;
    public string $libelle;
    public float $prixAchat;
    public int $qteStock;
    public string $photo;
    public int $categorieId;
      //Navigation 
    public Categorie $categorie;

    public function __construct(){  
        $this->categorie = new Categorie();
    }
    
        //Navigabite   ManyToOne
    public function getCategorie(){
       return  $this->categorie->find($this->categorieId);
    }

 
    protected static function tableName(){
        return "article_confection";
    }
 
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prixAchat;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prixAchat = $prix;

        return $this;
    }

    /**
     * Get the value of qteStock
     */ 
    public function getQteStock()
    {
        return $this->qteStock;
    }

    /**
     * Set the value of qteStock
     *
     * @return  self
     */ 
    public function setQteStock($qteStock)
    {
        $this->qteStock = $qteStock;

        return $this;
    }

    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }
public function getCategorieId(){
    return $this->categorieId;
}
public function setCategorieId($id){
      if($id>0){
        $this->categorieId = $id;
      }
      return $this;
}
    
public static function updateQuantite(int $id,int $qteStock){
    return self::ExecuteUpdate("UPDATE `article_confection` SET `qteStock` = :qteStock WHERE `article_confection`.`id` = :id; ",[
     "id"=>$id,
     "qteStock"=>$qteStock
    ]);
 }

 public static function recupFournisseurs(){
    return self::query('SELECT DISTINCT fournisseur FROM '.static::tableName());
}

}