<?php 
namespace App\Controllers;

use App\Core\Controller;
use App\Models\ArticleVente;
use App\Models\ArticleConfection;

class ArticleVenteController extends Controller{
    public function create(){
             
    }
    public function store(){
        
     }
     public  function index(){
         
     
       }

       public function createjs(){
        ob_start();
        require("./ressources/Views/ArticleVente/jsadd.html.php");
          $recuperateurVue = ob_get_clean();
        require("./ressources/Views/base.layout.html.php");   
     }

     public function storejs(){
        
    }
       
       public function delete(){

       }
       public function update(){
        
       }
 }
