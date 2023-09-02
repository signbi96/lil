<?php 
namespace App\Controllers\Api;

use App\Core\Controller;
use App\Models\ArticleVente;
use App\Models\ArticleConfection;

class ArticleVenteController extends Controller{
    public function create(){
              
    }
    public function store(){
        
     }
     public  function index(){
        $data = ArticleVente::all();
        $this->renderJson($data);  
       }
       
       public function delete(){

       }
       public function update(){
        
       }
 }