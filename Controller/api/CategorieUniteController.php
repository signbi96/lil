<?php
namespace App\Controllers\Apia;

use App\Core\Controller;
use App\Models\Categorie;
use App\core\CategorieUnite;

class CategorieUniteController extends Controller
{
    public function create()
    {

    }
    public function store()
    {

    }
    public function index()
    {
       $data =  findDetailByCategorie(1); 
        $this->renderJson($data);
    }
    public function delete(){

    }
    public function update(){
     
    }
}

