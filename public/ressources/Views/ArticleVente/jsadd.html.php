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
                             <div id="errorMessageLibelle" style="color:red"></div>
                            </div>
                            </div>

                            <div class="col md-6">
                             <div class="form-group has-success" >
                              <label class="form-label " for="inputvalid" >Referent</label>
                              <input type="text" name="referent" value="" class="form-control" id="referent">
                              <div id="errorMessageReferent" style="color:red"></div>
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
                                       <div id="errorMessageCategorie" style="color:red"></div>  
                                     </div>
                                </div>

                                <div class="col md-6">
                                <div class="form-group" >
                                       <label for="">Taille</label>
                                       <div class="reglage"style="display:flex">
                                       <select class="form-control" name="selectTaille" id="selectTaille"style="">
                                           <option value="">choisir Taille</option>
                                       </select>
                                       <button data-bs-toggle="modal" data-bs-target="#exampleModal2"  type="button" id="addTaille" 
                                       style="border-radius:8px;background:black;color:white;margin-left:1%">ok</button>
                                       </div> 
                                       <div id="errorMessageTaille" style="color:red"></div>  
                                     </div>
                                </div>

                         </div>

                     <div class="row" style="margin-top:1.5%">
                             <div class="col md-6">
                              <div class="ligu" style="display:flex;justify-content:space-between">
                              <label for="">Article de Confections</label>
                              <button  type="button" id="addArticleConfection" style="border-radius:8px;background:black;color:white;">ok</button>
                              </div>
                             <table class="table table-bordered">
                                        <thead style="background:black;color:white">
                                          <tr>
                                            <th>libelle</th>
                                            <th>quantite</th>
                                          </tr>
                                        </thead>
                                        <tbody id="tbodyTable">
                                          
                                        </tbody>
                                      </table>
                                     
                                      <div class="truc" style="display:flex;width:100%;justify-content:space-around" >
                                        <label>coutProduction<input type="text" name="libelle" value="" class="form-control" id="coutProduction" style="margin-left:-1%"></label>
                                        <label>Marge<input type="text" name="libelle" value="" class="form-control" id="marge" >
                                        <div id="errorMessageMarge1" style="color:red"></div>
                                        <div id="errorMessageMarge2" style="color:red"></div>
                                        </label>
                                        <label>PriVente<input type="text" name="libelle" value="" class="form-control" id="prixVente" style="margin-left:1%"></label>
                                      </div>
                                        
                              </div>

                            <div class="col md-6">
                              <label for="">photo</label>
                                 <div class="image" style="width:100%">
                                             <div class="form-group has-success" id="image" style="width:100%;margin-left:10%" >
                                               <input type="file" name="sene" value="" class="form-control" id="inputvalid" style="display:none">
                                               <label class="form-label " for="inputvalid">
                                               <img id="imageChanged" src="./../../../ressources/IMAGE/fake.jpg"  alt="" style="width:%;height:10em">
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <table class="table table-bordered">
                                        <thead style="background:black;color:white">
                                          <tr>
                                            <th>libelle</th>
                                            <th>quantite</th>
                                          </tr>
                                        </thead>
                                        <tbody id="tbodyModal">
                                          
                                        </tbody>
                                      </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
      </div>

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
                                          

                                        </tbody>
                                      </table>
                          </div>                 
                         
                <div id="pagination" class="d-flex justify-content-end  align-items-center" style="margin-right:50%;margin-top:0%">
                    <button id="prevButton" class="btn btn-outline-secondary m-4">Précédent</button>
                     <!-- <span id="currentPage">Page 1</span> -->
                     <button id="nextButton" class="btn btn-outline-dark">Suivant</button>
                 </div>
    

                                  
<script type="module" src="<?=asset("JS/ArticleVente/script.js")?>"></script>