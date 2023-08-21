<?php
 namespace App\Controllers;

use App\Core\Session;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Categorie;

 
class CategorieController extends Controller{
  
           public function create(){
              
           }
           public function store(){
            Validator::isVide($_POST['libelle'],"libelle");
            if(Validator::validate()){

              try {
                Categorie::create([
                  "libelle" => $_POST['libelle']
                 ]);
              } catch (\PDOException $th) {
                Validator::$errors["libelle"] = "cette categorie existe deja dans la base de donnés";
              }
               
            }
              Session::set("errors",Validator::$errors);
                   $this->redirect("categorie");
           }
           public function index(){   
                  $data = Categorie::all();
                  $page=1;
                  if(isset($_GET['page'])) {
                      $page = intval($_GET['page']);
                   }
                  $datas=paginnation($data, $page, 4);
                  $nombrepage=get_nombre_page($data, 4);
              $this->view("CategorieConfection/lister",[ "datas" => $datas],$nombrepage,$page);
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
            $data = Categorie::all();
            $page=1;
            if(isset($_GET['page'])) {
                $page = intval($_GET['page']);
             }
            $datas=paginnation($data, $page, 4);
            $nombrepage=get_nombre_page($data, 4);
        $this->view("CategorieConfection/lister",[ "datas" => $datas],$nombrepage,$page);
       }
            public function update(){
              // Validator::isVide($_POST['libelle'],"libelle");
              // if(Validator::validate()){
              //   try {
              //     Categorie::updated($_SESSION["id"],[
              //       "libelle" => $_POST['libelle']
              //      ]);
              //   } catch (PDOException $th) {
              //     Validator::$errors["libelle"] = "cette categorie existe deja dans la base de donnés";
              //   }
                 
              // }
              //   Session::set("errors",Validator::$errors);
              //        $this->redirect("categorie");
           }
}


