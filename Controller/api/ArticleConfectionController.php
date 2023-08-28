<?php
namespace App\Controllers\Api;
use App\Core\Session;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Categorie;
use App\Models\ArticleConfection;
use App\Models\FournisseurArticle;

class ArticleConfectionController extends Controller{
    public function create(){
        $data = Categorie::all();
        ob_start();
        require("../ressources/Views/ArticleConfection/add.html.php");
          $recuperateurVue = ob_get_clean();
        require("../ressources/Views/base.layout.html.php");   
     }
     public function store(){
      $data = $this->decodeJson();
      $response["dataArticle"] = [] ; 
      define('ROUTE' , 'C:\Users\W10\Desktop\lil\public\ressources\IMAGE\ ');
      Validator::isVide($data['libelle'],"libelle");
      Validator::isVide($data['prixAchat'],"prixAchat");
      Validator::isVide($data['quantite'],"qteStock");
    //  Validator::isVide($data['photo'],"photo");
      if(Validator::validate()){
        $uploadPath = ROUTE . $data['cheminImage'];
        file_put_contents($uploadPath, $data['cheminImage']);
        $lastInsertId = ArticleConfection::create([
            "libelle" => $data['libelle'],
            "prixAchat" => $data['prixAchat'],
            "qteStock" => $data['quantite'],
            "referent" => $data['referent'],
            'photo' => $data['photo'],
            "categorieId" => $data['selectCategorie'],
            "idUnite" => $data['selectUnite']
           ]);
       foreach ($data['data2'] as $key => $value) {
         FournisseurArticle::create([
               "idFournisseur" => $value['id'],
               "idArticle" => $lastInsertId->id,
         ]);     
       }
       
       $response['dataArticle'][] = [
            "libelle" => $data['libelle'],
            "prixAchat" => $data['prixAchat'],
            "qteStock" => $data['quantite'],
            "referent" => $data['referent'],
            "idArticle" => $lastInsertId->id,
        ];
         
      }
      $this->renderJson($response['dataArticle']);    
        // $this->RenderJson($errors);
     }

     
        public function index(){
          
          $data = ArticleConfection::all();
            $this->RenderJson($data);
          }

           public function delete(){
                       
           }
           public function update(){
            
           }
          public function getIdCategorie(){
            $data = $this->decodeJson();  
            $_SESSION['idc'] = $data['idc'];
          }

          //  public function tableGet(){
          //   if(Session::isset('idc')){
          //     $idc = Session::get("idc");
          //    Session::unset("idc");
          //   }
          //   $data = ArticleConfection::find(14) ;
          //     $this->renderJson($data);  
          //    }
         
 }