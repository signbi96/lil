<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\CategorieVente;
 

// require "./../models/CategorieVente.php";
class CategorieVenteController extends Controller
{
    public function create()
    {

    }
    public function store()
    {

    }
    public function index()
    {
        $data = CategorieVente::all();
        $page=1;
        if(isset($_GET['page'])) {
            $page = intval($_GET['page']);
         }
        $datas=paginnation($data, $page, 4);
        $nombrepage=get_nombre_page($data, 4);
    $this->view("CategorieVente/lister",[ "datas" => $datas],$nombrepage,$page);
    }

    public function delete(){

    }
    public function update(){
     
    }
}