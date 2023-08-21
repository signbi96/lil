<?php
namespace App\Core;
class Rooter {
    private static array $route = [];

    public static function route(string $uri,array $controller){
        self::$route[$uri] = $controller;
    }



    public static function resolve(){
        if(isset($_SERVER['REQUEST_URI'])){ 
               
              [$crtlClass,$action] = self::$route[$_SERVER['REQUEST_URI']];
              if(class_exists($crtlClass) && method_exists($crtlClass,$action)){
                  $ctrl = new $crtlClass;
                  $ctrl->$action();     
              }else{
                echo "erreur controlleur";
               }
        }else {
            echo "erereur 404";
        }
}

}
