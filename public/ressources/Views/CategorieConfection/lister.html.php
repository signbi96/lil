




              
            <!-- la partie du haut est commun a tout le monde -->
            <?php
            use App\Core\Session;
            $errors = [];
            if(Session::isset('errors')){
               $errors = Session::get("errors");
               Session::unset("errors");
            }
             ?>
                       <div class="contenu" style='width:80%; height:auto; float: right;'>
                            <div class="formul">
                              <form     method="post" action="<?= WEB_ROUTE ?>" >
                              <div class="form-group has-success" style="width:50%" >
                                <label class="form-label " for="inputvalid">Libelle</label>
                                <input type="text" name="libelle" value="" class="form-control <?= isset($errors['libelle'])?'is-invalid':'' ?> " id="inputvalid">
                                <div class="invalid-feedback">
                                  <?= $errors['libelle']??"" ?>
                                </div>
                              </div>

     
                              <div class="input-group" style="margin-left: 30%;margin-top:-11.5%">
                                <button class="btn btn-primary" type="submit" id="button-addon2 "style="background:#002978">Enregistrer</button>
                              </div>

                              <input type="hidden" name="path" value="store-categorie">
                              </form>
                            </div>
                            <h4 class="liste" style="margin-left:30%;margin-top:4%">La liste des categories</h4>
                         <div class="container" style="width:100%;margin-left:0%;">       
                          <table class="table table-hover" style="margin-top:3%">
                                    <thead>
                                        <tr>
                                          <th scope="col">Id_Categorie</th>
                                          <th scope="col">LibelleCategorie</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                        <?php foreach ($datas as $data):?>
                                        <tr class="table">
                                          <th scope="row"><?= $data->getId() ?></th>
                                          <td><?=$data->getlibelle()?></td>
                                          <td>
                                          <div class="action" style="display: flex;justify-content:space-around">
                                          <a href="<?= WEB_ROUTE.'?path=modification&id='.$data->getId() ?>">
                                          <i class="fas fa-solid fa-pen-to-square"></i></a>
                                         
                                          <a name="" id="deleteCategorie" class="btn btn-primary" href="#" role="button" 
                                            data-bs-toggle="modal" data-bs-target="#exampleModal" data-categorie="<?= $data->getId() ?>"
                                            > <i class="fas fa-archive" style="color:#002879"></i></a>
                                          </div>
                                         </td>
                                        </tr>
                                          <?php endforeach ?>
                                      </tbody>
                              </table>

                              <div class="container">
                                <ul class="pagination" style="justify-content:center;">

                                         <?php for($i=1;$i<=$nombrepage;$i++):?>  

                                          <?php if($i == $page):?>

                                            <li class="page-item disabled">
                                              <a class="page-link" href="<?= WEB_ROUTE.'?path=categorie&page='.$i?>"><?= $i ;?></a>
                                            </li>                          
                    
                                            <?php else:?>
                                              <li class="page-item active">
                                              <a class="page-link" style="background: #002879;" href="<?= WEB_ROUTE.'?path=categorie&page='.$i?>"><?= $i ;?></a>
                                             </li>

                                            

                                            <?php endif?>

                                            <?php endfor ?> 
                
                                </ul>
                </div>
                             
 
                </div>
            </div> 


                    <div
                     class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <input type="hidden" name="path" value="modal-test">          
                      <div class="modal-dialog">
                        <div class="modal-content">
                         
                        <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Etes vous sure de vouloire supprimer cette categorie?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width:20%;height:40px;">Close</button>
                              <form action="<?= WEB_ROUTE ?>" method="post">
                              <input type="hidden" name="path" value="deleting">
                              <input id="idCategorie" type="hidden" name="idCategorie" value="0">
                              <button id="btnCategorie" type="submit" class="btn btn-primary" name="ajouter"  style="width:100%;height:40px;" >Wesh</button>
                              </form>
                          </div>
                        </div>
                      </div>
                      </div>



                     <script type="text/javascript">
                            const deleteCategorie = document.querySelector("#deleteCategorie");
                            deleteCategorie.addEventListener("click",function(event){
                                     const inputHidden = document.querySelector("#idCategorie");
                                     inputHidden.value = deleteCategorie.getAttribute("data-categorie");
                            });
                     </script>

  

            <!-- la partie du bas est commun a tout le monde -->
   

