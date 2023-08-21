<?php 
 function dd($data) {
      dump($data);
      die();
      
}

function dump($data) {
      echo "<pre>";
       var_dump($data);
      echo "</pre>";
     
      
}
 function paginnation(array $list,int $page,int $nombre_element_page){
      $totalElement=count($list);
      $nombre_page=get_nombre_page($list,$nombre_element_page);
      $start = ($page-1)*$nombre_element_page;
      $stop = ($totalElement-$nombre_page)+$nombre_element_page;
      $arraypage=array();
      for ($i=$start; $i < ($start + $nombre_element_page) ; $i++) {
                  if($i>=$totalElement){
                    return $arraypage;
                  }else{
                    array_push($arraypage,$list[$i]);
                  }
           }
           return $arraypage;
 }
 
 function get_nombre_page(array $list, int $nombre_element_page)
{
 $totalElement=count($list);
 $nombre_page=ceil($totalElement/$nombre_element_page);
 return $nombre_page;
} 

function DateEnFrancais($date):string {
     $date = new DateTime($date);
     return $date->format('d-m-Y');
}
function asset(string $path){
   echo WEB_ROUTE."ressources/$path";
}


