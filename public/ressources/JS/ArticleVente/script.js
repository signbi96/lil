import {Api} from "./../core/api.js";
import {WEB_URL} from "./../core/bootstrapp.js";

window.addEventListener('load',async function(){
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

