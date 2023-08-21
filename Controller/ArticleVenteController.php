<?php 
namespace App\Controllers;

use App\Core\Controller;
use App\Models\ArticleVente;
use App\Models\ArticleConfection;

class ArticleVenteController extends Controller{
    public function create(){
            $dataArticles = ArticleConfection::all();
            $dataCategories = CategorieVente::all();
            ob_start();
            require("../ressources/Views/ArticleVente/add.html.php");
              $recuperateurVue = ob_get_clean();
            require("../ressources/Views/base.layout.html.php");      
    }
    public function store(){
  //     if(isset($_POST["ok"])){
  //       Validator::isVide($_POST['qteCV'],"qteCV");
  //       Validator::isPositive($_POST['qteCV'],"qteCV");
  //       Validator::isVide($_POST['id'],"id");
  //       if(Validator::validate()){      
  //        $_SESSION['arrayDetails'];
  //        if (!empty($_SESSION['arrayDetails'])){
  //           foreach ($_SESSION['arrayDetails'] as $key => $value){
  //                 if($_POST['id'] == $value['id']){
  //                    $id = $_POST['id'];
  //                    $data = ArticleConfection::find($id);
  //                    $prixAchat = $data->getPrix();
  //                    $qteCV= $_POST['qteCV'] + $value['qteCV'];
  //                    $total = $prixAchat * $qteCV ;                      
  //                    $produit = [
  //                    "id" => $id,
  //                    "qteCV" => $qteCV,
  //                    "prixAchat" => $prixAchat,
  //                    "total" => $total
  //                   ]; 
  //                   unset($_SESSION['arrayDetails'][$key]);  
  //                 }else{
  //                    $id = $_POST['id'];
  //                    $data = ArticleConfection::find($id);
  //                    $prixAchat = $data->getPrix();
  //                    $qteCV= $_POST['qteCV'];
  //                    $total = $prixAchat * intval($qteCV) ;  
  //                    $produit = [
  //                    "id" => $id,
  //                    "qteCV" => $qteCV,
  //                    "prixAchat" => $prixAchat,
  //                    "total" => $total
  //                  ];
  //                 }
  //              }
  //            }else{
  //                 $id = $_POST['id'];
  //                 $data = ArticleConfection::find($id);
  //                 $prixAchat = $data->getPrix();
  //                 $qteCV= $_POST['qteCV'];
  //                 $total = $prixAchat * intval($qteCV) ;  
  //                 $produit = [
  //                 "id" => $id,
  //                 "qteCV" => $qteCV,
  //                 "prixAchat" => $prixAchat,
  //                 "total" => $total
  //               ];
  //            }
      
  //       $_SESSION['arrayDetails'][] = $produit;
  //       $this->redirect("articleVente-add");
  //       }else {
  //          Session::set("errors",Validator::$errors);
  //          $this->redirect("articleVente-add");        
  //       }

  //    }elseif(isset($_POST['enregistrer'])){
  //     Validator::isVide($_POST['libelle'],"libelle");
  //     Validator::isVide($_POST['prixVente'],"prixVente");
  //     Validator::isVide($_POST['quantiteVente'],"quantiteVente");
  //     Validator::isVide($_POST['montant'],"montant");
  //     Validator::isVide($_POST['montant'],"montant");
  //     Validator::isVide($_POST['IdCategorieVente'],"IdCategorieVente");
  //      if(Validator::validate()){
  //          $photo = "test.jpg";
  //       $data = ArticleVente::create([
  //            "libelle" => $_POST['libelle'],
  //            "prixVente" => $_POST['prixVente'],
  //            "quantiteVente" => $_POST['quantiteVente'],
  //            "montant" => $_POST['montant'],
  //            "photo" => $photo,
  //            "IdCategorieVente" => $_POST['IdCategorieVente']
  //           ]);
          
  //           foreach ($_SESSION['arrayDetails'] as $key => $value){     
  //                   $qteCV = $value['qteCV'];
  //                   $articleConfId = $value['id'];
  //                   $articleVenteId = $data->getId();
  //                   ConfectionVente::create([
  //                       "qteCV" => $qteCV,
  //                       "articleConfId" => $articleConfId,
  //                       "articleVenteId" => $articleVenteId
  //                     ]);
  //                       // $data = ArticleConfection::find($articleConfId);
  //                       // $quantiteStock = $value['qteStock'] + $data->getQteStock();
  //                       // ArticleConfection::updateQuantite($articleConfId,$quantiteStock);
  //                   }

  //        $this->redirect("article_vente");
  //        unset($_SESSION['arrayDetails']);
  //      }else{
  //        Session::set("errors",Validator::$errors);
  //        $this->redirect("articleVente-add");
  //       }         
  //  }
  
    }
    public  function index(){
      $data = ArticleVente::all();
      $page=1;
      if(isset($_GET['page'])) {
          $page = intval($_GET['page']);
       }
       $datas=paginnation($data, $page, 4);
       $nombrepage=get_nombre_page($data, 4);
       $this->view("ArticleVente/lister",[ "datas" => $datas],$nombrepage,$page);
       }
       
       public function delete(){

       }
       public function update(){
        
       }
 }
