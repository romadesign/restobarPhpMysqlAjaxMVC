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
                            <button type="button" onclick="selectMenuId(${menu.menuId})"  data-toggle="modal" data-target="#editMenu">Edit</button>
                            <button type="button" onclick="deleteMenuId(${menu.menuId})"  data-toggle="modal" data-target="#deletetCategorie">Delete</button>
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

function editMenu(e) {
    e.preventDefault();
    const menuName = document.getElementById("editMenuName");
    const menuDesc = document.getElementById("editMenuDesc");
    const menuPrice = document.getElementById("editMenuPrice");
    const menuCategorieId = document.getElementById("editMenuCategorieId");
    // if (menuName.value == "" || menuDesc.value == "" ) {
    //     console.log("Necesita rellenar todos los campos")
    // } else {
        const xhrModifyMenu = new XMLHttpRequest(),
        method = "POST",
        url = base_url + 'Menus/editMenu',
        frm = document.getElementById("frmEditMenus");

        xhrModifyMenu.open(method, url, true);
        xhrModifyMenu.send(new FormData(frm));
        xhrModifyMenu.onreadystatechange = function () {
            if (xhrModifyMenu.readyState === XMLHttpRequest.DONE) {
                var status = xhrModifyMenu.status;
                if (status === 0 || (status >= 200 && status < 400)) {
                    const res = JSON.parse(xhrModifyMenu.responseText);
                    if (res == "si") {
                        console.log(res + ' menu modificada con exito');
                    } else {
                        //Mostrando errores por pantalla
                        console.log(res, 'malo');
                    }
                }
            }
        }
    // }
}

function deleteMenuId(menuId) {
    console.log("delete " + menuId)
    const xhrDeleteMenu = new XMLHttpRequest(),
        method = "POST",
        url = base_url + 'Menus/eliminarMenuId/' + menuId;

    xhrDeleteMenu.open(method, url, true);
    xhrDeleteMenu.send();
    xhrDeleteMenu.onreadystatechange = function () {
        if (xhrDeleteMenu.readyState === XMLHttpRequest.DONE) {
            var status = xhrDeleteMenu.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhrDeleteMenu.responseText);
                if (res == "ok") {
                    console.log(res + ' Usuario eliminado con exito');
                } else {
                    //Mostrando errores por pantalla
                    console.log(res, 'malo');
                }
            }
        }
    }
}

function selectMenuId(menuId) {
    const xhrSelectMenu = new XMLHttpRequest(),
        method = "GET",
        url = base_url + 'Menus/selectMenuId/' + menuId,
        frm = document.getElementById("frmEditMenus");

    xhrSelectMenu.open(method, url, true);
    xhrSelectMenu.send(new FormData(frm));
    xhrSelectMenu.onreadystatechange = function () {
        if (xhrSelectMenu.readyState === XMLHttpRequest.DONE) {
            var status = xhrSelectMenu.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                console.log(xhrSelectMenu.responseText)
                const res = JSON.parse(xhrSelectMenu.responseText);
                document.getElementById("menuId").value = res.menuId;
                document.getElementById("editMenuName").value = res.menuName;
                document.getElementById("editMenuDesc").value = res.menuDesc;
                document.getElementById("editMenuPrice").value = res.menuPrice;
                document.getElementById("editMenuCategorieId").value = res.menuCategorieId;

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