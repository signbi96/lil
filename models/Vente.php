<?php 
namespace App\Models;
use App\Core\Model;
class Vente extends Model{
    private int $id;
    private float $prix;
    private int $quantite;
    private float $montant;
    private string $date;
    private string $observation;

    protected static function tableName(){
        return 'vente';
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

    public function getPrixVente()
    {
        return $this->prix;
    }

    public function setPrixVente($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }
 
    public function setQuantite($qteStock)
    {
        $this->quantite = $qteStock;

        return $this;
    }

    public function getMontant()
    {
        return $this->montant;
    }
 
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }
 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function getObservation()
    {
        return $this->observation;
    }
 
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

}