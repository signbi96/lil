



              
            <!-- la partie du haut est commun a tout le monde -->
            <div class="contenu" style='width:80%; height:auto; float: right;'>
                     <h4 class="liste" style="margin-left:30%;margin-top:4%">La liste des Articles de vente</h4>
            <div class="container" style="width:100%;margin-left:0%;">       
                          <table class="table table-hover" style="margin-top:3%">
                                    <thead>
                                        <tr>
                                          <th scope="col">Id_Article</th>
                                          <th scope="col">LibelleArticle</th>                                       
                                          <th scope="col">Prix</th>
                                          <th scope="col">quantite</th>
                                          <th scope="col">Montant</th>
                                          <th scope="col">LibelleCategorie</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                        <?php foreach ($datas as $data):?>
                                        <tr class="table">
                                          <th scope="row"><?= $data->getId() ?></th>
                                          <td><?=$data->getLibelle()?></td>
                                          <td><?=$data->getprixVente()?></td>
                                          <td><?=$data->getquantiteVente()?></td>
                                          <td><?=$data->getmontant()?></td>
                                          <td><?=$data->getCategorieVente()->getLibelle()?></td>
                                          <td>
                                          <div class="action" style="display: flex;justify-content:space-around">
                                          <a name="" id="" role="button" class="btn btn-primary" 
                                                href="<?= WEB_ROUTE.'?path=articleVente-detail&id=' .$data->getId() ?>" style="background-color: blue;">DetailProduction</i>
                                            </a>

                                          <a href=""
                                          onclick="return confirm('etes vous sure de vouloir archiver cette projet ?')";>
                                          <i class="fas fa-archive" style="color:#002879"></i></a>

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
                                              <a class="page-link" href="<?= WEB_ROUTE.'?path=article_vente&page='.$i?>"><?= $i ;?></a>
                                            </li>                          
                    
                                            <?php else:?>
                                            <li class="page-item active">
                                              <a class="page-link" style="background: #002879;" href="<?= WEB_ROUTE.'?path=article_vente&page='.$i?>"><?= $i ;?></a>
                                            </li>

                                            <?php endif?>

                                            <?php endfor ?> 
                
                                </ul>
                </div>
                             
 
                </div>
            </div> 

                   

            <!-- la partie du bas est commun a tout le monde -->
   

