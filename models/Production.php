<?php
namespace App\Models;
use App\Core\Model;
class Production extends Model
{
    private int $id;
    private string $dateProd;
    private string $montantProd;
  

    protected static function tableName()
    {
        return "production";
    }

    public ProductionArticle $productionArticle;

    public function __construct()
    {
        // $this->detailapprovisionnement = new DetailApprovisionnement;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        if($id>0) {
            $this->id = $id;
        }

        return $this;
    }
    public function getdate()
    {
        return $this->dateProd;
    }

    public function setdate($date)
    {
        $this->dateProd = $date;

        return $this;
    }

    public function getMontant()
    {
        return $this->montantProd;
    }

    public function setMontant($montant)
    {
        $this->montantProd = $montant;

        return $this;
    }


    


}
