<?php
 namespace App\Controllers\Api;

use App\Core\Controller;
use App\Models\ArticleVente;
use App\Models\CategorieVente;
use App\Models\ConfectionVente;
use App\Models\ArticleConfection;

class ConfectionVenteController extends Controller
{
    public function create()
    {
        
       // $this->renderJson($dataArticleVentes);
        ob_start();
        require("../ressources/Views/ConfectionVente/add.html.php");
          $recuperateurVue = ob_get_clean();
        require("../ressources/Views/base.layout.html.php");        
    }
    public function store()
    {
            
    }
    public function index()
    {
        $data = ConfectionVente::all();
         $this->renderJson($data);
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

    public function createApia(){
      
    }
}