<?php 
namespace App\Controllers;

use App\Core\Session;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Production;
use App\Models\ArticleVente;
use App\Models\ConfectionVente;
use App\Models\ProductionArticle;

class ProductionController extends Controller{
    public Production $production;
    public function __construct()
    {
           $this->production = new production;
    }
    public function create(){
        $articleVentes = ArticleVente::all();
         ob_start();
        require("../ressources/Views/Production/add.html.php");
            $recuperateurVue = ob_get_clean();
         require("../ressources/Views/base.layout.html.php"); 
    }
      public function index()
      {
          $data = Production::all();
          $page=1;
          if(isset($_GET['page'])) {
              $page = intval($_GET['page']);
          }
          $datas=paginnation($data, $page, 4);
          $nombrepage=get_nombre_page($data, 4);
          $this->view("Production/lister", [ "datas" => $datas], $nombrepage, $page);
      }
    public function store(){
        if(isset($_POST["ok"])){
            Validator::isVide($_POST['quantitePA'],"quantitePA");
            Validator::isPositive($_POST['quantitePA'],"quantitePA");
            Validator::isVide($_POST['id'],"id");

            //traitement des conditions

            // $dataDetailArticles = ConfectionVente::findDetailByConfectionVente($_POST['id']);
            // foreach ($dataDetailArticles as $key => $value) { 
            //           if(intval($_POST['quantitePA'])*intval($value->getQuantite()) > $value->article()->getQteStock()){
            //             $_SESSION['message'] = $value->article()->getLibelle(). "a une quantite insuffisant";
            //           } 
            // }
            
            //fin traitements 

            if(Validator::validate()){            
             $_SESSION['arrayDetails'];
             if (!empty($_SESSION['arrayDetails'])){
                foreach ($_SESSION['arrayDetails'] as $key => $value){
                      if($_POST['id'] == $value['id']){
                         $id = $_POST['id'];
                         $data = ArticleVente::find($id);
                         $prixAchat = $data->getprixVente();
                         $quantitePA= $_POST['quantitePA'] + $value['quantitePA'];
                         $total = $prixAchat * $quantitePA ;                      
                         $produit = [
                         "id" => $id,
                         "quantitePA" => $quantitePA,
                         "prixAchat" => $prixAchat,
                         "total" => $total
                        ]; 
                        unset($_SESSION['arrayDetails'][$key]);  
                      }else{
                         $id = $_POST['id'];
                         $data = ArticleVente::find($id);
                         $prixAchat = $data->getprixVente();
                         $quantitePA= $_POST['quantitePA'];
                         $total = $prixAchat * intval($quantitePA) ;  
                         $produit = [
                         "id" => $id,
                         "quantitePA" => $quantitePA,
                         "prixAchat" => $prixAchat,
                         "total" => $total
                       ];
                      }
                   }

                 }else{
                    $id = $_POST['id'];
                    $data = ArticleVente::find($id);
                    $prixAchat = $data->getprixVente();
                    $quantitePA= $_POST['quantitePA'];
                    $total = $prixAchat * intval($quantitePA) ;  
                    $produit = [
                    "id" => $id,
                    "quantitePA" => $quantitePA,
                    "prixAchat" => $prixAchat,
                    "total" => $total
                  ];
                 }
          
            $_SESSION['arrayDetails'][] = $produit;
            $this->redirect("production-add");
            }else {
               Session::set("errors",Validator::$errors);
               $this->redirect("production-add");        
            }
 
         }elseif(isset($_POST['enregistrer'])){
            Validator::isVide($_POST['dateProd'],"dateProd");
             if(Validator::validate()){
              $data =  Production::create([
                   "dateProd" => $_POST['dateProd'],
                   "montantProd" => $_POST['montantProd'],
                  ]);
                  foreach ($_SESSION['arrayDetails'] as $key => $value){     
                          $quantitePA = $value['quantitePA'];
                          $idArticleVente = $value['id'];
                          $prodId = $data->getId();
                          ProductionArticle::create([
                              "quantitePA" =>  $quantitePA,
                              "idArticleVente" => $idArticleVente,
                              "prodId" => $prodId
                            ]);
                        
                          }
 
               $this->redirect("production-list");
               unset($_SESSION['arrayDetails']);
             }else{
               Session::set("errors",Validator::$errors);
               $this->redirect("production-add");
              } 
              
    }elseif (isset($_POST['ajouter'])){
              foreach ( $_SESSION['arrayDetails'] as $key => $value) {
                     if(intval($value['id']) === intval($_POST['idArticle'])){
                          if(intval($_POST['quantiteModal']) <= 0){
                                  unset($_SESSION['arrayDetails'][$key]);
                                  $this->redirect("production-add");
                          }else{
                           $_SESSION['arrayDetails'][$key]["quantitePA"] = intval($_POST['quantiteModal']);
                            $this->redirect("production-add");
                          }
                     }
              }
    }
    
        
    }
    public function productionJava(){
           $data = ArticleVente::all();
           $this->renderJson($data);
    }

    public function delete(){

    }
    public function update(){

    }
}