<?php
namespace App\Models;
use App\Core\Model;
class Approvisionnement extends Model
{
    public int $id;
    public int $montant;
    public string $dateAppro;
    public string $fournisseur;
    public int $paiement;

    protected static function tableName()
    {
        return "approvisionnement";
    }

    public DetailApprovisionnement $detailapprovisionnement;

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
    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    public function getpaiement()
    {
        return $this->paiement;
    }

    public function setpaiement($montant)
    {
        $this->paiement = $montant;

        return $this;
    }

    public function getDate()
    {
        return $this->dateAppro;
    }

    public function setDate($date)
    {
        $this->dateAppro = $date;

        return $this;
    }
    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */
    public function setFournisseur($fournisseur)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public static function SearchByDateOrByPaiement($filtre)
    {
        $bdd = parent::openConnexion();
        $req = $bdd->prepare(" SELECT * FROM '.static::tableName().' where dateAppro like '% $filtre %' ");
        $req->execute(array($filtre));
        $data=$req->fetchAll(PDO::FETCH_CLASS, get_called_class());
        $req->closeCursor();
        return $data;

    }

    public static function recupeDonneesFiltrer(): array
    {

        $textinput = "";
        $textselect= "";
        if (isset($_GET['filtreur'])) {
            $textinput = $_GET["dateAppro"];
            $textselect = $_GET['paiement'];
        }
        $datass = Approvisionnement::all();
        $data =[];
        foreach ($datass as $value) {
            if ($textinput !== "") {
                if ((strpos($value->getDate(), $textinput) !== false)) {
                    $data[] = $value;
                }
            } elseif($textinput === "") {
                if(intval($value->getpaiement()) === intval($textselect)) {
                    $data[] = $value;
                }
            } elseif(($textinput !== "") && ($textselect !== -1)) {
                if((strpos($value->getDate(), $textinput) !== false) && (intval($value->getpaiement()) === intval($textselect))) {
                    $data[] = $value;
                }
            }
        }
        return $data;
    }

    public function FormatPaiement(): string
    {
        return $this->getpaiement() == true ? "payer" : "impayer";
    }

    public function updatePaiement(int $approId, int $paiement = 1)
    {
        return self::ExecuteUpdate("UPDATE `approvisionnement` SET `paiement` = :paiement WHERE `approvisionnement`.`id` = :approId ; ", [
         "approId"=>$approId,
         "paiement"=>$paiement
        ]);
    }


    public function recupFournisseur(){
        return self::query('SELECT DISTINCT fournisseur FROM '.static::tableName());
    }



}
