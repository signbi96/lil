<?php

use App\Core\Rooter;
use App\Models\UniteController;
use App\Models\CategorieVente;
use App\Controllers\CategorieController;
use App\Controllers\ConfectionVenteController;
use App\Controllers\ArticleConfectionController;



//route categorie confection
Rooter::route("/categorie",[CategorieController::class,'index']);
Rooter::route("/categorie/js",[CategorieController::class,'indexjs']);
Rooter::route("/store-categorie",[CategorieController::class,'store']);

//route confection vente web
Rooter::route("/confectionvente-store",[ConfectionVenteController::class,'store']);
Rooter::route("/confectionvente-add",[ConfectionVenteController::class,'create']);
Rooter::route("/confectionvente-list",[ConfectionVenteController::class,'index']);

//route confectionvente apia
Rooter::route("/confectionvente-add-select",[ConfectionVenteController::class,'select']);
Rooter::route("/confectionvente-add-text",[ConfectionVenteController::class,'text']);
Rooter::route("/confectionvente-add-article",[ConfectionVenteController::class,'getArticle']);
Rooter::route("/confectionvente-add-select-categorie",[ConfectionVenteController::class,'getCategorieSelect']);


//route categorie vente web
Rooter::route("/categorie_vente",[CategorieVenteController::class,'index']);

//route article confection
Rooter::route("/article_confection",[ArticleConfectionController::class,'index']);
Rooter::route("/add",[ArticleConfectionController::class,'create']);
Rooter::route("/article-store",[ArticleConfectionController::class,'store']);
Rooter::route("/add/js",[ArticleConfectionController::class,'createjs']);
Rooter::route("/article-store-js",[ArticleConfectionController::class,'storejs']);

Rooter::route("/unite",[UniteController::class,'index']);
Rooter::route("/unite-add",[UniteController::class,'store']);



