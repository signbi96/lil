         
            <!-- la partie du haut est commun a tout le monde -->
            <div class="contenu"  style='width:80%; height:auto; float: right;'>
                    <h4 class="liste" style="margin-left: 40%;margin-top:2%">La liste des Productions</h4>
                    <form action="<?= WEB_ROUTE ?>" method="GET" >
                        <input type="hidden" name="path" value="filtrer">
                        <div class="test"style="display:flex;justify-content:space-arround;width:55%">
                              <input type="date" name="dateProd" style="width: 50%;margin-top:8%;margin-left:2%">
                              <select name="paiement" style="width:50%;height:40px;margin-left:3%">
                              <option value="-1">veillez choisir</option>
                              <option value="1">par client</option>
                              <option value="0">par montant</option>
                              </select>   
                              <button type="submit style" style="width:15%;margin-left:3%;height:40px"name="filtreur">search</button>   
                        </div>        
                    </form>
            <div class="container" style="width:100%;margin-left:0%;">       
                          <table class="table table-hover" style="margin-top:3%">
                                    <thead>
                                        <tr>
                                          <th scope="col">IdProduction</th>
                                          <th scope="col">Montant</th>
                                          <th scope="col">Date</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                        <?php foreach ($datas as $data):?>
                                        <tr class="table">
                                          <th scope="row"><?= $data->getId() ?></th>
                                          <td><?=$data->getMontant()?></td>
                                          <td><?=$data->getdate()?></td>
                                          <td>
                                          <div class="action" style="display: flex;justify-content:space-around">                                                                             
                                             <a name="" id="" role="button" class="btn btn-primary" 
                                                href="<?= WEB_ROUTE.'?path=production-detail&id=' .$data->getId() ?>" style="background-color: blue;">DetailProduction</i>
                                            </a>
                                            <a href="" ><i class="fas fa-archive" style="color:#002879"></i></a>
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
                                              <a class="page-link" href="<?= WEB_ROUTE.'?path=production-list&page='.$i?>"><?= $i ;?></a>
                                            </li>                          
                    
                                            <?php else:?>
                                              <li class="page-item active">
                                              <a class="page-link" style="background: #002879;" href="<?= WEB_ROUTE.'?path=production-list&page='.$i?>"><?= $i ;?></a>
                                            </li>
                                            <?php endif?>
                                            <?php endfor ?>               
                                </ul>
                           </div>                            
                </div>
            </div> 

                   

            <!-- la partie du bas est commun a tout le monde -->
   

