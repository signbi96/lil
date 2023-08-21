<?php 
namespace App\Controllers;
use App\Core\Session;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Approvisionnement;
use App\Models\ArticleConfection;
use App\Models\DetailApprovisionnement;

class ApprovisionnementController extends Controller
{
    public Approvisionnement $approvisionnement;
    public function __construct()
    {
           $this->approvisionnement = new Approvisionnement;
    }
    public function create(){
        $dataArticles = ArticleConfection::all();
        $dataFournisseurs = $this->approvisionnement->recupFournisseur();
         ob_start();
        require("../ressources/Views/Approvisionnement/add.html.php");
            $recuperateurVue = ob_get_clean();
         require("../ressources/Views/base.layout.html.php"); 
    }

    public function store() {
        if(isset($_POST["ok"])){
           Validator::isVide($_POST['qteStock'],"qteStock");
           Validator::isPositive($_POST['qteStock'],"qteStock");
           Validator::isVide($_POST['id'],"id");
           if(Validator::validate()){      
            $_SESSION['arrayDetails'];
            if (!empty($_SESSION['arrayDetails'])){
               foreach ($_SESSION['arrayDetails'] as $key => $value){
                     if($_POST['id'] == $value['id']){
                        $id = $_POST['id'];
                        $data = ArticleConfection::find($id);
                        $prixAchat = $data->getPrix();
                        $qteStock= $_POST['qteStock'] + $value['qteStock'];
                        $total = $prixAchat * $qteStock ;                      
                        $produit = [
                        "id" => $id,
                        "qteStock" => $qteStock,
                        "prixAchat" => $prixAchat,
                        "total" => $total
                       ]; 
                       unset($_SESSION['arrayDetails'][$key]);  
                     }else{
                        $id = $_POST['id'];
                        $data = ArticleConfection::find($id);
                        $prixAchat = $data->getPrix();
                        $qteStock= $_POST['qteStock'];
                        $total = $prixAchat * intval($qteStock) ;  
                        $produit = [
                        "id" => $id,
                        "qteStock" => $qteStock,
                        "prixAchat" => $prixAchat,
                        "total" => $total
                      ];
                     }
                  }
                }else{
                    $id = $_POST['id'];
                    $data = ArticleConfection::find($id);
                    $prixAchat = $data->getPrix();
                    $qteStock= $_POST['qteStock'];
                    $total = $prixAchat * $qteStock ; 
                    $produit = [
                    "id" => $id,
                    "qteStock" => $qteStock,
                    "prixAchat" => $prixAchat,
                    "total" => $total
                   ];
                }
         
           $_SESSION['arrayDetails'][] = $produit;
           $this->redirect("add-approvisionnement");
           }else {
              Session::set("errors",Validator::$errors);
              $this->redirect("add-approvisionnement");        
           }

        }elseif(isset($_POST['enregistrer'])){
           Validator::isVide($_POST['fournisseur'],"fournisseur");
           Validator::isVide($_POST['dateAppro'],"dateAppro");
            if(Validator::validate()){
                $paiement = 0;
             $data =  Approvisionnement::create([
                  "montant" => $_POST['montant'],
                  "dateAppro" => $_POST['dateAppro'],
                  "fournisseur" => $_POST['fournisseur'],
                  "paiement" => $paiement
                 ]);   
                 foreach ($_SESSION['arrayDetails'] as $key => $value){     
                         $qteStock = $value['qteStock'];
                         $articleConfId = $value['id'];
                         $approId = $data->getId();
                         DetailApprovisionnement::create([
                             "qteStock" => $qteStock,
                             "articleConfId" => $articleConfId,
                             "approId" => $approId
                           ]);
                             $dataObjet = ArticleConfection::find($articleConfId);
                             $quantiteStock = intval($value['qteStock']) + intval($dataObjet->getQteStock());
                             ArticleConfection::updateQuantite($articleConfId,$quantiteStock);
                         }

                      $this->redirect("approvisionnement");
                      unset($_SESSION['arrayDetails']);
            }else{
              Session::set("errors",Validator::$errors);
              $this->redirect("add-approvisionnement");
             }         
        }elseif(isset($_POST['ajouter'])){
               $idNewAppro = $_POST['idArticle']; 
               foreach ($_SESSION['arrayDetails'] as $key => $value){  
                          if(intval($value['id']) === intval($idNewAppro)){
                                  if (intval($_POST['quantiteModal']) <= 0){
                                    unset($_SESSION['arrayDetails'][$key]);  
                                    $this->redirect("add-approvisionnement") ;
                                  }else{
                                    $_SESSION['arrayDetails'][$key]['qteStock'] = $_POST['quantiteModal'];
                                    $_SESSION['arrayDetails'][$key]['total'] = $_SESSION['arrayDetails'][$key]['qteStock'] * $_SESSION['arrayDetails'][$key]['prixAchat'] ;
                                     $this->redirect("add-approvisionnement") ;
                                  }    
                          }
                   }    
        }
        
    }

    public function index()
    
    {
        $data = Approvisionnement::all();
        $page=1;
        if(isset($_GET['page'])) {
            $page = intval($_GET['page']);
        }
        $datas=paginnation($data, $page, 4);
        $nombrepage=get_nombre_page($data, 4);
        $this->view("Approvisionnement/lister", [ "datas" => $datas], $nombrepage, $page);
    }

    public function filtre(){
      $data = Approvisionnement::recupeDonneesFiltrer();
      $page=1;
      if(isset($_GET['page'])) {
          $page = intval($_GET['page']);
      }
      $datas=paginnation($data, $page, 4);
      $nombrepage=get_nombre_page($data, 4);
      $this->view("Approvisionnement/lister", [ "datas" => $datas], $nombrepage, $page);   
    }
    
   public function updatePaiement(){
   
        $idAppro = $_POST['idAppro'];
        $this->approvisionnement-> updatePaiement($idAppro);
        $this->redirect("approvisionnement");
   }  
  
   public function delete(){
          Approvisionnement::deleted($_SESSION['id']);
          $this->redirect("approvisionnement");
   }
   public function update(){
         
   }
}
