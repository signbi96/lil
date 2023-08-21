<?php 
//define("WEB_ROUTE" , "http://seneabdou.alwaysdata.net/");
define("WEB_ROUTE" , "http://localhost:8000/");
DEFINE('HOST_BD','127.0.0.1');
define('ROUTE_DIR', str_replace ('Public', '' , $_SERVER['DOCUMENT_ROOT']));
define("USER_DB" , 'root' );
define("PASSWORD_DB" , "" );
define("CHAINE_DE_CONNEXION" , 'mysql:dbname=semestre;host='.HOST_BD);

define("UPLOAD_DIR" , ROUTE_DIR. 'Public/Image/Uploads/');

require_once "../helpers/help.php";
require_once "../route/web.php";
require_once "../route/api.php";

?>