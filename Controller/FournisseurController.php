<?php
 namespace App\Controllers;

use App\Core\Session;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Fournisseur;

 
class FournisseurController extends Controller{
  
           public function create(){
              
           }
           public function store(){
            // Validator::isVide($_POST['libelle'],"libelle");
            // if(Validator::validate()){

            //   try {
            //     Categorie::create([
            //       "libelle" => $_POST['libelle']
            //      ]);
            //   } catch (\PDOException $th) {
            //     Validator::$errors["libelle"] = "cette categorie existe deja dans la base de donnés";
            //   }
               
            // }
            //   Session::set("errors",Validator::$errors);
            //        $this->redirect("categorie");
           }
           public function index(){   
                  $data = Fournisseur::recupFournisseurs();
                  dd($data);      
           }

           public function indexjs(){   
         
          }

           public function delete(){ 
            
           }

           public function indexUpdate(){
           
            }
            public function update(){
             
           }
}


