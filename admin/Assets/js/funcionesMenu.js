function getMenuss(){
    const xhttpMenus = new XMLHttpRequest();
    xhttpMenus.open('GET', base_url + 'Menus/Listar', true);
    xhttpMenus.send();
    xhttpMenus.onreadystatechange = function () {
        if (xhttpMenus.readyState == 4 && xhttpMenus.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data)
            let res = document.getElementById("dataMenus");
            res.innerHTML = "";
            for (let menu of data) {
                console.log(menu)
                res.innerHTML += `
                    <tr>
                        <th scope="row">${menu.menuCategorieId}</th>
                        <td>${menu.menuId}</td>
                        <td>${menu.menuName}</td>
                        <td>${menu.menuDesc}</td>
                        <td><img class="image_menu card-img-top" style="width: 5rem;" src="${menu.menuImage}"></td>
                        <td>
                        <div class="d-flex">
                            <button type="button" onclick="selectCategoriaId(${menu.categorieId})"  data-toggle="modal" data-target="#editCategorie">Edit</button>
                            <button type="button" onclick="deleteCategorieId(${menu.categorieId})"  data-toggle="modal" data-target="#deletetCategorie">Delete</button>
                        </div>
                        </td>
                    </tr>
                `
            }
        }

    }
}
getMenuss();



function createMenu(e) {
    e.preventDefault();
    const menuName = document.getElementById("menuName");
    const menuDesc = document.getElementById("menuDesc");
    const menuImage = document.getElementById("menuImage");
    if (menuName.value == "" || menuDesc.value == "" ) {
        console.log("Necesita rellenar todos los campos")
    } else {
        const xhrCreateMenu = new XMLHttpRequest(),
            method = "POST",
            url = base_url + 'Menus/createMenus',
            frm = document.getElementById("frmMenus");

        xhrCreateMenu.open(method, url, true);
        xhrCreateMenu.send(new FormData(frm));
        xhrCreateMenu.onreadystatechange = function () {
            if (xhrCreateMenu.readyState === XMLHttpRequest.DONE) {
                var status = xhrCreateMenu.status;
                if (status === 0 || (status >= 200 && status < 400)) {
                    console.log(xhrCreateMenu.responseText)
                    const res = JSON.parse(xhrCreateMenu.responseText);
                    if (res == "si") {
                        console.log(res + ' menu registrado con exito');
                    } else {
                        //Mostrando errores por pantalla
                        console.log(res, 'malo');
                    }
                }
            }
        }
    }
}


//create fetch javascript
// const data = new FormData(document.getElementById('frmMenus'));
// fetch(`${base_url}Menus/createMenus`, {
//    method: 'POST',
//    body: data
// })
// .then(function(response) {
//    if(response.ok) {
//        return response.text()
//    } else {
//        throw "Error en la llamada Ajax";
//    }

// })



//Con fetch javascript

// document.addEventListener('DOMContentLoaded', () => {
//     fetch(`${base_url}Menus/Listar`)
//     .then(res => res.json())
//     .then(res => res.forEach(menu => {
//        document.getElementById("dataMenus").innerHTML += `
//         <tr>
//             <th scope="row">${menu.menuCategorieId}</th>
//             <td>${menu.menuId}</td>
//             <td>${menu.menuName}</td>
//             <td>${menu.menuDesc}</td>
//             <td><img class="image_menu card-img-top" style="width: 5rem;" src="${menu.menuImage}"></td>
//             <td>
//             <div class="d-flex">
//                 <button type="button" onclick="selectCategoriaId(${menu.categorieId})"  data-toggle="modal" data-target="#editCategorie">Edit</button>
//                 <button type="button" onclick="deleteCategorieId(${menu.categorieId})"  data-toggle="modal" data-target="#deletetCategorie">Delete</button>
//             </div>
//             </td>
//         </tr>
//        `;
       
//     }));
// });