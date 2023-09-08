import {Api} from "./../core/api.js";
import {WEB_URL} from "./../core/bootstrapp.js";
window.addEventListener('load',async function(){

const itemsPerPage = 2; // Nombre d'articles par page
let currentPage = 1; // Page actuelle
let data = []; // Les données chargées depuis l'API
const tbody = document.getElementById("tbody"); // Assurez-vous d'avoir un élément avec l'ID "tbody" dans votre HTML
const nextButton = document.getElementById("nextButton"); // Assurez-vous d'avoir un bouton avec l'ID "nextButton" dans votre HTML
const prevButton = document.getElementById("prevButton"); // Assurez-vous d'avoir un bouton avec l'ID "prevButton" dans votre HTML

// Charger les données depuis l'API
async function loadData() {
    data = await Api.getData(`${WEB_URL}/articlevente-list`);
    renderPage();
}

//Afficher les articles pour la page actuelle
function renderPage() {
  const startIndex = (currentPage - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;
  
  tbody.innerHTML = ""; // Effacez le contenu du tbody pour éviter les doublons

  for (let i = startIndex; i < endIndex && i < data.length; i++) {
      const cat = data[i];
      const row = document.createElement("tr"); // Créez une nouvelle ligne pour chaque article

      row.innerHTML = `
          <td>${cat.id}</td>
          <td>${cat.libelle}</td>
          <td>${cat.referent}</td>
          <td>${cat.prixVente}</td>
          <td>${cat.marge}</td>
          <td class="text-center align-middle">
              <img src="${cat.photo}" alt="Image" width="70" height="50">
          </td>
          <td>
              <div class="action" style="display: flex;justify-content:space-around">
                  <a href="">
                      <i class="fas fa-solid fa-pen-to-square"></i>
                  </a>
                  <a href="">
                      <i class="fa-solid fa-trash" style="color: #f20226;"  id="delete${i}"></i>
                  </a>
                  <button type="button" id="detail${i}" style="color:white;background:black" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
              </div>
          </td>
      `;

      //gerer details
      tbody.appendChild(row); // Ajoutez la ligne au tbody
      const detailButton = document.getElementById(`detail${i}`);
      detailButton.addEventListener('click', async function () {
          const data = await Api.getData(`${WEB_URL}/confectionvente-list`);
          const data2 = await Api.getData(`${WEB_URL}/articleconfection-list`);
          data.forEach(element => {
                 if (cat.id == element.idArticleVente){
                  data2.forEach(element2 => {
                       if (element.idArticleConfection == element2.id) {
                        tbodyModal.innerHTML += `
                        <td> <div class="form-group has-success">
                        <label class="form-label" for="inputvalid">libelle</label>
                        <input type="text" name="referent" value="${element2.libelle}" class="form-control" id="">
                        </div>
                      </td>
                        <td>
                        <div class="form-group has-success">
                        <label class="form-label" for="inputvalid">quantite</label>
                        <input type="text" name="referent" value="${element.quantite}" class="form-control" id="">
                      </div>
                        </td>
                      `; 
                       }
                  });  
                 }
          });
      });

      //gerer suppression
      const deleteButton = document.getElementById(`delete${i}`);
      deleteButton.addEventListener('click',async function(){
          const idArticle = cat.id
          const etatAV1 = cat.etatAV
          await Api.postData(`${WEB_URL}/articlevente-delete`,{id: idArticle,etatAV: etatAV1}).then(function (data){ 
        
          })

      });

  }

  updatePaginationButtons();
}

// Mettre à jour l'état des boutons de pagination
function updatePaginationButtons() {
    nextButton.disabled = currentPage >= Math.ceil(data.length / itemsPerPage);
    prevButton.disabled = currentPage <= 1;
}

// Aller à la page suivante
async function nextPage() {
    if (currentPage < Math.ceil(data.length / itemsPerPage)) {
        currentPage++;
        await loadData(); // Recharge les données depuis l'API pour la nouvelle page
    }
}

// Aller à la page précédente
async function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        await loadData(); // Recharge les données depuis l'API pour la nouvelle page
    }
}

// Chargement initial des données et gestion des boutons de pagination
loadData();
nextButton.addEventListener("click", nextPage);
prevButton.addEventListener("click", prevPage);


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
let formValues2 = [];
let total = 0;
document.addEventListener('DOMContentLoaded', function(){
  const tbodyTable = document.getElementById('tbodyTable');
  addNewRow();
  
  addArticleConfection.addEventListener('click',function(){
      l += 1;
      addNewRow(); 
  });
  function addNewRow() {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>
        <div class="form-group has-success">
          <label class="form-label" for="inputvalid">libelle</label>
          <input type="text" name="referent" value="" class="form-control" id="libelle${l}">
          <div id="errorMessageMarge${l}" style="color:red"></div>
        </div>
      </td>
      <td>
        <div class="form-group has-success">
          <label class="form-label" for="inputvalid">quantite</label>
          <div style="display:flex">
          <input type="text" name="referent" value="" class="form-control" id="quantite${l}">
          <span id="spann${l}" value = "">(convert)</span>
          </div>
          <div id="errorMessage${l}" style="color:red"></div>
          <div id="errorMessage1${l}" style="color:red"></div>
        </div>
      </td>
    `;

    tbodyTable.appendChild(row);
    //validation des champs
    const libelleInput = document.getElementById(`libelle${l}`);
    const quantiteInput = document.getElementById(`quantite${l}`);
    const spannInput = document.getElementById(`spann${l}`)
    const addArticleConfection = document.getElementById('addArticleConfection');
    const errorMessageLibelle = document.getElementById(`errorMessageMarge${l}`);

    libelleInput.addEventListener('input', function(event) {
      const inputValue = event.target.value;
      if (/^[0-9]+$/.test(inputValue)) {
        errorMessageLibelle.textContent = "Le libellé ne doit pas être composé uniquement de chiffres.";
      }else {
        errorMessageLibelle.textContent = "";
       } 
       });
           if(libelleInput.value == ""){
            addArticleConfection.disabled = true
             quantiteInput.disabled = true
            }
            let trouve = false;
            let dernierValeur = "" 
            let trouve3 = false;
            let trouve4 = false;
           libelleInput.addEventListener('input', async function(event){
                dernierValeur = event.target.value
                formValues.forEach(element => {
                      if(element.libelle == dernierValeur){
                        quantiteInput.readOnly = true; 
                         trouve3 = true
                      }
                      if (trouve3) {
                        quantiteInput.readOnly = true
                      }else{
                        quantiteInput.readOnly = false
                      }
                });
                const data = await Api.getData(`${WEB_URL}/articleconfection-list`);
                const data1 = await Api.getData(`${WEB_URL}/categotirunite-listed`);
                const data2 = await Api.getData(`${WEB_URL}/categorie`);
                       data.forEach(element => {
                            if(element.libelle == dernierValeur){
                              addArticleConfection.disabled = false
                              quantiteInput.disabled = false
                              //validaton numerique
                              const errorMessage = document.getElementById(`errorMessage${l}`);
                              quantiteInput.addEventListener('input', function(event) {
                                  const inputValue = event.target.value;
                                  if (/[^0-9]/.test(inputValue)) {
                                    errorMessage.textContent = "Veuillez saisir uniquement un entier."; 
                                  }else{
                                    errorMessage.textContent = "";
                                  }
                                });
                                
                              data1.forEach(elemente => {
                                if (elemente.idCategorie == element.categorieId){
                                   spannInput.textContent = elemente.libelle
                                 } 
                              }); 
                              let libelleCategorie2 = "";
                              data2.forEach(element2 => {
                                if (element2.id == element.categorieId){
                                  libelleCategorie2 = element2.libelle
                                } 
                              });

                              addArticleConfection.addEventListener('click', async function(){
                                const libelleValue = libelleInput.value;
                                const quantiteValue = +quantiteInput.value;
                                total += quantiteValue * +element.prixAchat;
                                coutProduction.value = total;
  
                                const existingItemIndex = formValues.findIndex(item => item.libelle === libelleValue);
                                if (existingItemIndex !== -1) {
                                  formValues[existingItemIndex].quantite += quantiteValue;
                                } else {
                                  formValues.push({ libelle: libelleValue, quantite: quantiteValue, id: element.id, libelle2: libelleCategorie2 });
                                }
                          
                                const libellesRequis = ["tissu", "bouton", "aiguille"];
                                const libellesTrouves = libellesRequis.every(libelleRequis => {
                                  return formValues.some(item => item.libelle2.includes(libelleRequis));
                                });
                              
                                // Activez ou désactivez le bouton en conséquence
                                if (libellesTrouves) {
                                  addArticle.disabled = false;
                                } else {
                                  addArticle.disabled = true;
                                }
                              });

                                trouve = true  
                            }
                            if (trouve){
                              quantiteInput.disabled = false
                             }else{
                              quantiteInput.disabled = true
                             }
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

 //ajouter article de vente 
 if (formValues.length < 3){
    addArticle.disabled = true;
  }

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
            isTrouve1 = true;
         } 
      });
      if(isTrouve1){
      }else{
        errorMessage.style.color = "red";
        errorMessage.textContent = 'existe pas dans la base de donnée';
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

/// validation des champs
//validation libelle
const errorMessageLibelle = document.getElementById('errorMessageLibelle');
libelle.addEventListener('input', function(event) {
  const inputValue = event.target.value;
  if (/^[0-9]+$/.test(inputValue)) {
    errorMessageLibelle.textContent = "Le libellé ne doit pas être composé uniquement de chiffres.";
  }else {
    errorMessageLibelle.textContent = "";
  } 
});
//validation referent
const errorMessageReferent = document.getElementById('errorMessageReferent');
addArticle.addEventListener("click",function(){
    if (referent.value === "") {
      errorMessageReferent.textContent = "champ obligatoire";
      } else {
        errorMessageReferent.textContent = "";
    }
})
//validation categorie
const errorMessageCategorie = document.getElementById('errorMessageCategorie');
addArticle.addEventListener("click",function(){
    if (selectCategorie.value === "") {
      errorMessageCategorie.textContent = "champ obligatoire";
      } else {
        errorMessageCategorie.textContent = "";
    }
})
//VALIDATION taille
const errorMessageTaille = document.getElementById('errorMessageTaille');
addArticle.addEventListener("click",function(){
    if (selectTaille.value === "") {
      errorMessageTaille.textContent = "champ obligatoire";
      } else {
        errorMessageTaille.textContent = "";
    }
})
//validation marge
const errorMessageMarge1 = document.getElementById('errorMessageMarge1');
addArticle.addEventListener("click",function(){
    if (marge.value === "") {
      errorMessageMarge1.textContent = "champ obligatoire";
      } else {
        errorMessageMarge1.textContent = "";
    }
})

const errorMessageMarge2 = document.getElementById('errorMessageMarge2');
marge.addEventListener('input', function(event) {
  const inputValue = event.target.value;
  if (/[^0-9]/.test(inputValue)) {
    errorMessageMarge2.textContent = "Veuillez saisir uniquement un entier."; 
  }else{
    errorMessageMarge2.textContent = "";
  }
});
