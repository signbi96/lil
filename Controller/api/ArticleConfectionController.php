<?php
namespace App\Controllers\Api;
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
      Validator::isVide($data['libelle'],"libelle");
      Validator::isVide($data['prixAchat'],"prixAchat");
      Validator::isVide($data['quantite'],"qteStock");
    //  Validator::isVide($data['photo'],"photo");
      if(Validator::validate()){
        $lili = "test.jpg";
        $lastInsertId = ArticleConfection::create([
            "libelle" => $data['libelle'],
            "prixAchat" => $data['prixAchat'],
            "qteStock" => $data['quantite'],
            "referent" =>substr($data['libelleCategorie'], 0, 3)."-".substr($data['libelle'], 0, 4)."-".$data['selectCategorie'],
            "photo" => $lili, //$data['photo'],
            "categorieId" => $data['selectCategorie'],
            "idUnite" => $data['selectUnite']
           ]);
       foreach ($data['table'] as $key => $value) {
         FournisseurArticle::create([
               "idFournisseur" => $value['idf'],
               "idArticle" => $lastInsertId->id,
         ]);     
       }
         
      }
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
         
 }