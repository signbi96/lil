import {Api} from "./../core/api.js";
import {WEB_URL} from "./../core/bootstrapp.js";
window.addEventListener('load',async function(){

//liste des articles de ventes
  await Api.getData(`${WEB_URL}/articlevente-list`).then(function (data) {
    tbody.innerHTML = "";
    data.forEach(element => {
      tbody.innerHTML += `
      <td>${element.id}</td>
      <td>${element.libelle}</td>
      <td>${element.referent}</td>
      <td>${element.prixVente}</td>
      <td>${element.marge}</td>
      <td class="text-center align-middle">
      <img src="${element.photo}" alt="Image" width="70" height="50">
     </td>
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
  `;  
    });
 });

    const selectCategorie = document.querySelector('#selectCategorie')
     await Api.getData(`${WEB_URL}/categorieVente`).then(function (data) {
        data.forEach(element => {
            const option = document.createElement('option');
            option.value = element.id; 
            option.textContent = element.libelle;
            selectCategorie.appendChild(option);
             });
    });


    const selectTaille = document.querySelector('#selectTaille')
     await Api.getData(`${WEB_URL}/taille`).then(function (data) {
        data.forEach(element => {
            const option = document.createElement('option');
            option.value = element.id; 
            option.textContent = element.libelle;
            selectTaille.appendChild(option);
             });
    });

})

