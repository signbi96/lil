<?php
 namespace App\Controllers\Api;
use App\Core\Session;
use App\Models\Unite;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Categorie;
use App\Models\CategorieUnite;

 
class CategorieController extends Controller{
           public function create(){
              
           }
           public function store(){
            $data = $this->decodeJson();
            Validator::isVide($data['libelle'],"libelle");
           // Validator::isVide($data['libelleModal'],"libelle");
            Validator::isVide($data['convertisseur'],"convertisseur");
           
            if(Validator::validate()){
              $etatc = 0;
              try {
               $categorie = Categorie::create([
                  "libelle" => $data['libelle'],
                  "etatc" => $etatc
                 ]);
                 $etat = 1;
                $unite = Unite::create([
                  "libelle" => $data['libelleModal'],
                  "etat" => $etat
                ]);
                CategorieUnite::create([
                      "idCategorie" => $categorie->id,
                      "idUnite" => $unite->id,
                      "libelle" => $data['libelleModal'],
                      "convertisseur" => $data['convertisseur']
                  ]);

                  $response['dataCategorie'] = [
                    'libelleCategorie' => $data['libelle'],
                    'idCategorie' => $categorie->id,
                    'libelleUnite' =>  $data['libelleModal'],
                    'idUnite' => $unite->id,
                    'convertisseur' => $data['convertisseur']
                   ];

            
              } catch (\PDOException $th) {
                Validator::$errors["libelle"] = "cette categorie existe deja dans la base de donnés";
              }
                 echo json_encode($response);
               
            }
             
           }


           public function store1(){
            $data = $this->decodeJson();
            Validator::isVide($data['libelle'],"libelle");          
            if(Validator::validate()){
              $etatc = 1;
              try {
               $categorie2 = Categorie::create([
                  "libelle" => $data['libelle'],
                  "etatc" => $etatc
                 ]);

                 $response['Categorie'] = [
                  'libelleCategorie' => $data['libelle'],
                  'idCategorie' => $categorie2->id,
                 ];
            
              } catch (\PDOException $th) {
                Validator::$errors["libelle"] = "cette categorie existe deja dans la base de donnés";
              }
              echo json_encode($response);     
            }
           }

           public function index(){      
                  $data = Categorie::all();
                  $this->renderJson($data);      
           }

           public function index1(){      
            $data = Categorie::all2(1);
            $this->renderJson($data);      
           }

           public function index2(){      
            $data = Categorie::all2();
            $this->renderJson($data);      
     }

           public function delete(){ 
                
           }

           public function indexUpdate(){
           
            }
            public function update(){
           
           }
}


