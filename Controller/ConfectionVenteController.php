<?php
namespace App\Controllers;

use App\Core\Validator;
use App\Core\Controller;
use App\Models\ArticleVente;
use App\Models\CategorieVente;
use App\Models\ConfectionVente;
use App\Models\ArticleConfection;

class ConfectionVenteController extends Controller
{
    public function create()
    {
       // $data = json_decode(file_get_contents('php://input'),true);
        //dd($_POST);
       // $this->renderJson($dataArticleVentes);
      // $this->decodeJson($_POST);
        ob_start();
        require("../ressources/Views/ConfectionVente/add.html.php");
          $recuperateurVue = ob_get_clean();
        require("../ressources/Views/base.layout.html.php");        
    }
    public function store()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        //Validator::isVide($data[0]["idArticleExiste"],"dateAppro");
        if($articleVenteId != 0){
        if(Validator::validate()){
        $articleVenteId = $data[0]["idArticleExiste"];
            foreach ($data as $key => $value){ 
                $articleConfId = $value[$key]['id'];
                $qteCV = $value[$key]["quantiteSCV"];
                ConfectionVente::create([
                    "qteCV" => $qteCV,
                    "articleConfId" => $articleConfId,
                    "articleVenteId" => $articleVenteId
                  ]);  
               }
               $this->redirect("confectionvente-list");
            }else{
           Session::set("errors",Validator::$errors);
           $this->redirect("confectionvente-add");
           } 
        }else{
           // Validator::isVide($data['libelle'],"dateAppro");
                if(Validator::validate()){    
                 $photo = "test1.jpeg";
                 $dataRecup = ConfectionVente::create([
                      "libelle" => $data[0]['idArticleExiste'],
                      "prixVente" => $data[2]['prixVente'],
                      "quantiteVente" => $data[3]['quantiteVente'],
                      "montant" => $data[4]['montant'],
                      "IdCategotieVente" => $data[5]['IdCategotieVente']
                     ]);  
               } 

               
        }
        


        // Validator::isVide($d['fournisseur'],"fournisseur");
        //    Validator::isVide($_POST['dateAppro'],"dateAppro");
        //     if(Validator::validate()){
        //         $paiement = 0;
        //      $data =  Approvisionnement::create([
        //           "montant" => $_POST['montant'],
        //           "dateAppro" => $_POST['dateAppro'],
        //           "fournisseur" => $_POST['fournisseur'],
        //           "paiement" => $paiement
        //          ]);   
        //          foreach ($_SESSION['arrayDetails'] as $key => $value){     
        //                  $qteStock = $value['qteStock'];
        //                  $articleConfId = $value['id'];
        //                  $approId = $data->getId();
        //                  DetailApprovisionnement::create([
        //                      "qteStock" => $qteStock,
        //                      "articleConfId" => $articleConfId,
        //                      "approId" => $approId
        //                    ]);
        //                      $dataObjet = ArticleConfection::find($articleConfId);
        //                      $quantiteStock = intval($value['qteStock']) + intval($dataObjet->getQteStock());
        //                      ArticleConfection::updateQuantite($articleConfId,$quantiteStock);
        //                  }

        //               $this->redirect("approvisionnement");
        //               unset($_SESSION['arrayDetails']);
        //     }else{
        //       Session::set("errors",Validator::$errors);
        //       $this->redirect("add-approvisionnement");
        //      }         
        
     
    }
    public function index()
    {
        $datass =  ConfectionVente::findDetailByConfectionVente($_SESSION['id']);
        $page=1;
        if(isset($_GET['page'])){
            $page = intval($_GET['page']);
        }
        $datas=paginnation($datass, $page, 4);
        $nombrepage=get_nombre_page($datass, 4);
        $this->view("ConfectionVente/lister", [ "datas" => $datas], $nombrepage, $page);   
       }
    public function delete(){

    }
    public function update(){
     
    }
    public function select(){
        $dataArticles = ArticleConfection::all();
        $this->renderJson($dataArticles);
    }
    public function text(){
        $dataArticles = ArticleVente::all();
        $this->renderJson($dataArticles);
    }

    public function getCategorieSelect(){
        $dataArticles = CategorieVente::all();
        $this->renderJson($dataArticles);
    }

     public function getArticle(){
      $dataArticles = ArticleConfection::find($_GET['value']);
      $this->renderJson($dataArticles);     
    }
}