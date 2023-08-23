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
            Validator::isVide($data['libelleModal'],"libelle");
            Validator::isVide($data['convertisseur'],"convertisseur");
           
            if(Validator::validate()){
              try {
               $categorie = Categorie::create([
                  "libelle" => $data['libelle']
                 ]);

                $unite = Unite::create([
                  "libelle" => $data['libelleModal'],
                  "convertisseur" => $data['convertisseur']
                ]);
                CategorieUnite::create([
                      "idCategorie" => $categorie->id,
                      "idUnite" => $unite->id,
                      "libelle" => $data['libelleModal'],
                  ]);

              } catch (\PDOException $th) {
                Validator::$errors["libelle"] = "cette categorie existe deja dans la base de donnés";
              }
               
            }
               // Session::set("errors",Validator::$errors);
               
              // $errors['erreur'] = "champ obligatoire";
              //$errors['erreur'] = "erreur code";
             //$this->renderJson($errors);
            //dd($datinho);
         
            // $this->redirect("categorie");
           }

           public function index(){      
                  $data = Categorie::all();
                  $this->renderJson($data);      
           }

           public function delete(){ 
                
           }

           public function indexUpdate(){
           
            }
            public function update(){
           
           }
}


