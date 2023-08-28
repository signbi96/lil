<?php
namespace App\Controllers\Api;

use App\Core\Session;
use App\Core\Controller;
use App\Models\Categorie;
use App\Models\CategorieUnite;
use App\Models\ArticleConfection;

class CategorieUniteController extends Controller
{
    public function create()
    {

    }
    public function store()
    {

    }
    public function recupIdCategorie(){     
        $data = $this->decodeJson();  
        $_SESSION['id'] = $data['id'];
      }
    public function index()
    {
        if(Session::isset('id')){
            $id = Session::get("id");
           Session::unset("id");
          }
        $data = CategorieUnite::findDetailByCategorie($id); 
        $this->renderJson($data);
    }

    
  
    public function delete(){

    }
    public function update(){
     
    }
}

