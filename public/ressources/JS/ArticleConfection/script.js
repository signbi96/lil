import {Api} from "./../core/api.js";
import {WEB_URL} from "./../core/bootstrapp.js";

window.addEventListener("load",async function(){
    const selectCategorie = document.querySelector('#selectCategorie')
     await Api.getData(`${WEB_URL}/categorie`).then(function (data) {
        data.forEach(element => {
            const option = document.createElement('option');
            option.value = element.id; 
            option.textContent = element.libelle;
            selectCategorie.appendChild(option);
             });
    });


const itemsPerPage = 2; // Nombre d'articles par page
let currentPage = 1; // Page actuelle
let data = []; // Les données chargées depuis l'API
const tbody = document.getElementById("tbody"); // Assurez-vous d'avoir un élément avec l'ID "tbody" dans votre HTML
const nextButton = document.getElementById("nextButton"); // Assurez-vous d'avoir un bouton avec l'ID "nextButton" dans votre HTML
const prevButton = document.getElementById("prevButton"); // Assurez-vous d'avoir un bouton avec l'ID "prevButton" dans votre HTML

// Charger les données depuis l'API
async function loadData() {
    data = await Api.getData(`${WEB_URL}/articleconfection-list`);
    renderPage();
}

// Afficher les articles pour la page actuelle
function renderPage() {
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    tbody.innerHTML = "";
    for (let i = startIndex; i < endIndex && i < data.length; i++) {
        const cat = data[i];
        tbody.innerHTML += `
            <tr class="table">
                <th scope="row">${cat.id}</th>
                <td>${cat.libelle}</td>
                <td>${cat.prixAchat}</td>
                <td>${cat.qteStock}</td>
                <td>${cat.referent}</td>
                <td class="text-center align-middle">
                    <img src="${cat.photo}" alt="Image" width="70" height="50">
                </td>
                <td>
                    <div class="action" style="display: flex;justify-content:space-around">
                        <a href="">
                            <i class="fas fa-solid fa-pen-to-square"></i>
                        </a>
                        <a name="" id="deleteCategorie" class="btn btn-primary" href="#" role="button">
                            <i class="fas fa-archive" style="color:#002879"></i>
                        </a>
                    </div>
                </td>
            </tr>
        `;
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




 })
 

//image
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


exampleModal1.onsubmit = async function(event) {
    event.preventDefault();
    const value = libelleCategorie.value;
    const uniteModal = uniteModalCategorie.value;
    const convertisseurModal = convertisseurDefaut.value;
    await Api.postData(`${WEB_URL}/categorie-add`, { libelle: value, libelleModal: uniteModal, convertisseur: convertisseurModal }).then(function(data){
        // Ici, data contient les données renvoyées par la requête
        const dataCategorie = data.dataCategorie;
        // Utilisez les données pour effectuer les mises à jour nécessaires
        const option = document.createElement("option");
        option.value = dataCategorie.idCategorie;
        option.textContent = dataCategorie.libelleCategorie;
        selectCategorie.appendChild(option);
        selectCategorie.value = dataCategorie.idCategorie;
        console.log(dataCategorie.convertisseur);
        const optionUnite = document.createElement("option");
                optionUnite.value = dataCategorie.idUnite;
                optionUnite.textContent = dataCategorie.libelleUnite;
                selectUnite.appendChild(optionUnite);
                selectUnite.value = dataCategorie.idUnite;
               
    }).catch(function(error) {
        console.error(error);
    });

    libelleCategorie.value = ""
    uniteModalCategorie.value = ""
}
if(libelleCategorie.value === "" || uniteModalCategorie.value === ""){
    ajouterCategorie.disabled = true; 
}


//recuperation de la categorie pour l'unite apres ouverture du modale
buttonAddUnite.addEventListener("click",function(){
    const id = selectCategorie.options[selectCategorie.selectedIndex].value
    const libelleCategorie = selectCategorie.options[selectCategorie.selectedIndex].textContent   
    const libelleUnite = selectUnite.options[selectUnite.selectedIndex].textContent   
    const categorieSelectionner =document.querySelector('#categorieSelectionner');
    const categorieModale2 = document.querySelector('#categorieModale2')
    categorieModale2.value = libelleCategorie
    convertirMetre.value = libelleUnite
    categorieModale2.disabled = true; 
    categorieSelectionner.textContent = "la ctegorie selectionner est :" +libelleCategorie
})
//ajout dans le tableau des unites
let table = [];
let objetUnite = {};
ok.addEventListener("click",function(){
    const id = selectCategorie.options[selectCategorie.selectedIndex].value
    const libelleCategorie = selectCategorie.options[selectCategorie.selectedIndex].textContent 
    const libelleUnite = document.querySelector("#libelleUnite")
    const enMetre = document.querySelector("#enMetre")
     objetUnite = {
        "id": id,
        "libelle": libelleUnite.value,
        "convertisseur": enMetre.value,
     }
    table.push(objetUnite);
    tbody2.innerHTML += `
    <tr class="table">
    <th scope="row">${id}</th>
    <td>${libelleUnite.value}</td>
    <td>${enMetre.value}</td>
    <td>
    <div class="action" style="display: flex;justify-content:space-around">
    <a name="" id="deleteCategorie" class="btn btn-primary" href="#" role="button"
        > <i class="fas fa-archive" style="color:#002879"></i></a>
    </div>
    </td>
    </tr> 
`
libelleUnite.value = ""
enMetre.value = ""
});


exampleModal2.onsubmit = async function(event) {
    event.preventDefault();
    await Api.postData(`${WEB_URL}/unite-add`, { table: table }).then(function(data) {
        console.log(data)
        table.length = 0;
        tbody2.innerHTML = "";
        let optionsHTML = "";
            data.forEach(element => {
                console.log(element.idCategorie);
                optionsHTML += `<option value="${element["idCategorie"]}">${element.libelle}</option>`;
            }); 
            selectUnite.innerHTML += optionsHTML;    
    });

      
}

/* fin ajout unite */


 //parti1 recherche fournisseur 
//  const fournisseur = document.querySelector('#fournisseur')
//  let lastWord ;
//  let threelastWord;
//  let data1 = [];
//  let data2 = [];
//  let objet ={}

//  fournisseur.addEventListener("input",async function(event){
//     lastWord = event.target.value;
//     threelastWord = lastWord.substr(0, 3)
//     if(lastWord.length === 3){
//         await Api.getData(`${WEB_URL}/fournisseur-list`).then(function (data){ 

//                 data1 = data.filter(function(element){
//                     return element.nom.includes(lastWord)
//                 })       
//             console.log(data1)
//            });
//            //data1
//            tbody3.innerHTML = "";
//            for (let cat of data1){
//             for (let element1 of data2) {
//                 if(cat.nom === element1.nom){
//                     const indexASupprimer1 = data1.findIndex(item => item.id === cat.id);
//                     if (indexASupprimer1 !== -1) {
//                         data1.splice(indexASupprimer1, 1);
//                         idtr.remove()
//                     } 
//                 }
//             }
            
//                tbody3.innerHTML += `
//                    <tr id="tr${cat.id}">
//                        <td>${cat.nom}</td>
                       
//                        <td><input type="checkbox" class="sene-checkbox" data-id="${cat.id}"></td>
//                    </tr>
//                `;
//                // a revoir 
//                const checkboxes = document.querySelectorAll('.sene-checkbox');
//                checkboxes.forEach(checkbox => {
//                       checkbox.addEventListener('click', function(){
//                let idtr = document.querySelector("#tr" + cat.id)
//                       objet = {
//                         "id": cat.id,
//                         "nom": cat.nom,
//                         "prenom": cat.prenom,
//                         "email": cat.email,
//                         "password": cat.password
//                      }
                   
//                     //data2
//                      data2.push(objet)
//                      const indexASupprimer1 = data1.findIndex(item => item.id === cat.id);
//                             if (indexASupprimer1 !== -1) {
//                                 data1.splice(indexASupprimer1, 1);
//                                 idtr.remove()
//                             }
//                     tbody4.innerHTML = ""
//                     for (let element of data2) {
//                         tbody4.innerHTML += `
//                             <tr id="tr2${element.id}">
//                                 <td>${element.nom}</td>
//                                 <td style="color:red" id="id${element.id}"><i class="fas fa-archive" style="color:red"></i></td>
//                             </tr>
//                         `;
                    
//                         const identifiant2 = document.querySelector('#id' + element.id);
//                         const tr2 = document.querySelector('#tr2' + element.id);
//                         identifiant2.addEventListener('click', function() {
//                             const indexASupprimer = data2.findIndex(item => item.id === element.id);
//                             if (indexASupprimer !== -1) {
//                                 data2.splice(indexASupprimer, 1);
//                                 tr2.remove();
//                             }
//                           });
//                     }
                    
//                 });
//               });
              
//            }
           
//     }
   
//  }) 


//test
const fournisseur = document.querySelector('#fournisseur')
let lastWord ;
let threelastWord;
let data1 = [];
let data2 = [];
let objet ={}

fournisseur.addEventListener("input",async function(event){
   lastWord = event.target.value;
   threelastWord = lastWord.substr(0, 3)
   if(lastWord.length === 3){
       await Api.getData(`${WEB_URL}/fournisseur-list`).then(function (data){ 

               data1 = data.filter(function(element){
                   return element.nom.includes(lastWord)
               })       
           console.log(data1)
          });
          //data1
          tbody3.innerHTML = "";
          for (let cat of data1){
           for (let element1 of data2) {
               if(cat.nom === element1.nom){
                   const indexASupprimer1 = data1.findIndex(item => item.id === cat.id);
                   if (indexASupprimer1 !== -1) {
                       data1.splice(indexASupprimer1, 1);
                       idtr.remove()
                   } 
               }
           }
           
              tbody3.innerHTML += `
                  <tr id="tr${cat.id}">
                      <td>${cat.nom}</td>
                      
                      <td><input type="checkbox" class="sene-checkbox" id="checkboxe${cat.id}"></td>
                  </tr>
              `;
              // a revoir 
              const checkboxe = document.getElementById(`checkboxe${cat.id}`);
              checkboxe.addEventListener('click',function(){
                alert('ok')
                let idtr = document.getElementById(`tr${cat.id}`)
                objet = {
                  "id": cat.id,
                  "nom": cat.nom,
                  "prenom": cat.prenom,
                  "email": cat.email,
                  "password": cat.password
               }
               data2.push(objet)
               const indexASupprimer1 = data1.findIndex(item => item.id === cat.id);
                      if (indexASupprimer1 !== -1) {
                          data1.splice(indexASupprimer1, 1);
                          idtr.remove()
                      }
              tbody4.innerHTML = ""
              for (let element of data2) {
                  tbody4.innerHTML += `
                      <tr id="tr2${element.id}">
                          <td>${element.nom}</td>
                          <td style="color:red" id="id${element.id}"><i class="fas fa-archive" style="color:red"></i></td>
                      </tr>
                  `;
              
                 // const identifiant2 = document.querySelector('#id' + element.id);
                  const identifiant2 = document.getElementById(`id${element.id}`);
                  const tr2 = document.getElementById(`tr2${element.id}`);
                  identifiant2.addEventListener('click', function() {
                      const indexASupprimer = data2.findIndex(item => item.id === element.id);
                      if (indexASupprimer !== -1) {
                          data2.splice(indexASupprimer, 1);
                          tr2.remove();
                      }
                    });
              }
              })
             
          }
          
   }
  
})

 //ajout article
 formAddArticle.onsubmit = async function(event){
    event.preventDefault()
    const libelleArticle = libelle.value
    const prixArticle = prixAchat.value
    const quantiteArticle = quantite.value
    const referentArticle = referent.value
    const libelleCategorie = selectCategorie.options[selectCategorie.selectedIndex].textContent
    const selectCategorieArticle = selectCategorie.value
    const selectUniteArticle = selectUnite.value
   await Api.postData(`${WEB_URL}/articleconfection-add`,
   {libelle: libelleArticle,prixAchat: prixArticle,quantite: quantiteArticle,photo: photo,cheminImage: cheminImage,referent: referentArticle,
    selectCategorie: selectCategorieArticle,selectUnite: selectUniteArticle,libelleCategorie: libelleCategorie,data2: data2}).then(function (data){   
        // for(let cat of data){
        //     tbody.innerHTML += `
        //               <tr class="table">
        //               <th scope="row">${cat.idArticle}</th>
        //               <td>${cat.libelle}</td>
        //               <td>${cat.prixAchat}</td>
        //               <td>${cat.qteStock}</td>
        //               <td>${cat.referent}</td>
        //               <td class="text-center align-middle">
        //               <img src="${cat.photo}" alt="Image" width="70" height="50">
        //               </td>
        //               <td>
        //               <div class="action" style="display: flex;justify-content:space-around">
        //               <a href="">
        //               <i class="fas fa-solid fa-pen-to-square"></i></a>
                      
        //               <a name="" id="deleteCategorie" class="btn btn-primary" href="#" role="button"
        //                   > <i class="fas fa-archive" style="color:#002879"></i></a>
        //               </div>
        //               </td>
        //               </tr> 
        //     `
        //     }
    })
    libelle.value = ""
    prixAchat.value = ""
    quantite.value = ""
    referent.value = ""
    photo = " "
    selectCategorie.value = ""
    selectUnite.value = ""
    data2 = []
    errorMessage.textContent = ""

}

 exampleModal3.onsubmit = async function(event){
    event.preventDefault()
    const nomf = nom.value
    const prenomf = prenom.value
    const emailf = email.value
    const passwordf = password.value
    await Api.postData(`${WEB_URL}/fournisseur-add`,{nom: nomf,prenom: prenomf,email: emailf,password: passwordf}).then(function (data) {
         
    })
    
}


//recup id categorie pour categorieunite
selectCategorie.addEventListener("change",async function(){
    const id = selectCategorie.options[selectCategorie.selectedIndex].value
    await Api.postData(`${WEB_URL}/recup-categorie`,{id: id}).then(function (data) {
            
     }) 
    }) 

 //code numero d'ordre
//recuperation de l'id
selectCategorie.addEventListener("change",async function(){
  const idc = selectCategorie.options[selectCategorie.selectedIndex].value
  await Api.postData(`${WEB_URL}/recup-categorie-id`,{idc: idc}).then(function (data) {
          
   }) 
  }) 

let NombreArticle = 0;
selectCategorie.addEventListener("change", async function() {
  await Api.getData(`${WEB_URL}/articleconfection-table`).then(function(data) {
    NombreArticle += data.length+1;
      sessionStorage.setItem("NombreArticle", NombreArticle.toString());
  });
});
let savedNombreArticle = sessionStorage.getItem("NombreArticle");
//fin numero ordre  

let threeworldCat = "" ;
let threeworldLib = "" ;
let position = "00";
let loulou;
if (selectCategorie.value === "") {
    buttonAddUnite.disabled = true
}
ajouterCategorie.addEventListener('click',function(){
        buttonAddUnite.disabled = false
 
})
selectCategorie.addEventListener("change",async function(){
    if (selectCategorie.value === "") {
        buttonAddUnite.disabled = true
   }else{
       buttonAddUnite.disabled = false
   }
    const libelleCategorie = selectCategorie.options[selectCategorie.selectedIndex].textContent 
    const id = selectCategorie.options[selectCategorie.selectedIndex].value
    threeworldCat = libelleCategorie.substr(0, 3)
    position = +position + savedNombreArticle
    const selectUnite = document.getElementById('selectUnite')
    selectUnite.innerHTML = ""

    await Api.getData(`${WEB_URL}/categorie-unite`).then(function (data){
               data.forEach(element => {
                   const option = document.createElement('option');
                   option.value = element.id; 
                   option.textContent = element.libelle;
                  // option.dataset = 
                   selectUnite.appendChild(option);
               });  
                  
})
 loulou =  "ref-"+referent.value+"-"+threeworldCat+"-" + position;
 referent.value = loulou;
 
})



// Sélectionnez les éléments d'entrée
const libelle = document.getElementById('libelle');
const referent = document.getElementById('referent');

referent.value = "";

referent.addEventListener('input', function() {
    libelle.value = referent.value;
});

let threeWorldArt;

function referentInputHandler(event) {
    if (libelle.value.length > 3) {
        libelle.removeEventListener('input', referentInputHandler);
    } else {
        referent.value = libelle.value;
    }
}
libelle.addEventListener('input', referentInputHandler);

//validation boutton enregistrer
var errorMessage = document.getElementById("errorMessage");
libelle.addEventListener('input',async function(event){
    let isTrouve1 = false;
 await Api.getData(`${WEB_URL}/articleconfection-list`).then(function (data) {
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



//validation  unite

libelleUnite.addEventListener('input',async function(event){   
 let isTrouve = false;
 await Api.getData(`${WEB_URL}/unite`).then(function (data){
      data.forEach(element => {
        if (String(element.libelle) === String( libelleUnite.value)){
            ok.disabled = true; 
            isTrouve = true  
         }
      });
      if(isTrouve){
        enMetre.readOnly = true;
        ok.disabled = true; 
       }else{
        ok.disabled = false;   
         table.forEach(elem => {
            if(elem.libelle === libelleUnite.value){
                ok.disabled = true; 
            }
        });
      }
 });

})
//validation categorie


libelleCategorie.addEventListener("input",async function(){  
    let isTrouve = false;
    await Api.getData(`${WEB_URL}/categorie`).then(function (data) {
        data.forEach(element => {
            if (String(element.libelle) === String(libelleCategorie.value)){
             ajouterCategorie.disabled = true; 
                isTrouve = true  
             }
          });
          if(isTrouve){
             uniteModalCategorie.readOnly = true;
             ajouterCategorie.disabled = true; 
          }else{
            if(uniteModalCategorie.value === ""){
                ajouterCategorie.disabled = true;
            }else{
                ajouterCategorie.disabled = false;
            }
             
          }
    });
  
})

uniteModalCategorie.addEventListener('input',async function(event){ 
    let isTrouve = false;
    await Api.getData(`${WEB_URL}/unite`).then(function (data){
         data.forEach(element => {
           if (String(element.libelle) === String( uniteModalCategorie.value)){
            ajouterCategorie.disabled = true; 
            libelleCategorie.readOnly = true;
               isTrouve = true  
            }
         });
         if(isTrouve){
            libelleCategorie.readOnly = true;
            ajouterCategorie.disabled = true; 
         }else{
            if(libelleCategorie.value === ""){
                ajouterCategorie.disabled = true;
            }else{
                ajouterCategorie.disabled = false;
            } 
           }
    });
    
   })
//fin validation

//validation prix

const prixAchat = document.getElementById('prixAchat');
const errorMessage10 = document.getElementById('errorMessage10');
prixAchat.addEventListener('input', function(event) {
  const inputValue = event.target.value;
  if (/[^0-9]/.test(inputValue)) {
    errorMessage10.textContent = "Veuillez saisir uniquement des entiers.";
    addArticle.disabled = true; 
  } else {
    addArticle.disabled = false; 
    errorMessage10.textContent = "";
  }
});

//validation quantite
const quantite = document.getElementById('quantite');
const errorMessage11 = document.getElementById('errorMessage11');
quantite.addEventListener('input', function(event) {
  const inputValue = event.target.value;
  if (/[^0-9]/.test(inputValue)) {
    errorMessage11.textContent = "Veuillez saisir uniquement un entier.";
    addArticle.disabled = true; 
  }else{
    addArticle.disabled = false; 
    errorMessage11.textContent = "";
  }
});
//validation libelle
const libelleInput = document.getElementById('libelle');
const errorMessage12 = document.getElementById('errorMessage12');
libelleInput.addEventListener('input', function(event) {
  const inputValue = event.target.value;
  if (/^[0-9]+$/.test(inputValue)) {
    errorMessage12.textContent = "Le libellé ne doit pas être composé uniquement de chiffres.";
    addArticle.disabled = true; 
  } else {
    addArticle.disabled = false; 
    errorMessage12.textContent = "";
  }
});
//validation champ vide
const errorMessage13 = document.getElementById('errorMessage13');
addArticle.addEventListener("click",function(){
    if (libelle.value === "") {
        errorMessage13.textContent = "champ obligatoire";
      } else {
        errorMessage13.textContent = "";
    }
})

const errorMessage14 = document.getElementById('errorMessage14');
addArticle.addEventListener("click",function(){
 
    if (!prixAchat.value) {
        errorMessage14.textContent = "champ obligatoire";
      } else {
        errorMessage14.textContent = "";
    }
})

const errorMessage15 = document.getElementById('errorMessage15');
addArticle.addEventListener("click",function(){
 
    if (!quantite.value) {
        errorMessage15.textContent = "champ obligatoire";
      } else {
        errorMessage15.textContent = "";
    }
})

const errorMessage16 = document.getElementById('errorMessage16');
addArticle.addEventListener("click",function(){
 
    if (selectCategorie.value === "") {
        errorMessage16.textContent = "champ obligatoire";
      } else {
        errorMessage16.textContent = "";
    }
})

const errorMessage17 = document.getElementById('errorMessage17');
addArticle.addEventListener("click",function(){
 
    if (selectUnite.value === "") {
        errorMessage17.textContent = "champ obligatoire";
      } else {
        errorMessage17.textContent = "";
    }
})

const errorMessage18 = document.getElementById('errorMessage18');
addArticle.addEventListener("click",function(){
    if (referent.value === "") {
        errorMessage18.textContent = "champ obligatoire";
      } else {
        errorMessage18.textContent = "";
    }
})

const errorMessage19 = document.getElementById('errorMessage19');
addArticle.addEventListener("click",function(){
    if (fournisseur.value === "") {
        errorMessage19.textContent = "selectionner au moins un fournisseur";
      } else {
        errorMessage19.textContent = "";
    }
})

const nom = document.getElementById('nom');
const errorMessage20 = document.getElementById('errorMessage20');
nom.addEventListener('input', function(event){
  const inputValue = event.target.value;
  if (/^[0-9]+$/.test(inputValue)) {
    errorMessage20.textContent = "Le nom est incorrecte.";
  
  } else {
   errorMessage20.textContent = "";
   }
});

const prenom = document.getElementById('prenom');
const errorMessage21 = document.getElementById('errorMessage21');
prenom.addEventListener('input', function(event){
  const inputValue = event.target.value;
  if (/^[0-9]+$/.test(inputValue)) {
    errorMessage21.textContent = "Le prenom est incorrecte.";
  
  } else {
   errorMessage21.textContent = "";
   }
});

//validation email
const email = document.getElementById('email');  // Récupérer l'élément de l'adresse e-mail
const emailError = document.getElementById('emailError');  // Élément pour les erreurs de l'adresse e-mail
email.addEventListener('input', function(event) {
  const emailValue = event.target.value;
  if (!validateEmail(emailValue)) {
    emailError.textContent = "L'adresse e-mail est invalide.";
  } else {
    emailError.textContent = "";
  }
});

function validateEmail(email) {
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  return emailPattern.test(email);
}

// Validation mot de passe
const password = document.getElementById('password'); 
const passwordError = document.getElementById('passwordError'); 
password.addEventListener('input', function(event) {
  const passwordValue = event.target.value;
  if (!validatePassword(passwordValue)) {
    passwordError.textContent = "Le mot de passe doit avoir au moins 8 caractères.";
  } else {
    passwordError.textContent = "";
  }
});

function validatePassword(password) {
  return password.length >= 8;  
}
//validation photo
const inputValid2 = document.getElementById('inputValid'); // Récupérer l'élément d'entrée de fichier
const errorMessageImage = document.getElementById('errorMessageImage'); // Récupérer l'élément pour les erreurs d'image
inputValid2.addEventListener('change', function(event) {
  const selectedFile = event.target.files[0]; // Obtenir le fichier sélectionné
  if (selectedFile) {
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; // Types MIME autorisés
    if (allowedTypes.includes(selectedFile.type)) {
      errorMessageImage.textContent = ""; // Réinitialiser le message d'erreur
    } else {
      errorMessageImage.textContent = "Le format d'image est incorrect. Utilisez JPEG, PNG ou GIF.";
      }
  }
});

