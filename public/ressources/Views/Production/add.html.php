
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
     if(isset($_SESSION['message'])){
      $message = $_SESSION['message'];
      unset($_SESSION['message']);
   }

      ?> 


<div class="contenu" style='width:80%; height:auto; float: right; margin-top:2.4%;'>
       <h4 style="color:#002879;margin-top:0%;margin-left:20%">Ajouter une Production</h4>
        <div class="container" style="width:70%;background: #D7D7D7;border-radius:8px;margin-left:5%">
                <form  action="<?= WEB_ROUTE ?>" method="POST" enctype="multipart/form-data" » >
                <input type="hidden" name="path" value="production-store">                
                           <div class="row">
                           <div class="col md-6">
                                     <div class="form-group"  style="margin-top:2%">
                                          <label for=""  style="margin-top:2%">Date</label>
                                          <input type="date" class="form-control" value="" name="dateProd"  style="margin-top:-1%">
                                          <div class="erreur" style="color:red">
                                              <?= $errors['dateProd']??"" ?> 
                                          </div>
                                      </div>
                                  </div>
                            </div>     
                        
                         <div class="partie3" style="width:100%;height:100px;display:flex;justify-content:space-between">
                         <div class="col md-6">
                                   <div class="form-group" style="margin-top:2%;width:70%" >
                                     <label for="" style="margin-top:2%">ArticleVente</label>
                                      <select class="form-control" name="id" id="btnSelect" style="margin-top:-1%;height:40px">
                                      <option value="">choisir Article</option>
                                      <?php foreach ($articleVentes as $key => $value):?> 
                                           <option value="<?= $value->getId()  ?>"><?= $value->getLibelle()?></option>
                                           <?php endforeach ?>
                                      </select>
                                      <ul id="listArticle">

                                      </ul>
                                      <div class="erreur" style="color:red">
                                             <?= $errors['id']??"" ?>
                                          </div>
                                          <span style="color:red"><?= isset($message) ? $message : "" ?></span>
                                     </div>
                                    </div>

                            <div class="col md-6">
                            <div class="form-group" style="margin-top:2%">
                                          <label for="" style="margin-top:2%">Quantite</label>
                                          <input type="text" class="form-control" style="width:70%;margin-top:-1%"
                                          value="" name="quantitePA">
                                          <div class="erreur" style="color:red">
                                          <?= $errors['quantitePA']??"" ?>
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
                                          <td style="border:1px solid black"><?= $value['quantitePA'] ?></td>
                                          <td style="border:1px solid black"><?= $value['prixAchat'] ?></td>
                                          <td style="border:1px solid black"><?= $value['total'] ?></td>
                                             
                                          <td>
                                            <div class="action" style="display: flex;justify-content:space-around">
                                            <a name="supprimer" id="recupLine" class="btn btn-primary" href="#" role="button" 
                                               data-bs-toggle="modal" data-bs-target="#exampleModal" data-get-line="<?= $value['id'] ?>"
                                               data-get-quantite="<?= $value['quantitePA'] ?>"
                                               style="background-color: #002879;">Delete</i>
                                            </a>

                                          </div>
                                          </td>
                                        </tr>
                                        <?php $montantTotal = intval($montantTotal) + intval($value['total']) ?>
                                        <?php endforeach ?>
                                        <?php endif ?>
                               </tbody>
                       </table>

                       <div class="form-group" style="width: 30%;margin-left:70%">
                         <input type="text"class="form-control" name="montantProd" 
                          value="<?= isset($montantTotal) ? $montantTotal : ""?>"
                          id="" aria-describedby="helpId" placeholder="">Total</input>
                       </div>

             </div>
                      
                                    <div class="card-foter text-center">
                                      <input type="submit" class="btn btn-primary " value="enregistrer" name="enregistrer"
                                       style="width: 50%;margin-top:0.5%;background:#002879">
                                    </div>
           <input id="idArticle" type="hidden" name="idArticle" value="0">            
        </form>
  </div>
</div>


<!-- Modal -->
<form action="<?= WEB_ROUTE ?>" method="POST" class="modal fade" id="exampleModal"
 tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <input type="hidden" name="path" value="delete-line">
 <input id="idArticle" type="hidden" name="idArticle" value="0">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Veillez effectuer vos modifs</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="">Quantite</label>
          <input type="number" class="form-control" name="quantiteModal" id="inputQuantite" aria-describedby="helpId" placeholder=""
             value="0">
      </div>        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="ajouter">Save changes</button>
      </div>
    </div>
  </div>
</form>



<script type="text/javascript">

                
         const recupLine = document.querySelector("#recupLine");
         recupLine.addEventListener("click",function(event){
           
             const lili = document.querySelector("#idArticle");
             const inputQuantite = document.querySelector("#inputQuantite")
             lili.value = recupLine.getAttribute("data-get-line");
             inputQuantite.value = recupLine.getAttribute("data-get-quantite")
         })



  function getData() {
  const audioCtx = new AudioContext();

  return fetch("http://localhost:8000/?path=production-add-java")
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error, status = ${response.status}`);
      }
      return response.arrayBuffer();
    })
    .then((buffer) => audioCtx.decodeAudioData(buffer))
    .then((decodedData) => {
      const source = new AudioBufferSourceNode();
      source.buffer = decodedData;
      source.connect(audioCtx.destination);
      return source;
    });
}
       
        
          const btnSelect = document.querySelector("#btnSelect");
          btnSelect.addEventListener("change",function(event){   
                 
           //const myList = document.querySelector("#listArticle");
          const valueSelected = btnSelect.options[btnSelect.selectedIndex].value
          const myRequest = new Request("http://localhost:8000/?path=production-add-java&value="+ valueSelected);
             fetch(myRequest)
                .then((response) => response.json())
                .then((data) => {
                  //console.log(data)
          //         for (const product of data.products) {
          //           const listItem = document.createElement("li");
          //           listItem.appendChild(document.createElement("strong")).textContent =
          //             product.libelle;
          //           listItem.append(` can be found in ${product.Location}. Cost: `);
          //           listItem.appendChild(
          //             document.createElement("strong"),
          //           ).textContent = `£${product.id}`;
          //           myList.appendChild(listItem);
          //         }
                }) 
          //       .catch(console.error);
             })
</script>
  




     


