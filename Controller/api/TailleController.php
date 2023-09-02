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





