
                       <div class="contenu" style='width:80%; height:auto; float: right;'>
                            <div class="formul">
                              <form method="post" action="" id='formbuttonSubmit'>
                              <div class="form-group has-success" style="width:50%" >
                                <label class="form-label " for="inputvalid">Libelle</label>
                                <input type="text" name="libelle" value="" class="form-control <is-invalid':'' ?> " id="libelle">
                                <div class="invalid-feedback">
                                 
                                </div>
                              </div>

     
                              <div class="input-group" style="margin-left: 55%;margin-top:-3%">
                                <button class="btn btn-primary" type="submit" id="buttonSubmit"style="background:#002978">Enregistrer</button>
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
                                      <tbody id="tbody">
                                        
                                       
                                       
                                      </tbody>
                              </table>

                             
                </div>
                             
 
                </div>
            </div> 

<script type="module" src="<?=asset("JS/categorie/script.js")?>"></script>



                 
                    











<script type="module" src="<?=asset("JScategorie/script.js")?>"></script>