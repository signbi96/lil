<?php

use App\Core\Session;
            $errors = [];
            if(Session::isset('errors')){
               $errors = Session::get("errors");
               Session::unset("errors");
            }
             ?>
<h4 style="margin-left: 35%;margin-top:4%;color:#002879">Ajout d'Article</h4>

               <div class="container" style="width:50%;height:auto;padding-top:1%;background: #D7D7D7;">

                       <form  action="<?= WEB_ROUTE ?>" method="POST"  enctype= »multipart/form-data » >
                                 <input type="hidden" name="path" value="article-store">
                                 

                                  <div class="row">
                                         <div class="col md-6">
                                         <div class="form-group has-success" >
                                          <label class="form-label " for="inputvalid" >Libelle</label>
                                          <input type="text" name="libelle" value="" class="form-control <?= isset($errors['libelle'])?'is-invalid':'' ?> " id="inputvalid">
                                          <div class="invalid-feedback">
                                            <?= $errors['libelle']??"" ?>
                                         </div>
                                        </div>
                                        </div>
                                     </div>

                                  <div class="row">
                                             <div class="col md-6">
                                             <div class="form-group has-success" >
                                              <label class="form-label " for="inputvalid">Prix</label>
                                               <input type="text" name="prixAchat" value="" class="form-control <?= isset($errors['prixAchat'])?'is-invalid':'' ?> " id="inputvalid">
                                                 <div class="invalid-feedback">
                                                 <?= $errors['prixAchat']??"" ?>
                                              </div>
                                              </div>
                                          </div>
                                        
                                         <div class="col md-6">
                                          <div class="form-group has-success">
                                            <label class="form-label " for="inputvalid">Quantite</label>
                                            <input type="text" name="qteStock" value="" class="form-control <?= isset($errors['qteStock'])?'is-invalid':'' ?> " id="inputvalid">
                                            <div class="invalid-feedback">
                                              <?= $errors['qteStock']??"" ?>
                                          </div>
                                          </div>
                                           </div>
                                     </div>

                                     <div class="form-group" style="width:100%">
                                       <label for="">Categorie</label>
                                       <select class="form-control" name="categorieId" id="">
                                        <?php foreach ($data as $key => $value):?>
                                         <option value=" <?= $value->getId() ?>"> <?= $value->getlibelle() ?></option>
                                         <?php endforeach ?>
                                       </select>
                                     </div>
                                           <div class="card-foter text-center">
                                             <button type="submit" class="btn btn-primary " 
                                             style="width: 50%;margin-top:5%;background:#002879;margin-left:11%" >Ajouter Article</button>
                                           </div>

                           </form>
                          </div>
                        

