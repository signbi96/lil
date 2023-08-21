<?php
 namespace App\Controllers;

use App\Core\Controller;
use App\Models\DetailApprovisionnement;



class DetailApprovisionnementController extends Controller
{
    public function create()
    {

    }
    public function store()
    {

    }
    public function index()
    {
        $datass =  DetailApprovisionnement::findDetailByAppro($_GET['id']);
        $page=1;
        if(isset($_GET['page'])) {
            $page = intval($_GET['page']);
        }
        $datas=paginnation($datass, $page, 4);
        $nombrepage=get_nombre_page($datass, 4);
        $this->view("DetailApprovisionnement/lister", [ "datas" => $datas], $nombrepage, $page);
        
    }
    public function delete(){

    }
    public function update(){
     
    }
}

