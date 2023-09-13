            <div class="menu" style="width:100%;background:black;height:5em">

            </div>
                <h4 style="margin-left: 35%;padding-top:1%">Ajouter Un Article De Confection</h4>

               <div class="container" style="width:70%;height:auto;border:1px solid #d5d5d5">

                       <form method="POST" id="formAddArticle"  enctype= »multipart/form-data » >
                                  <div class="row">

                                         <div class="col md-6">
                                         <div class="form-group has-success" >
                                          <label class="form-label " for="inputvalid" >Libelle</label>
                                          <input type="text" name="libelle" value="" class="form-control" id="libelle">
                                          <p id="errorMessage12" style="color: red;"></p>
                                          <div id="errorMessage"></div>
                                          <div id="errorMessage13" style="color: red;"></div>
                                        </div>
                                        </div>

                                        <div class="col md-6">
                                         <div class="form-group has-success" >
                                          <label class="form-label " for="inputvalid" >prix</label>
                                          <input type="text" name="libelle" value="" class="form-control" id="prixAchat">
                                          <div id="errorMessage10" style="color: red;"></div>
                                          <div id="errorMessage14" style="color: red;"></div>
                                        </div>
                                        </div>

                                     </div>

                                  <div class="row">

                                             <div class="col md-6">
                                             <div class="form-group has-success" >
                                              <label class="form-label " for="inputvalid">quantite</label>
                                               <input type="text" name="quantite" id="quantite" value="" class="form-control">
                                               <div id="errorMessage11" style="color: red;"></div>
                                               <div id="errorMessage15" style="color: red;"></div>
                                              </div>
                                          </div>
                                          
                                          <div class="col md-6">
                                             <div class="form-group has-success" id="image" style="width:80%;margin-left:10%" >
                                               <input type="file" name="sene" value="" class="form-control" id="inputvalid" style="display:none;">
                                               <label class="form-label " for="inputvalid">
                                               <img id="imageChanged" src="./../../../ressources/IMAGE/fake.jpg"  alt="" style="width:90%;height:8em">
                                               </label>
                                               <div id=" errorMessageImage" style="color: red;"></div>
                                              </div>
                                          </div>
                                     

                                   </div>

                                  <div class="row" >
                                       <div class="col" style="display:flex;justify-content:space-between;margin-top:-4%">
                                       <div class="form-group">
                                       <label for="">Categorie</label>
                                       <select class="form-control" name="categorieId" id="selectCategorie" style="width:280%;">
                                           <option value="">choisir categorie</option>
                                       </select>
                                       <div id="conteneurCategorie"></div> 
                                       <div id="errorMessage16" style="color: red;"></div>
                                     </div>
                                     <button data-bs-toggle="modal" data-bs-target="#exampleModal1" type="button" id="buttonAddCategorie"
                                     style="background:black;color:white;height:2em;margin-top:5.5%;border-radius:8px">+</button>
                                  </div>

                                     <div class="col" style="display:flex;justify-content:space-between;margin-top:-4%">
                                       <div class="form-group">
                                       <label for="">Unite</label>
                                       <select class="form-control" name="categorieId" id="selectUnite"style="width:375%;">
                                           <option value="">choisir unite</option>
                                       </select>
                                       <div id="errorMessage17" style="color: red;"></div>
                                     </div>
                                     <button data-bs-toggle="modal" data-bs-target="#exampleModal2" type="button" id="buttonAddUnite" 
                                     style="background:black;color:white;height:2em;margin-top:5.5%;border-radius:8px" >+</button>
                                     </div>
                                    </div>

                                    <div class="row">

                                      <div class="col md-6">
                                      <div class="form-group has-success" >
                                      <label class="form-label " for="inputvalid">referent</label>
                                        <input type="text" name="quantite" id="referent" value="" class="form-control">
                                        <div id="errorMessage18" style="color: red;"></div>
                                      </div>
                                      </div>
                                      </div>
                                    

                                    <div class="row">
                                          <div class="col md-6">
                                          <div class="form-group has-success">
                                          <label class="form-label " for="inputvalid">fournisseur</label>
                                            <div class="cont" style="display:flex" >
                                            <input type="text" name="prixAchat" value="" class="form-control" id="fournisseur">
                                            <div id="errorMessage19" style="color: red;"></div>
                                            <button data-bs-toggle="modal" data-bs-target="#exampleModal3" type="button" id="buttonAddFournisseur"
                                            style="background:black;color:white;height:2em;border-radius:8px;margin-top:0.3%">+</button>
                                            </div>
                                            <div class="selectCheck" style="display:flex;justify-content:space-between">

                                        <table class="table table-bordered" style="margin-top:1%;width:5%">         
                                        <tbody id="tbody3" style="border:white">
                                        
                                        </tbody>
                                      </table>

                                      <table class="table table-bordered" style="margin-top:1%;width:10%" >
                                        <tbody id="tbody4" style="border:white">
                                         
                                        </tbody>
                                      </table>
                                       </div>
                                              
                                          </div>
                                          </div>
                                          </div>
                                           <div class="card-foter text-center">
                                             <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"  id="addArticle"
                                             style="width: 20%;margin-top:2%;background:black;margin-left:11%" >Ajouter Article</button>
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

                                          <div class="loulou" style="display:flex;margin-top:4%">
                                           <label for="libelle">unite</label>
                                           <input type="text" name="libelleModal" id="uniteModalCategorie" class="form-control" value="" >
                                           <span style="color:red" id="messagelibelleCategorie"></span> 

                                           <label for="libelle">convertir</label>
                                           <input type="text" name="libelleModal" id="convertisseurDefaut" class="form-control" value="1" readonly="readonly">
                                           <span style="color:red" id="messagelibelleCategorie"></span> 
                                          </div>
                                        
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"  id="ajouterCategorie">ajouter</button>
                                </div>
                              </div>
                            </div>
                          </form>



                          <form method="post" class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel3">Ajouter Fournisseur</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                          <label for="libelle">nom</label>
                                          <input type="text" name="nom" id="nom" class="form-control" value="" >
                                          <div id="errorMessage20" style="color: red;"></div>

                                          <label for="libelle">prenom</label>
                                          <input type="text" name="nom" id="prenom" class="form-control" value="" >
                                          <div id="errorMessage21" style="color: red;"></div>

                                          <label for="libelle">mail</label>
                                          <input type="text" name="email" id="email" class="form-control" value="">
                                          <p id="emailError" style="color: red;"></p>

                                          <label for="libelle">password</label>
                                          <input type="text" name="password" id="password" class="form-control" value="">
                                          <p id="passwordError" style="color: red;"></p>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"  id="ajouterFournisseur">ajouter</button>
                                </div>
                              </div>
                            </div>
                          </form>






                          <form method="post"  class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Ajouter Des Unites</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                 <label for="libelle">categorie</label>
                                 <input type="text" name="categorie" id="categorieModale2" class="form-control" value="" >
                                 <span id="categorieSelectionner" style = "color:green"></span><br>

                                 <label for="libelle">libelleUnite</label>
                                 <input type="text" name="libelleModal" id="libelleUnite" class="form-control" value=""> 
                                 <div id="errorMessage3"></div>
                                 <div class="convertir" style="display:flex;justify-content:space-arround;margin-top:5%" >
                                 
                                 <label for="libelle"></label>
                                 <input type="text" name="libelleModal" id="convertirMetre" class="form-control" value="en metre" readonly="readonly"> 
                                 
                                 <label for="libelle" class = "labe" style="margin-left:10%">convertir</label>
                                 <input type="text" name="enMetre" id="enMetre" class="form-control" value="" style="margin-left:2%"> 
                                 <button type="button" class="btn btn-primary" id="ok" style="background:black;margin-left:5%">ok</button>
                                 </div>
                                 <table class="table table-bordered" style="margin-top:5%">
                                        <thead style="background:black;color:white">
                                          <tr style="height:3em">
                                            <th>id</th>
                                            <th>libelleUnite</th>
                                            <th>convertisseur</th>
                                            <th>Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody id="tbody2">
                                                

                                        </tbody>
                                      </table>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">save</button>
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
                                            <th>prix</th>
                                            <th>quantite</th>
                                            <th>referent</th>
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




                                              
<script type="module" src="<?=asset("JS/ArticleConfection/script.js")?>"></script>