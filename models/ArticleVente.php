<?php 
namespace App\Models;
use App\Core\Model;
class ArticleVente extends Model{
    public int $id;
    public string $libelle;
    public float $prixVente;
    public int $quantiteVente;
    public float $montant;
    public string $photo;
    public int $IdCategorieVente;
      //Navigation 
    public CategorieVente $categorie_vente;

    public function __construct(){  
        $this->categorie_vente = new CategorieVente();
    }
    
        //Navigabite   ManyToOne
    public function getCategorieVente(){
       return  $this->categorie_vente->find($this->IdCategorieVente);
    }

 
    protected static function tableName(){
        return "article_vente";
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
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }
    /**
     * Get the value of libelle
     */ 
   
    /**
     * Get the value of prix
     */ 
    public function getprixVente()
    {
        return $this->prixVente;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setprixVente($prix)
    {
        $this->prixVente = $prix;

        return $this;
    }

    /**
     * Get the value of qteStock
     */ 
    public function getquantiteVente()
    {
        return $this->quantiteVente;
    }

    /**
     * Set the value of qteStock
     *
     * @return  self
     */ 
    public function setquantiteVente($qteStock)
    {
        $this->quantiteVente = $qteStock;

        return $this;
    }


    public function getmontant()
    {
        return $this->montant;
    }

    /**
     * Set the value of qteStock
     *
     * @return  self
     */ 
    public function setmontant($montant)
    {
        $this->montant = $montant;

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
public function getIdCategorieVente(){
    return $this->IdCategorieVente;
}
public function setIdCategorieVente($id){
      if($id>0){
        $this->IdCategorieVente = $id;
      }
      return $this;
}
     

   
}