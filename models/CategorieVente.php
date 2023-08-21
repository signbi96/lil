<?php
namespace App\Models;
use App\Core\Model;
class CategorieVente extends Model{
    public int $id;
    public string $libelle;
    protected static function tableName(){
        return 'categorie_vente';
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        if($id>0){
            $this->id = $id;
        } 
        return $this;
    }
    public function getLibelle(){
        return $this->libelle;
    }
    public function setLibelle($libelle){
        return $this->libelle = $libelle;
        return $this;
    }

}