let l = 1; 
let formValues = [];
let total = 0;
document.addEventListener('DOMContentLoaded', function(){
  const tbodyTable = document.getElementById('tbodyTable');
  addNewRow();
  const libelleInput = document.getElementById(`libelle${l}`);
  const quantiteInput = document.getElementById(`quantite${l}`);
  const addArticleConfection = document.getElementById('addArticleConfection');
         if(libelleInput.value == ""){
          addArticleConfection.disabled = true
          quantiteInput.disabled = true
          }
        
     let trouve = false;
     let dernierValeur = ""
    libelleInput.addEventListener('input', async function(event){
         addArticleConfection.disabled = false
         dernierValeur = event.target.value
         await Api.getData(`${WEB_URL}/articleconfection-list`).then(function (data){
                data.forEach(element => {
                     if(element.libelle == dernierValeur){
                       quantiteInput.disabled = false
                        addArticleConfection.addEventListener('click',function(){
                        const libelleValue = libelleInput.value;
                        const quantiteValue = quantiteInput.value;
                        total += +quantiteInput.value * +element.prixAchat
                        coutProduction.value = total
                        formValues.push({ libelle: libelleValue, quantite: quantiteValue,id: element.id});
                        l += 1;
                        addNewRow(); 
                      });
                         trouve = true  
                     }
                     if (trouve){
                      quantiteInput.disabled = false
                      }else{
                      quantiteInput.disabled = true
                      }
               });
       });

    })      
   
  function addNewRow() {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>
        <div class="form-group has-success">
          <label class="form-label" for="inputvalid">libelle</label>
          <input type="text" name="referent" value="" class="form-control" id="libelle${l}">
          
        </div>
      </td>
      <td>
        <div class="form-group has-success">
          <label class="form-label" for="inputvalid">quantite</label>
          <div style="display:flex">
          <input type="text" name="referent" value="" class="form-control" id="quantite${l}">
          <span>(convert)</span>
          </div>
        </div>
      </td>
    `;

    tbodyTable.appendChild(row);
    //validation des champs
    const libelleInput = document.getElementById(`libelle${l}`);
    const quantiteInput = document.getElementById(`quantite${l}`);
    const addArticleConfection = document.getElementById('addArticleConfection');
           if(libelleInput.value == ""){
            addArticleConfection.disabled = true
            quantiteInput.disabled = true
            }
            let trouve = false;
            let dernierValeur = ""
           libelleInput.addEventListener('input', async function(event){
                addArticleConfection.disabled = false
                dernierValeur = event.target.value
                await Api.getData(`${WEB_URL}/articleconfection-list`).then(function (data){
                       data.forEach(element => {
                            if(element.libelle == dernierValeur){
                              quantiteInput.disabled = false
                               addArticleConfection.addEventListener('click',function(){
                               const libelleValue = libelleInput.value;
                               const quantiteValue = quantiteInput.value;
                               total += +quantiteInput.value * +element.prixAchat
                               coutProduction.value = total
                               formValues.push({ libelle: libelleValue, quantite: quantiteValue,id: element.id});
                             });
                                trouve = true  
                            }
                            if (trouve){
                             quantiteInput.disabled = false
                             }else{
                             quantiteInput.disabled = true
                             }
                      });
              });
       
           }) 
           //fin validation     
  }

  
});

let totalVente = 0;
let lastValue = 0;
let marge = document.getElementById('marge');
let prixVente = document.getElementById('prixVente');
marge.addEventListener("input", function(event){
     lastValue = +event.target.value;
     totalVente = lastValue + total;
     prixVente.value = totalVente;
});



 ///ajouter article de vente
 formAddArticle.onsubmit = async function(event){
  event.preventDefault()
  const libelleArticle = libelle.value
  const selectCategorieArticle = selectCategorie.value
  const selectTailleArticle = selectTaille.value
  const referentArticle = referent.value
  const margeArticle = marge.value

 await Api.postData(`${WEB_URL}/articlevente-add`,
 {libelle: libelleArticle,referent: referentArticle,selectCategorie: selectCategorieArticle,selectTaille: selectTailleArticle,marge: margeArticle,prixVente: totalVente,
  coutProduction: total,photo: photo,cheminImage: cheminImage,formValues: formValues}).then(function (data){   
     
  })
  libelle.value = ""
  selectCategorie.value = ""
  selectTaille.value = ""
  referent.value = ""
  marge.value = ""
  errorMessage.textContent = ""
}






//validation boutton enregistrer
const errorMessage = document.getElementById("errorMessage");
const libelle = document.getElementById("libelle")
libelle.addEventListener('input',async function(event){
    let isTrouve1 = false;
 await Api.getData(`${WEB_URL}/articlevente-list`).then(function (data) {
      data.forEach(element => {
        if (String(element.libelle) === String(libelle.value)){
            errorMessage.style.color = "green";
            errorMessage.textContent = 'existe deja dans la base de donnée';
            addArticle.disabled = true;
            isTrouve1 = true;
         } 
      });
      if(isTrouve1){
        addArticle.disabled = true; 
      }else{
        errorMessage.style.color = "red";
        errorMessage.textContent = 'existe pas dans la base de donnée';
        addArticle.disabled = false; 
      }
 });
})

//ajout categorie
exampleModal1.onsubmit = async function(event) {
  event.preventDefault();
  const value = libelleCategorie.value;
  await Api.postData(`${WEB_URL}/categorie-add1`, { libelle: value}).then(function(data){
        const dataCategorie = data.Categorie;
        const option = document.createElement("option");
        option.value = dataCategorie.idCategorie;
        option.textContent = dataCategorie.libelleCategorie;
        selectCategorie.appendChild(option);
        selectCategorie.value = dataCategorie.idCategorie;
  });

}
//ajout taille
exampleModal2.onsubmit = async function(event){
  event.preventDefault();
  const value = libelleTaille.value;
  await Api.postData(`${WEB_URL}/taille-add`, { libelle: value}).then(function(data){
    const dataTaille = data.Taille;
    const option = document.createElement("option");
    option.value = dataTaille.idTaille;
    option.textContent = dataTaille.libelleTaille;
    selectTaille.appendChild(option);
    selectTaille.value = dataTaille.idTaille;
  });

}
//chargement de la photo
const inputValid = document.querySelector("#inputvalid");
inputValid.addEventListener("change", onChangeImage);
let photo = ""; 
let cheminImage = ""; 
function onChangeImage(){
    cheminImage = inputValid.files[0]['name'];
    let f = new FileReader();
    f.readAsDataURL(inputValid.files[0]);
    f.onloadend = function (event) {
        const path = event.target.result;  
        photo = path; 
        document.querySelector("#imageChanged").setAttribute("src", path);
    };
}



