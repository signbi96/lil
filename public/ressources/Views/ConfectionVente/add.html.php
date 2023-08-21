
<?php
     
   
      ?> 
<div class="contenu" style='width:80%; height:auto; float: right; margin-top:2.4%;'>
       <h4 style="color:#002879;margin-top:0%;margin-left:15%">Ajouter d'articles confection a un article de vente</h4>
        <div class="container" style="width:70%;background: #D7D7D7;border-radius:8px;margin-left:5%">
                <form id="form">
                <input type="hidden" name="path" value="confectionvente-store">                
                        <div class="row">
                           <div class="col md-6">
                                        <div class="form-group"  style="margin-top:1%">
                                          <label for="" >Article vente</label>
                                          <input type="text" class="form-control" id="inputArticle" value="" name="id"  style="margin-top:-0.5%">
                                          <div id="messageinput" style="color:red">
                                          </div>
                                          <div id="errorMessage" ></div>
                                          
                                      </div>
                                </div>
                            </div> 

                          <div class="row" id="toutBoutton">
                            <div class="col md-6">
                                       <span style="margin-left:5%;color:green" id="textConfirme">voulez vous  creer cet article</span>
                                       <div class="boutton" style="display:flex;width:20%;margin-left:8%;justify-content:space-around">
                                         <button type="button" style="background:green;color:white;width:50%;height:30px" id="oui">oui</button>
                                         <button type="button" style="background:red;color:white;width:50%;height:30px" id="non">non</button>
                                       </div>
                                </div>
                            </div> 

                          <div class="row" id="categoriePartie">
                              
                            <div class="col md-6">
                                   <div class="form-group" >
                                     <label for="" style="margin-top:2%">Categorie</label>
                                      <select class="form-control" name="id" id="selectCategorie" style="margin-top:-1%;height:40px">
                                        <option value="">choisir Categorie</option>
                                      </select>
                                      
                                     </div>
                                    </div>

                           <div class="col md-6">
                                      <div class="form-group"  style="margin-top:1%">
                                          <label for="" >QuantiteArticle</label>
                                          <input type="text" class="form-control" id="QuantiteArticle" value="" name="QuantiteArticle"  style="margin-top:-0.5%">
                                          
                                          <div id="errorMessage" ></div>
                                          
                                         </div>
                                 </div>


                              <div class="col md-6">
                                      <div class="form-group"  style="margin-top:1%">
                                          <label for="" >photo</label>
                                          <input type="file" class="form-control" id="photo" 
                                          value="" name="photo"  style="margin-top:-0.5%">
                                          
                                          <div id="errorMessage" ></div>
                                          
                                         </div>
                                 </div>    

                           </div> 

                        
                         <div class="partie3" style="width:100%;height:100px;display:flex;justify-content:space-between">
                         <div class="col md-6">
                                   <div class="form-group" style="margin-top:2%;width:70%" >
                                     <label for="" style="margin-top:2%">ArticleConfection</label>
                                      <select class="form-control" name="id" id="selectArticle" style="margin-top:-1%;height:40px">
                                        <option value="">choisir article</option>
                                      </select>
                                       <div id="message" style="color:red">
                                       </div>
                                     </div>
                                    </div>
                            <div class="col md-6">
                            <div class="form-group" style="margin-top:2%">
                                          <label for="" style="margin-top:2%">Quantite</label>
                                          <input type="text" class="form-control" style="width:70%;margin-top:-1%"
                                          value="" name="qteCV" id="quantiteCV">
                                           <div id="messagequantite" style="color:red">
                                           </div> 
                                                                  
                             </div>
                              </div>

                                <button type="button" class="btn btn-primary " 
                                 style="background:#002879;height:40px;margin-top:4%;width:10%" name="ok" id="ok">ok</button>
                                    
                         </div>
                         
                         <table id="tableauDonnees">
                                <thead>
                                  <tr>
                                    <th>Article</th>
                                    <th>quantite</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                         </table>
                         <div class="attribut" style="display: flex;width:100%;justify-content:space-around" id="attribut">

                         <div class="form-group" style="width: 60%;margin-left:30%">
                         <input type="text"class="form-control" name="montant" 
                          value="0"
                          id="prixVente" aria-describedby="helpId" placeholder="">montant</input>
                        </div>

                        <div class="form-group" style="width: 60%;">
                         <input type="text"class="form-control" name="quantiteTotal" id="quantiteVente" value="0"
                           aria-describedby="helpId" placeholder="">quantite</input>
                        </div>

                        <div class="form-group" style="width: 60%;">
                         <input type="text"class="form-control" name="marge" 
                          value="0"
                          id="marge" aria-describedby="helpId" placeholder="">Marge</input>
                        </div>
                         </div>
                        
                                    <div class="card-foter text-center">
                                      <input type="submit"
                                       class="btn btn-primary " value="enregistrer" name="enregistrer" id="enregistrer"
                                       style="width: 50%;margin-top:0.5%;background:#002879">
                                    </div>
        </form>
  </div>
</div>



