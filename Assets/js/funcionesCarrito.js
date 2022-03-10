function getMenuPorUsuarios() {
    const xhttpMenuPorUsuario = new XMLHttpRequest();
    xhttpMenuPorUsuario.open('GET', base_url_user + 'Carrito/Listar', true);
    xhttpMenuPorUsuario.send();
    xhttpMenuPorUsuario.onreadystatechange = function () {
        if (xhttpMenuPorUsuario.readyState == 4 && xhttpMenuPorUsuario.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data)
            let res = document.getElementById("carritoUser");
            for (let carritoUser of data) {
                console.log(carritoUser)
                const menuPrice = carritoUser.menuPrice
                const itemQuantity = carritoUser.itemQuantity
                const menuPrecioCantidad = menuPrice * itemQuantity
                res.innerHTML += `
                       <th scope="row"> ${carritoUser.menuId} </th>
                       <td>${carritoUser.menuName}</td>
                       <td>${menuPrice} </td>
                       <td>
                       ${itemQuantity} und.
                       <button type="button" onclick="selectMenuIdCant(${carritoUser.menuId})" data-bs-toggle="modal" data-bs-target="#editMenu">+</button>
                       </td>
                       <td>${menuPrecioCantidad}</td>
                       <td class="d-flex">
                        <button type="button" onclick="deleteMenuId(${carritoUser.menuId})">Delete</button>
                       </td>
                `
            }
        }
    }
}
getMenuPorUsuarios();


function editCantidad(e) {
    e.preventDefault();
    const xhrModifyCantidad = new XMLHttpRequest(),
        method = "POST",
        url = base_url_user + 'Carrito/editCantidad',
        frm = document.getElementById("frmMenuCantidad");

    xhrModifyCantidad.open(method, url, true);
    xhrModifyCantidad.send(new FormData(frm));
    xhrModifyCantidad.onreadystatechange = function () {
        if (xhrModifyCantidad.readyState === XMLHttpRequest.DONE) {
            var status = xhrModifyCantidad.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhrModifyCantidad.responseText);
                if (res == "si") {
                    console.log(res + ' menu modificada con exito');
                } else {
                    //Mostrando errores por pantalla
                    console.log(res, 'malo');
                }
            }
        }
    }
}

function selectMenuIdCant(menuId) {
    console.log(menuId)
    const xhrSelectMenuCantidad = new XMLHttpRequest(),
        method = "GET",
        url = base_url_user + 'Carrito/selectMenuIdCantidad/' + menuId,
        frm = document.getElementById("frmMenuCantidad");

    xhrSelectMenuCantidad.open(method, url, true);
    xhrSelectMenuCantidad.send(new FormData(frm));
    xhrSelectMenuCantidad.onreadystatechange = function () {
        if (xhrSelectMenuCantidad.readyState === XMLHttpRequest.DONE) {
            var status = xhrSelectMenuCantidad.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                console.log(xhrSelectMenuCantidad.responseText)

                const res = JSON.parse(xhrSelectMenuCantidad.responseText);
                console.log(res)
                console.log(res.menuId)
                document.getElementById("menuId").value = res.menuId;
                document.getElementById("edititemQuantity").value = res.itemQuantity;

            }
        }
    }
}


function deleteMenuId(menuId) {
    console.log("delete " + menuId)
    const xhrDeleteMenu = new XMLHttpRequest(),
        method = "POST",
        url = base_url_user + 'Carrito/eliminarMenuId/' + menuId;

    xhrDeleteMenu.open(method, url, true);
    xhrDeleteMenu.send();
    xhrDeleteMenu.onreadystatechange = function () {
        if (xhrDeleteMenu.readyState === XMLHttpRequest.DONE) {
            var status = xhrDeleteMenu.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhrDeleteMenu.responseText);
                if (res == "ok") {
                    console.log(res + ' Menú eliminado con exito');
                } else {
                    //Mostrando errores por pantalla
                    console.log(res, 'malo');
                }
            }
        }
    }
}