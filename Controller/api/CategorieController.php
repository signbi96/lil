<?php
 namespace App\Controllers\Api;
use App\Core\Session;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Categorie;

 
class CategorieController extends Controller{
  
           public function create(){
              
           }
           public function store(){
            $data = $this->decodeJson();
            Validator::isVide($data['libelle'],"libelle");
            if(Validator::validate()){
              try {
                Categorie::create([
                  "libelle" => $data['libelle']
                 ]);
              } catch (\PDOException $th) {
                Validator::$errors["libelle"] = "cette categorie existe deja dans la base de donnés";
              }
               
            }
               // Session::set("errors",Validator::$errors);
              // $errors['erreur'] = "champ obligatoire";
              $errors['erreur'] = "erreur code";
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


