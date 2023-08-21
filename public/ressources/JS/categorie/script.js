import {Api} from "./../core/api.js";
import {WEB_URL} from "./../core/bootstrapp.js";
window.addEventListener("load",async function(){
   await Api.getData(`${WEB_URL}/categorie`).then(function (data) {
      tbody.innerHTML = ""
      for(let cat of data){
      tbody.innerHTML += `
                <tr class="table">
                <th scope="row">${cat.id}</th>
                <td>${cat.libelle}</td>
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
// buttonSubmit.addEventListener("click",function(){
//     alert("ok")
// })
formbuttonSubmit.onsubmit = async function(event){
    event.preventDefault()
    const value = libelle.value
   await Api.postData(`${WEB_URL}/categorie-add`,{"libelle": value}).then(function (data) {
               
    })
}