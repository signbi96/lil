<?php
 namespace App\Controllers\Api;

use App\Core\Session;
use App\Models\Unite;
use App\Models\Taille;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Categorie;

 
class TailleController extends Controller{
  
           public function create(){
              
           }
           public function store(){
            $data = $this->decodeJson();
            Validator::isVide($data['libelle'],"libelle");          
            if(Validator::validate()){
              try {
               $taille = Taille::create([
                  "libelle" => $data['libelle'],
                 ]);
                 $response['Taille'] = [
                  'libelleTaille' => $data['libelle'],
                  'idTaille' => $taille->id,
                 ];
            
              } catch (\PDOException $th) {
                Validator::$errors["libelle"] = "cette categorie existe deja dans la base de donnés";
              }
               echo json_encode($response);      
            }
           }
           public function index(){ 
            $data = Taille::all();
            $this->renderJson($data);
         }

           public function delete(){ 
                
           }

           public function indexUpdate(){
              
          }
            public function update(){
             
           }
}





