<?php 
namespace App\Core;
abstract class Controller{

    public abstract function create();
    public abstract function index();
    public abstract function store();
    public abstract function delete();
    public abstract function update();

    public function __construct()
    {
       Session::openSession();
    }
    

    public function view( string $file,array $data=[],int $nombrepage = null,$page = null){
              extract($data);
              ob_start();
             require("./ressources/Views/".$file.".html.php");
                $recuperateurVue = ob_get_clean();
             require("./ressources/Views/base.layout.html.php");
    }

    public function redirect(string $path){
      header("Location:".WEB_ROUTE."?path=$path");
    }

  public function renderJson(array $datas){
        $JsonArray = json_encode($datas);
        echo( $JsonArray); 
  }

  public function decodeJson(){
       $json = file_get_contents("php://input");
       return json_decode($json,true);
}
    
}