<?php 
namespace App\Models;
use App\Core\Model;

class Unite extends Model{
         public int $id;
         public string $libelle;
         public int $etat;
          protected static function tableName(){
                return "unite";
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
         public function getlibelle()
         {
                  return $this->libelle;
         }

         public function setLibelle($libelle)
         {
                  $this->libelle = $libelle;

                  return $this;
         }
        
 }