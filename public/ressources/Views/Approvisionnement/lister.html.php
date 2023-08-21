



              
            <!-- la partie du haut est commun a tout le monde -->
            <div class="contenu"  style='width:80%; height:auto; float: right;'>
                    <h4 class="liste" style="margin-left: 40%;margin-top:2%">La liste des Approvisionnement</h4>
                        <form action="<?= WEB_ROUTE ?>" method="GET" >
                        <input type="hidden" name="path" value="filtrer">
                        <div class="test"style="display:flex;justify-content:space-arround;width:55%">

                              <input type="date" name="dateAppro" style="width: 50%;margin-top:8%;margin-left:2%">
                              
                              <select name="paiement" style="width:50%;height:40px;margin-left:3%">
                              <option value="-1">veillez choisir</option>
                              <option value="1">payer</option>
                              <option value="0">impayer</option>
                              </select>
                             
                              <button type="submit style" style="width:15%;margin-left:3%;height:40px"name="filtreur">search</button>
                             
                        </div>        
                        </form>
                        
        
            <div class="container" style="width:100%;margin-left:0%;">       
                          <table class="table table-hover" style="margin-top:3%">
                                    <thead>
                                        <tr>
                                          <th scope="col">Id_Approvisionnement</th>
                                          <th scope="col">Montant</th>
                                          <th scope="col">Date</th>
                                          <th scope="col">Fournisseur</th>
                                          <th scope="col">Paiement</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                        <?php foreach ($datas as $data):?>
                                        <tr class="table">
                                          <th scope="row"><?= $data->getId() ?></th>
                                          <td><?=$data->getMontant()?></td>
                                          <td><?=$data->getDate()?></td>
                                          <td><?=$data->getFournisseur()?></td>
                                          <td><?=$data->FormatPaiement()?></td>
                                          <td>
                                          <div class="action" style="display: flex;justify-content:space-around">
                                                                               
                                             <a name="" id="" role="button" class="btn btn-primary" 
                                                href="<?= WEB_ROUTE.'?path=detail_approvisionnement&id='.$data->getId() ?>" style="background-color: blue;">DetailAppro</i>
                                            </a>

                                              <?php if(!$data->getpaiement()):?>
                                              <a name="" id="payement" class="btn btn-primary" href="#" role="button" 
                                                data-bs-toggle="modal" data-bs-target="#exampleModal" data-appro="<?= $data->getId() ?>"
                                                style="background-color: #002879;">Paiement</a>
                                             <?php endif ?>

                                            <a href="<?= WEB_ROUTE.'?path=deleting-approvisionnement&id=' .$data->getId()?>"  
                                              onclick="return confirm('etes vous sure de vouloir supprimer cet approvisionnement?')";
                                              ><i class="fas fa-archive" style="color:#002879"></i></a>
                                        </div> 
                                   </td>
                               </tr>
                      <?php endforeach ?>
                      </tbody>
                     </table>



                     <div class="modal" tabindex="-1" id="exampleModal">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <p>Etes vous sure de vouloir confirmer ce paiement</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="<?php WEB_ROUTE ?>" method="POST">
                                <input type="hidden" name="path" value="update-paiement-appro">
                                <input id="idAppro" type="hidden" name="idAppro" value="0">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>



                              <div class="container">
                                <ul class="pagination" style="justify-content:center;">

                                         <?php for($i=1;$i<=$nombrepage;$i++):?>  

                                          <?php if($i == $page):?>

                                            <li class="page-item disabled">
                                              <a class="page-link" href="<?= WEB_ROUTE.'?path=approvisionnement&page='.$i?>"><?= $i ;?></a>
                                            </li>                          
                    
                                            <?php else:?>
                                              <li class="page-item active">
                                              <a class="page-link" style="background: #002879;" href="<?= WEB_ROUTE.'?path=approvisionnement&page='.$i?>"><?= $i ;?></a>
                                            </li>

                                            <?php endif?>

                                            <?php endfor ?> 
                
                                </ul>
                           </div>
                             
 
                </div>
            </div> 

            <script type="text/javascript">
               const payement = document.querySelector("#payement");
               payement.addEventListener("click",function(event){
                         const lili = document.querySelector("#idAppro")
                         lili.value = payement.getAttribute("data-appro")
               })
               
            </script>
                   

            <!-- la partie du bas est commun a tout le monde -->
   