<script type="text/javascript">
// recuperation des elements a partir de leur propriete id
   const selectArticle = document.querySelector("#selectArticle")
   const quantite = document.querySelector("#quantiteCV")
   const ok = document.querySelector("#ok")
   const message = document.querySelector("#message")
   const form = document.querySelector("#form")
   const messagequantite = document.querySelector("#messagequantite")
   const messageinput = document.querySelector("#messageinput")
   const enregistrer = document.querySelector("#enregistrer")
   const inputArticle = document.querySelector("#inputArticle")
   const tableauDonnees = document.getElementById('tableauDonnees');
   const tbody = tableauDonnees.querySelector('tbody');
   const quantiteTotal = document.querySelector("#quantiteTotal")
   const prixVente = document.querySelector("#prixVente")
   
   const oui = document.getElementById("oui")
   const non = document.getElementById("non")
   const toutBoutton = document.getElementById("toutBoutton")
   const attribut = document.getElementById("attribut")
   
   const  categoriePartie = document.getElementById("categoriePartie")
   

//validation des champs
        if (inputArticle.value == ""){
              toutBoutton.style.display = "none"
              categoriePartie.style.display = "none"
              attribut.style.display = "none"
        }
       
        // if(selectArticle.value === ""){
        //    ok.style.display = "none"
        //  }
     
        

        let donneesParsees = {} ;
        let tableauDuLocalStorage = [];
         ok.addEventListener("click",function(event){
            event.preventDefault();
            if(quantite.value === "" || quantite.value <= 0){
               messagequantite.innerHTML = "ce contenue n'est pas normal"
            }else{
                 errorMessage.textContent = ''; 
                 quantiteSCV = quantite.value
                 const libelle = selectArticle.options[selectArticle.selectedIndex].textContent
                 const prix = selectArticle.options[selectArticle.selectedIndex].textContent2
                 const id = selectArticle.options[selectArticle.selectedIndex].value
                 //recupere chaque objet ajouter
                 newObjet = {
                      "quantiteSCV": quantiteSCV,
                      "prix": prix,
                      "id": id ,  
                      "libelle": libelle,
                    }

                 // Récupérer le tableau existant du localStorage (ou créer un tableau vide s'il n'existe pas encore)
                      let tableauObjets = JSON.parse(localStorage.getItem("tableauObjets")) || [];
                            
                      // Ajouter le nouvel objet au tableau
                      tableauObjets.push(newObjet);

                      // Enregistrer le tableau mis à jour dans le localStorage
                      localStorage.setItem("tableauObjets", JSON.stringify(tableauObjets));

                      // Pour récupérer le tableau d'objets du localStorage
                      tableauDuLocalStorage = JSON.parse(localStorage.getItem("tableauObjets"));

                    
                  
                 const newRow = document.createElement('tr')
                 newRow.innerHTML = `
                  <td>${libelle}</td>
                  <td>${quantiteSCV}</td>
                  <td>
                  <button type="button" class="btn  plus" style="width:5%;color:green;margin-top:-1%" ><h4>+</h4></button>
                  <button type="button" class="btn  moins" style="width:5%;color:red;margin-top:-1%" "><h4>-</h4></button>
                  </td>
                 `
                 prixVente.value = (+prixVente.value) + (+quantiteSCV * +prix);
                 quantiteTotal.value = (+quantiteTotal.value) + (+quantiteSCV)
      
                 const plus = newRow.querySelector('.plus');
                 const moins = newRow.querySelector('.moins');
              
                 plus.addEventListener("click",function(){
                  quantiteSCV = +quantiteSCV + 1
                  newRow.cells[1].textContent = quantiteSCV;
                 })

                 moins.addEventListener("click",function(){
                  quantiteSCV = +quantiteSCV - 1
                  if(quantiteSCV <= 0){
                    tableauDonnees.removeChild(newRow);
                   }else{
                    newRow.cells[1].textContent = quantiteSCV;
                   }                
                 })
               
               tableauDonnees.appendChild(newRow);
               //reinitialisation
               quantite.value = ""
               while (selectArticle.options.length > 0) {
                   selectArticle.remove(0);
               }
           
            }
         }) 
        //  enregistrer.addEventListener("click",function(event){
        //   localStorage.removeItem("tableauObjets");
            // event.preventDefault();
            // if (inputArticle.value === ""){
            // messageinput.innerHTML = "ce champ est obligatoire"
            // }else{

            //  console.log(newObjet2)
            //  console.log(tableauDuLocalStorage)
            
              
                // Effectuer la requête Fetch 
                //http://localhost:8000/confectionvente-store
                document.getElementById('enregistrer').addEventListener('click', (e) => 
                  {
                    // e.preventDefault();
                    // // let dataToInsert = {};
                    // //     dataToInsert = {
                    // //     newObjet2,
                    // //     tableauDuLocalStorage,
                    // //     }
                    // let libelle = document.getElementById('inputArticle').value;
                    // fetch("http://localhost:8000/confectionvente-add", {
                    //     method: 'POST',
                    //     headers: {
                    //       'Accept': 'application/json, text/plain, /',
                    //       'Content-type': 'application/json'
                    //     },
                    //     body: JSON.stringify({
                    //       libelle: libelle
                    //     })
                    //   })
                    //   .then(response => {
                    //     if (!response.ok) {
                    //       throw new Error(`Erreur HTTP : ${response.status}`);
                    //       }
                    //     return response.json(); 
                    //       })
                    //       .then(data => {
                    //         console.log(data)
                    //       })
                    //       .catch(error => {
                    //         console.error('Erreur :', error);
                    //       }); 
                    //   localStorage.clear();
              });

              document.getElementById('form').addEventListener('submit', (e) => 
                  {
                    e.preventDefault();
                    let dataToInsert = {};
                         dataToInsert = {
                         newObjet2,
                        tableauDuLocalStorage,
                       }
                    let libelle = document.getElementById('inputArticle').value;
                    console.log(libelle);
                    fetch("http://localhost:8000/confectionvente-store", {
                        method: 'POST',
                        headers: {
                          'Accept': 'application/json, text/plain, /',
                          'Content-type': 'application/json'
                        },
                        body: JSON.stringify(dataToInsert)
                      })
               
                  
                  });
              
              



         selectArticle.addEventListener("input",function(){
              lastWrite = event.target.value;
              if(lastWrite !== "") {
                ok.style.display = "block"
              } 
            })


           
          //recuperation des categories
            const selectCategorie = document.getElementById('selectCategorie')
            const idCategorie = selectCategorie.options[selectCategorie.selectedIndex].value
            selectCategorie.addEventListener("click",function(event){ 
             const myRequest = new Request("http://localhost:8000/api/confectionvente-add-select-categorie");
            fetch(myRequest)
            .then(response => {
              if (!response.ok) {
                throw new Error(`Erreur HTTP : ${response.status}`);
              }
              return response.json(); 
            })
            .then(data => {
              console.log(data)
              sessionStorage.setItem('data', JSON.stringify(data));
              data.forEach(element => {
              const option = document.createElement('option');
              option.value = element.id; 
              option.textContent = element.libelle;
              selectCategorie.appendChild(option);
               });
             })
            .catch(error => {
              console.error('Erreur :', error);
             }); 
            })


          //recuperation des articles de vente
          //debut
          selectArticle.addEventListener("click",function(event){ 
             const myRequest = new Request("http://localhost:8000/api/confectionvente-add-select");
             fetch(myRequest)
            .then(response => {
              if (!response.ok) {
                throw new Error(`Erreur HTTP : ${response.status}`);
              }
              return response.json(); 
            })
            .then(data => {
              sessionStorage.setItem('data', JSON.stringify(data));
              data.forEach(element => {
              const option = document.createElement('option');
              option.value = element.id; 
              option.textContent = element.libelle;
              option.textContent2 = element.prixAchat;
              selectArticle.appendChild(option);
               });
             })
            .catch(error => {
              console.error('Erreur :', error);
             });
              
            })
            //fin


      //permet de tester s'il existe dans la base de
      //debut
            const errorMessage = document.getElementById('errorMessage');
            const errorMessage1 = document.getElementById('errorMessage1');
            let idArticleExiste;
            let lastValue = '';
            const trouve = false;
            inputArticle.addEventListener("input",function(event){
              lastValue = event.target.value;
              const myRequest = new Request("http://localhost:8000/api/confectionvente-add-text");
              fetch(myRequest)
             .then(response => {
              if (!response.ok) {
                throw new Error(`Erreur HTTP : ${response.status}`);
              }
              return response.json(); 
             })
             .then(data => {
              data.forEach(element => {
                if (String(element.libelle) === String(lastValue)){
                     errorMessage.style.color = "green";
                     toutBoutton.style.display = "none"
                     categoriePartie.style.display = "none"
                      attribut.style.display = "none"
                     errorMessage.textContent = 'existe dans la base de donnée';
                     //recupere l'id puis l'inserer dans un objet
                     idArticleExiste = element.id
                     newObjet2 = {
                      "idArticleExiste": idArticleExiste,
                      }
                     
                     trouve = true;   
                }
                
                if(trouve === true){
                  toutBoutton.style.display = "none"
                    categoriePartie.style.display = "none"
                    attribut.style.display = "none"
                    errorMessage.style.color = "green";
                    errorMessage.textContent = 'existe dans la base de donnée';
                  }else{
                    errorMessage.style.color = "red";
                     toutBoutton.style.display = "block"
                    errorMessage.textContent = 'existe pas dans la base de données';
                   } 
               });
              })
             .catch(error => {
              console.error('Erreur :', error);
             });           
             })
             //fin

             //incremente quantite
            
           oui.addEventListener("click",function(event){
                    categoriePartie.style = "display:'block';justify-content:space-around"
                    attribut.style = "display:flex;justify-content:space-around"
                    toutBoutton.style.display = "none"
                    errorMessage.textContent = '';
               })

               //decremente quantite
           non.addEventListener("click",function(event){
                    toutBoutton.style.display = "none"
                    categoriePartie.style.display = "none"
                    attribut.style.display = "none"
                    errorMessage.textContent = ''
           })   
           
           


 </script> 



  




     


