// function getMenuCategorias(){
//     const xhttpMenuCategorias = new XMLHttpRequest();
//     xhttpMenuCategorias.open('GET', base_url_user + 'Categorias/getCategories', true);
//     xhttpMenuCategorias.send();
//     xhttpMenuCategorias.onreadystatechange = function () {
//         if (xhttpMenuCategorias.readyState == 4 && xhttpMenuCategorias.status == 200) {
//             let data = JSON.parse(this.responseText);
//             // console.log(data)
//             let res = document.getElementById("menuCategorie");
//             for (let categorie of data) {
//                 console.log(categorie)
//                 res.innerHTML += `
//                 <div class="col-md-4">
//                     <div class="card">
//                         <div class="card-body">
//                             <img class="image_menu w-100"  src="${categorie.categorieImage}">
//                             <h5 class="card-title">${categorie.categorieName} </h5>
//                             <p class="card-text"> ${categorie.categorieDesc} </p>
//                         </div>
//                         <button type="button" onclick="selectCategoriaId(${categorie.categorieId})" >Mirar menús</button>
//                     </div>
//                 </div>
//                 `
//             }
//         }
//     }
// }
// getMenuCategorias();


// function selectCategoriaId(categorieId){

//     const xhttpMenuCategoriaId = new XMLHttpRequest();
//     xhttpMenuCategoriaId.open('GET', base_url_user + 'Categorias/menuCategoria/');
//     xhttpMenuCategoriaId.send();
//     if (xhttpMenuCategoriaId.readyState == 4 && xhttpMenuCategoriaId.status == 200) {
//         let data = JSON.parse(this.responseText);
//         console.log(data)
// window.location = base_url_user + "Categorias/menuCategorieId" ;
        
//     }
// }