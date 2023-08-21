<?php
 namespace App\Controllers;

use App\Core\Session;
use App\Models\Unite;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Categorie;

 
class UniteController extends Controller{
  
           public function create(){
              
           }
           public function store(){
          
           }
           public function index(){ 
            die("je suis dans l'index") ;
           dd($data = Unite::all());
           // $this->renderJson($data);
           }
           public function indexjs(){   
            $data = Categorie::all();
            $page=1;
            if(isset($_GET['page'])) {
                $page = intval($_GET['page']);
             }
            $datas=paginnation($data, $page, 4);
            $nombrepage=get_nombre_page($data, 4);
        $this->view("CategorieConfection/lister.js");
     }

           public function delete(){ 
                Categorie::deleted($_POST['idCategorie']);
                 $this->redirect("categorie");
           }

           public function indexUpdate(){
            
       }
            public function update(){
             
           }
}





