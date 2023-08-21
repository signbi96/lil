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

    const selectUnite = document.querySelector('#selectUnite')
    await Api.getData(`${WEB_URL}/unite`).then(function (data) {
       data.forEach(element => {
           const option = document.createElement('option');
           option.value = element.id; 
           option.textContent = element.libelle;
           selectUnite.appendChild(option);
       });
   });


//lister Articles de confections
   await Api.getData(`${WEB_URL}/articleconfection-list`).then(function (data) {
    tbody.innerHTML = ""
    for(let cat of data){
    tbody.innerHTML += `
              <tr class="table">
              <th scope="row">${cat.id}</th>
              <td>${cat.libelle}</td>
              <td>${cat.prixAchat}</td>
              <td>${cat.qteStock}</td>
              <td>${cat.referent}</td>
              <td>
              <div class="action" style="display: flex;justify-content:space-around">
              <a href="">
              <i class="fas fa-solid fa-pen-to-square"></i></a>
              
              <a name="" id="deleteCategorie" class="btn btn-primary" href="#" role="button"
                  > <i class="fas fa-archive" style="color:#002879"></i></a>
              </div>
              </td>
              </tr> 
    `
    }
 });
  
  
 })

 //recuperer photo apres clique 
const inputvalid = document.querySelector("#inputvalid")
inputvalid.addEventListener("change",onChangeImage)
function onChangeImage(){
    let f = new FileReader();
    f.readAsDataURL(inputvalid.files[0]);
    f.onloadend = function(event){
        const path = event.target.result;
        document.querySelector('#imageChanged').setAttribute("src",path)
    }
}


 //Selectionne Categorie
 selectCategorie.addEventListener("change",function(){
    const id = selectCategorie.options[selectCategorie.selectedIndex].value
    const libelle = selectCategorie.options[selectCategorie.selectedIndex].textContent
    var checkbox = document.createElement('input');
    checkbox.type = 'checkbox';
    checkbox.id = id;
    checkbox.name = libelle;
    checkbox.checked = true;
    
    var label = document.createElement('label')
    label.htmlFor = 'car';
    label.appendChild(document.createTextNode(libelle));
 
    var br = document.createElement('br');
 
    var container = document.getElementById('conteneurCategorie');
    container.appendChild(checkbox);
    container.appendChild(label);
    container.appendChild(br); 
    checkbox.addEventListener("click",function(){
      checkbox.style.display = "none"
      label.style.display = "none"
    }) 
        
 })


 //ajout categorie
 exampleModal1.onsubmit = async function(event){
    event.preventDefault()
        const value = libelleCategorie.value
        await Api.postData(`${WEB_URL}/categorie-add`,{libelle: value}).then(function (data) {
                
         })  
}


 //ajout article
 formAddArticle.onsubmit = async function(event){
    event.preventDefault()
    const libelleArticle = libelle.value
    const prixArticle = prixAchat.value
    const quantiteArticle = quantite.value
    const libelleCategorie = selectCategorie.options[selectCategorie.selectedIndex].textContent
   // const photoArticle = photo.value
    const selectCategorieArticle = selectCategorie.value
    const selectUniteArticle = selectUnite.value
   await Api.postData(`${WEB_URL}/articleconfection-add`,
   {libelle: libelleArticle,prixAchat: prixArticle,quantite: quantiteArticle,
    selectCategorie: selectCategorieArticle,selectUnite: selectUniteArticle,libelleCategorie: libelleCategorie,table: tableFournisseurVue}).then(function (data){        
    })
}

/* debut ajout unite */

//recuperation de la categorie pour l'unite apres ouverture du modale
buttonAddUnite.addEventListener("click",function(){
    const id = selectCategorie.options[selectCategorie.selectedIndex].value
    const libelleCategorie = selectCategorie.options[selectCategorie.selectedIndex].textContent   
    const categorieSelectionner =document.querySelector('#categorieSelectionner');
    const categorieModale2 = document.querySelector('#categorieModale2')
    categorieModale2.value = libelleCategorie
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
});

exampleModal2.onsubmit = async function(event){
    event.preventDefault()
    await Api.postData(`${WEB_URL}/unite-add`,{table: table}).then(function (data) {
         
    })
    
}

/* fin ajout unite */


 //parti1 recherche fournisseur 
 const fournisseur = document.querySelector('#fournisseur')
 let tableFournisseurVue = [];
 let objetFournisseur = {};
 let lastWord ;
 fournisseur.addEventListener("input",async function(event){
    lastWord = event.target.value;
    await Api.getData(`${WEB_URL}/fournisseur-list`).then(function (data){   
        data.forEach(element => {
            if (element.nom.includes(lastWord)){  
                var checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.id = 'car';
                checkbox.name = 'interest';
               checkbox.checked = false;

               checkbox.addEventListener("click",function(){
                objetFournisseur = {
                    "idf": element.id,
                   }
                tableFournisseurVue.push(objetFournisseur); 
               })
                var label = document.createElement('label')
                label.htmlFor = 'car';
                label.appendChild(document.createTextNode(element.nom));

                var br = document.createElement('br');
             
                var container = document.getElementById('conteneurCheck');
                container.appendChild(checkbox);
                container.appendChild(label);
                container.appendChild(br); 
            }
        });
        
        });
 }) 




// Ajoutez un gestionnaire d'événement pour l'événement de suppression du contenu du champ d'input
fournisseur.addEventListener("change", function() {
    // Mettez à jour les cases à cocher lorsque le champ d'input est modifié
    updateCheckboxes();
});





 exampleModal3.onsubmit = async function(event){
    event.preventDefault()
    const nomf = nom.value
    const prenomf = prenom.value
    const emailf = email.value
    const passwordf = password.value
    await Api.postData(`${WEB_URL}/fournisseur-add`,{nom: nomf,prenom: prenomf,email: emailf,password: passwordf}).then(function (data) {
         
    })
    
}


