<?php
 namespace App\Controllers\Api;

use App\Core\Session;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Fournisseur;

 
class FournisseurController extends Controller{
  
           public function create(){
              
           }
           public function store(){
              $data = $this->decodeJson();
              Validator::isVide($data['nom'],"nom");
              Validator::isVide($data['prenom'],"prenom");
              Validator::isVide($data['email'],"email");
              Validator::isVide($data['password'],"password");
              if(Validator::validate()){
                  Fournisseur::create([
                    "nom" => $data['nom'],
                    "prenom" => $data['prenom'],
                    "email" => $data['email'],
                    "password" => $data['password']
                   ]);   
              }
              // $this->redirect("categorie");
           }
           public function index(){   
                  $data = Fournisseur::recupFournisseurs();
                  $this->renderJson($data);     
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
