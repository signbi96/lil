<?php
namespace App\Controllers;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Categorie;
use App\Models\ArticleConfection;

class ArticleConfectionController extends Controller{
    public function create(){
        $data = Categorie::all();
        ob_start();
        require("./ressources/Views/ArticleConfection/add.html.php");
          $recuperateurVue = ob_get_clean();
        require("./ressources/Views/base.layout.html.php");   
     }


     public function createjs(){
      $data = Categorie::all();
      ob_start();
      require("./ressources/Views/ArticleConfection/jsadd.html.php");
        $recuperateurVue = ob_get_clean();
      require("./ressources/Views/base.layout.html.php");   
   }

   public function store(){}
     
    public function storejs(){
      Validator::isVide($_POST['libelle'],"libelle");
      Validator::isVide($_POST['prixAchat'],"prixAchat");
      Validator::isVide($_POST['qteStock'],"qteStock");
      Validator::isPositive($_POST['prixAchat'],"prixAchat");
      Validator::isPositive($_POST['qteStock'],"qteStock");
      if(Validator::validate()){
         $photo = "image.jpeg";
        try {
         
          ArticleConfection::create([
            "libelle" => $_POST['libelle'],
            "prixAchat" => $_POST['prixAchat'],
            "qteStock" => $_POST['qteStock'],
            "photo" => $photo,
            "categorieId" => $_POST["categorieId"]
           ]);
           
        } catch (\PDOException $th) {
          Validator::$errors["libelle"] = "cette categorie existe deja dans la base de donnés";
        }
        $this->redirect("article_confection");
      }else{
        Session::set("errors",Validator::$errors);
        $this->redirect("add");
      }
       
    }
    public function index(){
      $data = ArticleConfection::all();
      $page=1;
      if(isset($_GET['page'])) {
          $page = intval($_GET['page']);
       }
      $datas=paginnation($data, $page, 4);
      $nombrepage=get_nombre_page($data, 4);
      $this->view("ArticleConfection/lister",[ "datas" => $datas],$nombrepage,$page);
           }


           public function delete(){
                       
           }
           public function update(){
            
           }
         
 }