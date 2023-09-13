<?php 
namespace App\Controllers\Api;

use App\Core\Validator;
use App\Core\Controller;
use App\Models\ArticleVente;
use App\Models\ArticleTaille;
use App\Models\ConfectionVente;
use App\Models\ArticleConfection;

class ArticleVenteController extends Controller{
    public function create(){
              
    }
    public function store(){
    $data = $this->decodeJson();
  define('ROUTE' , 'C:\Users\W10\Desktop\lil\public\ressources\IMAGE\ ');
  Validator::isVide($data['libelle'],"libelle");
  Validator::isVide($data['prixVente'],"prixVente");
  Validator::isVide($data['marge'],"marge");
  if(Validator::validate()){
    $etatAV = 1;
    $uploadPath = ROUTE . $data['cheminImage'];
    file_put_contents($uploadPath, $data['cheminImage']);
    $lastInsertId = ArticleVente::create([
        "libelle" => $data['libelle'],
        "prixVente" => $data['prixVente'],
        "quantiteVente" => $data['coutProduction'],
        "coutProduction" => $data['coutProduction'],
        'photo' => $data['photo'], 
        "IdCategorieVente" => $data['selectCategorie'],
        "referent" => $data['referent'],
        "marge" => $data['marge'],
        "idTaille" => $data['selectTaille'],
        "etatAV" => $etatAV
       ]);

       ArticleTaille::create([
        "idArticle" => $lastInsertId->id,
        "idTaille" =>  $data['selectTaille']
        ]);     
       
   foreach ($data['formValues'] as $key => $value){
     ConfectionVente::create([
           "quantite" => $value['quantite'],
           "idArticleConfection" => $value['id'],
           "idArticleVente" => $lastInsertId->id,
        ]);     
   }
    
  }
  
     }
     public  function index(){
        $data = ArticleVente::all22(1);
        $this->renderJson($data);  
       }
       
       public function delete(){
          $data = $this->decodeJson();   
           ArticleVente::deleted($data['id']);
           $response = ArticleVente::all22(1);
           $this->renderJson($response);
       }
       public function update(){
        
       }
 }