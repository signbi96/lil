<?php
 namespace App\Controllers\Api;

use App\Core\Session;
use App\Models\Unite;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Categorie;
use App\Models\CategorieUnite;

 
class UniteController extends Controller{
  
           public function create(){
              
           }
           public function store(){
            $data = $this->decodeJson(); 
            $responseData["dataUnite"] = [] ;  
            foreach ($data["table"] as $value){
                Validator::isVide($value['id'],"id");
                Validator::isVide($value['libelle'],"libelle");
                Validator::isVide($value['convertisseur'],"convertisseur");
                if(Validator::validate()){
                  $lastInsertId = Unite::create([
                      "libelle" => $value['libelle'],
                      "etat" => 0
                     ]);  
                     CategorieUnite::create([
                         'idCategorie' => $value['id'],
                         'idUnite' => $lastInsertId->id,
                         "libelle" => $value['libelle'],
                         "convertisseur" => $value['convertisseur']
                     ]);

                     $responseData["dataUnite"][] = [
                        "libelle" => $value['libelle'],
                        "convertisseur" => $value['convertisseur'],
                        "idCategorie" =>  $value['id'],
                       ];
                         //echo json_encode($responseData);
                         
                        }
                        // $this->redirect("categorie");    
                    }
                    $this->renderJson($responseData['dataUnite']);    
         }


           public function index(){   
            $data = Unite::all();
            $this->renderJson($data);
           }

           public function delete(){ 
              
           }

           public function indexUpdate(){
            
           }
            public function update(){
             
           }
}


