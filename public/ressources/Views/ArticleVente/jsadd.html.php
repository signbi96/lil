<div class="menu" style="width:100%;background:black;height:5em"></div>

    <h4 style="margin-left: 35%;padding-top:1%">Ajouter Un Article De Vente</h4>

   <div class="container" style="width:70%;height:auto;border:1px solid #d5d5d5">
           <form method="POST" id="formAddArticle"  enctype= »multipart/form-data » >
                      <div class="row">

                             <div class="col md-6">
                             <div class="form-group has-success" >
                              <label class="form-label " for="inputvalid" >Libelle</label>
                              <input type="text" name="libelle" value="" class="form-control" id="libelle">
                              <div id="errorMessage"></div>
                            </div>
                            </div>

                            <div class="col md-6">
                             <div class="form-group has-success" >
                              <label class="form-label " for="inputvalid" >Referent</label>
                              <input type="text" name="referent" value="" class="form-control" id="referent">
                            </div>
                            </div>

                         </div>

                         <div class="row" style="margin-top:1%">

                              <div class="col md-6">
                                <div class="form-group" >
                                       <label for="">Categorie</label>
                                       <div class="reglage"style="display:flex">
                                       <select class="form-control" name="selectCategorie" id="selectCategorie"style="">
                                           <option value="">choisir Categorie</option>
                                       </select>
                                       <button data-bs-toggle="modal" data-bs-target="#exampleModal1" type="button" id="addCategorie" 
                                         style="border-radius:8px;background:black;color:white;margin-left:1%">ok</button>
                                       </div>   
                                     </div>
                                </div>

                                <div class="col md-6">
                                <div class="form-group" >
                                       <label for="">Taille</label>
                                       <div class="reglage"style="display:flex">
                                       <select class="form-control" name="selectTaille" id="selectTaille"style="">
                                           <option value="">choisir Taille</option>
                                       </select>
                                       <button data-bs-toggle="modal" data-bs-target="#exampleModal2"  type="button" id="addUnite" 
                                       style="border-radius:8px;background:black;color:white;margin-left:1%">ok</button>
                                       </div>   
                                     </div>
                                </div>

                         </div>

                     <div class="row" style="margin-top:1.5%">
                             <div class="col md-6">
                             <label for="">Article de Confections</label>
                             <table class="table table-bordered">
                                        <thead style="background:black;color:white">
                                          <tr>
                                            <th>libelle</th>
                                            <th>quantite</th>
                                          </tr>
                                        </thead>
                                        <tbody id="tbody">
                                          <td>
                                          <div class="form-group has-success" >
                                            <label class="form-label " for="inputvalid" >libelle</label>
                                            <input type="text" name="referent" value="" class="form-control" id="">
                                           </div>
                                          </td>
                                          <td>
                                          <div class="form-group has-success" >
                                            <label class="form-label " for="inputvalid" >quantite</label>
                                            <input type="text" name="referent" value="" class="form-control" id="">
                                           </div>
                                          </td>
                                        </tbody>
                                      </table>
                                     
                                      <div class="truc" style="display:flex;width:100%;justify-content:space-around" >
                                        <label>coutProduction<input type="text" name="libelle" value="" class="form-control" id="libelle" style="margin-left:-1%"></label>
                                        <label>Marge<input type="text" name="libelle" value="" class="form-control" id="libelle" ></label>
                                        <label>PriVente<input type="text" name="libelle" value="" class="form-control" id="libelle" style="margin-left:1%"></label>
                                      </div>
                                        
                              </div>

                            <div class="col md-6">
                              <label for="">photo</label>
                                 <div class="image" style="width:100%">
                                             <div class="form-group has-success" id="image" style="width:100%;margin-left:10%" >
                                               <input type="file" name="sene" value="" class="form-control" id="inputvalid" style="display:none">
                                               <label class="form-label " for="inputvalid">
                                               <img id="imageChanged" src="./../../../ressources/IMAGE/fake.jpg"  alt="" style="width:240%;height:10em">
                                              </div>
                                    </div>
                                 </div>
                               </div>

                               <div class="card-foter text-center">
                            <button type="submit" class="btn btn-primary" id="addArticle"
                            style="width: 20%;margin-top:-5.5%;background:black;margin-left:50%" >Ajouter Article</button>
                         </div>

            </form>
</div>


<form method="post" class="modal fade"  id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Ajouter Categorie</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                          <label for="libelle">libelleCategorie</label>
                                          <input type="text" name="libelleModal" id="libelleCategorie" class="form-control" value="" >
                                         <span style="color:red" id="messagelibelleCategorie"></span>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"  id="ajouterCategorie">ajouter</button>
                                </div>
                              </div>
                            </div>
</form>

<form method="post" class="modal fade"  id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Ajouter Taille</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                          <label for="libelle">libelleTaille</label>
                                          <input type="text" name="libelleModal" id="libelleTaille" class="form-control" value="" >
                                        
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"  id="ajouterTaille">ajouter</button>
                                </div>
                              </div>
                            </div>
</form>

<div class="container" style="width:72%">
                          <h4 style="margin-left: 35%;padding-top:1%">Liste Des Articles De Confection</h4>

                              <table class="table table-bordered">
                                        <thead style="background:black;color:white">
                                          <tr>
                                            <th>id</th>
                                            <th>libelle</th>
                                            <th>referent</th>
                                            <th>prixVente</th>
                                            <th>Marge</th>
                                            <th>photo</th>
                                            <th>Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody id="tbody">
                                          <td>1</td>
                                          <td>article1</td>
                                          <td>ref-rty-001</td>
                                          <td>400000</td>
                                          <td>20000</td>
                                          <td>photo.jpeg</td>
                                          <td>
                                          <div class="action" style="display: flex;justify-content:space-around">
                                            <a href="">
                                             <i class="fas fa-solid fa-pen-to-square"></i>
                                             </a>
                                             <a href="">
                                             <i class="fa-solid fa-trash" style="color: #f20226;"></i>
                                             </a>
                                           </a>
                                          </div>      
                                          </td>

                                        </tbody>
                                      </table>
                          </div>                 
                         
                       
    

                                  
<script type="module" src="<?=asset("JS/ArticleVente/script.js")?>"></script>