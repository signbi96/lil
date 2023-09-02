
<?php

use App\Core\Rooter;
use App\Controllers\Api\UniteController;
use App\Controllers\Api\ArticleVenteController;
use App\Controllers\Api\CategorieController;
use App\Controllers\Api\FournisseurController;
use App\Controllers\Api\CategorieUniteController;
use App\Controllers\Api\ConfectionVenteController;
use App\Controllers\Api\ArticleConfectionController;
use App\Controllers\Api\TailleController;

Rooter::route("/api/categorie",[CategorieController::class,'index']);
Rooter::route("/api/categorie-add",[CategorieController::class,'store']);
Rooter::route("/api/categorie/list",[CategorieController::class,'index2']);
Rooter::route("/api/categorieVente",[CategorieController::class,'index1']);


Rooter::route("/api/confectionvente-add-select",[ConfectionVenteController::class,'select']);
Rooter::route("/api/confectionvente-add-text",[ConfectionVenteController::class,'text']);
Rooter::route("/api/confectionvente-add-article",[ConfectionVenteController::class,'getArticle']);
Rooter::route("/api/confectionvente-add-select-categorie",[ConfectionVenteController::class,'getCategorieSelect']);


Rooter::route("/api/unite",[UniteController::class,'index']);
Rooter::route("/api/unite-add",[UniteController::class,'store']);


Rooter::route("/api/articleconfection-add",[ArticleConfectionController::class,'store']);
Rooter::route("/api/articleconfection-list",[ArticleConfectionController::class,'index']);
Rooter::route("/api/articleconfection-table",[ArticleConfectionController::class,'tableGet']);
Rooter::route("/api/recup-categorie-id",[ArticleConfectionController::class,'getIdCategorie']);


Rooter::route("/api/fournisseur-list",[FournisseurController::class,'index']);
Rooter::route("/api/fournisseur-add",[FournisseurController::class,'store']);
Rooter::route("/api/categorie-unite",[CategorieUniteController::class,'index']);
Rooter::route("/api/recup-categorie",[CategorieUniteController::class,'recupIdCategorie']);

Rooter::route("/api/articlevente-add",[ArticleVenteController::class,'store']);
Rooter::route("/api/articlevente-list",[ArticleVenteController::class,'index']);


Rooter::route("/api/taille",[TailleController::class,'index']);
Rooter::route("/api/taille-add",[TailleController::class,'store']);
