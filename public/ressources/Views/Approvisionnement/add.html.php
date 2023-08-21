
          <?php
     
            $arrayDetails = [];
            if(Session::isset('arrayDetails')){
              $arrayDetails = Session::get("arrayDetails");
             //Session::unset("arrayDetails");
            }

            $errors = [];
            if(Session::isset('errors')){
               $errors = Session::get("errors");
               Session::unset("errors");
            }
             ?>


<div class="contenu" style='width:80%; height:auto; float: right; margin-top:2.4%;'>
              <h4 style="color:#002879;margin-top:0%;margin-left:20%">Ajouter une Approvisionnement</h4>
               <div class="container" style="width:70%;background: #D7D7D7;border-radius:8px;margin-left:5%">
                       <form  action="<?= WEB_ROUTE ?>" method="POST" enctype="multipart/form-data" » >
                       <!-- <input id="quantite" type="hidden" name="quantite" value="0">           -->                  
                                  <div class="row">
                                  <div class="col md-6">
                                            <div class="form-group"  style="margin-top:2%">
                                                 <label for=""  style="margin-top:2%">Date</label>
                                                 <input type="date" class="form-control" value="" name="dateAppro"  style="margin-top:-1%"
                                                 placeholder="entrer votre nome">
                                                 <div class="erreur" style="color:red">
                                                    <?= $errors['fournisseur']??"" ?>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col md-6">
                                          <div class="form-group" style="margin-top:2%">
                                            <label for="" style="margin-top:2%">Fournisseur</label>
                                             <select class="form-control" name="fournisseur" id="" style="margin-top:-1%;height:40px">
                                             <option value="">choisir fournisseur</option>
                                             <?php foreach ($dataFournisseurs as $key => $value):?>
                                                  <option value="<?= $value->getFournisseur() ?>"> <?= $value->getFournisseur() ?></option>
                                                <?php endforeach ?>
                                             </select>
                                                 <div class="erreur" style="color:red">
                                                    <?= $errors['fournisseur']??"" ?>
                                                 </div>
                                            </div>
                                           </div>
                                   </div>     
                               
                                <div class="partie3" style="width:100%;height:100px;display:flex;justify-content:space-between">
                                <div class="col md-6">
                                          <div class="form-group" style="margin-top:2%;width:70%" >
                                            <label for="" style="margin-top:2%">Article</label>
                                             <select class="form-control" name="id" id="" style="margin-top:-1%;height:40px">
                                             <option value="">choisir Article</option>
                                             <?php foreach ($dataArticles as $key => $value):?>
                                                  <option value="<?= $value->getId() ?>"> <?= $value->getLibelle() ?></option>
                                                <?php endforeach ?>
                                             </select>
                                             <div class="erreur" style="color:red">
                                                    <?= $errors['id']??"" ?>
                                                 </div>
                                            </div>
                                           </div>

                                   <div class="col md-6">
                                   <div class="form-group" style="margin-top:2%">
                                                 <label for="" style="margin-top:2%">Quantite</label>
                                                 <input type="text" class="form-control" style="width:70%;margin-top:-1%"
                                                 value="" name="qteStock">
                                                 <div class="erreur" style="color:red">
                                                 <?= $errors['qteStock']??"" ?>
                                                 </div>
                                                 
                                             </div>
                                     </div>

                                       <input type="submit" class="btn btn-primary " 
                                        style="background:#002879;height:40px;margin-top:4%;width:10%" name="ok"  value="ok">
                                           
                                </div>


                                <div class="partie3" style="width:100%;height:auto;justify-content:space-around">
                                  
                                <table class="table table-hover" style="margin-top:1%;width:100%;">
                                    <thead style="border:1px solid black">
                                        <tr>
                                          <th scope="col">Article</th>
                                          <th scope="col">Quantite</th>
                                          <th scope="col">Prix</th>
                                          <th scope="col">Total</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                       
                                    </thead>
                                      <tbody style="border:1px solid black">
                                           
                                      <?php if(!empty($arrayDetails)):?>
                                      <?php $montantTotal = 0;
                                         foreach ($arrayDetails as $value):?>
                                         <tr class="table" style="border:1px solid black">
                                          <th scope="row"><?= $value['id'] ?></th>
                                          <td style="border:1px solid black"><?= $value['qteStock'] ?></td>
                                          <td style="border:1px solid black"><?= $value['prixAchat'] ?></td>
                                          <td style="border:1px solid black"><?= $value['total'] ?></td>
                                             
                                          <td>
                                            <div class="action" style="display: flex;justify-content:space-around">
                                            <a name="supprimer" id="addApprovisionnement" class="btn btn-primary" href="#" role="button" 
                                            data-bs-toggle="modal" data-bs-target="#exampleModal" data-add-appro="<?= $value['id'] ?>"
                                            data-quantite-appro="<?= $value['qteStock'] ?>"
                                            style="background-color: #002879;">Delete</i></a>

                                          </div>
                                          </td>
                                        </tr>
                                        <?php $montantTotal = intval($montantTotal) + intval($value['total']) ?>
                                        <?php endforeach ?>
                                        <?php endif ?>
                                       
                                      </tbody>
                              </table>

                              <div class="form-group" style="width: 30%;margin-left:70%">
                                <input type="text"class="form-control" name="montant" 
                                 value="<?= isset($montantTotal) ? $montantTotal : ""?>"
                                 id="" aria-describedby="helpId" placeholder=""> Montant</input>
                              </div>

                    </div>
                               <?php  if (count($arrayDetails) !== 0):?>
                                           <div class="card-foter text-center">
                                             <input type="submit" class="btn btn-primary " value="enregistrer" name="enregistrer"
                                              style="width: 50%;margin-top:0.5%;background:#002879" desabled="desabled" >
                                           </div>
                              <?php  endif ?>           

                    <div
                     class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <input type="hidden" name="path" value="modal-test">          
                      <div class="modal-dialog">
                        <div class="modal-content">
                         
                        <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <div class="form-group" style="display:flex;">
                                <label for="">Quantite</label>
                                <input type="text" class="form-control" name="quantiteModal" id="inputQuantite" aria-describedby="helpId" 
                                value="0"  style="width: 50%;">
                                     <div class="incremente">
                                      <button id="plus" type="button" 
                                      style="width:100%;height:20px;background:white;color:#002879;border:0px solid white;padding-top:2px"
                                      ><h4>+</h4></button>
                                      <button id="moins" type="button" 
                                      style="width:100%;height:20px;background:white;color:#002879;border:0px solid white;">
                                      <h3>-</h3></button>
                                     </div>
                                     <div class="okbutton" style="margin-top:4%">
                                     <button id="btnSubmit" type="submit" class="btn btn-primary" name="ajouter" 
                                         style="width:100%;height:30px;background-color:#002879;padding-top:2px;margin-left:70% " >ok</button>
                                     </div>

                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width:30%;height:40px;">Close</button>
                          </div>
                        </div>
                      </div>
                      </div>
                      <input type="hidden" name="path" value="approvisionnement-store">  
                       <input id="idArticle" type="hidden" name="idArticle" value="0"> 
                       <input id="quantite" type="hidden" name="quantite" value="0">
                           </form>
                          </div>
                    </div>



                    
            <script type="text/javascript">
               const addApprovisionnement = document.querySelector("#addApprovisionnement");
               const plus = document.querySelector("#plus");
               const moins = document.querySelector("#moins");
                       
               addApprovisionnement.addEventListener("click",function(event){
                         const lili = document.querySelector("#idArticle");
                         const inputQuantite = document.querySelector("#inputQuantite");
                         lili.value = addApprovisionnement.getAttribute("data-add-appro");
                         inputQuantite.value = addApprovisionnement.getAttribute("data-quantite-appro");
                        
               })
               
               plus.addEventListener("click",function(){
                const inputQuantite = document.querySelector("#inputQuantite");
                inputQuantite.value = +inputQuantite.value + 1
               })

               moins.addEventListener("click",function(){
                const inputQuantite = document.querySelector("#inputQuantite");
                inputQuantite.value -=1  
               })
            </script> 




            


