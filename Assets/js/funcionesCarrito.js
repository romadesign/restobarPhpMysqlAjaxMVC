function getMenuPorUsuarios(){
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
                res.innerHTML += `
                       <th scope="row"> ${carritoUser.menuId} </th>
                       <td>${carritoUser.menuName}</td>
                       <td>${carritoUser.menuPrice} </td>
                       <td><input type="number" value="${carritoUser.itemQuantity}"></td>
                       <td>${carritoUser.menuPrice * carritoUser.itemQuantity}</td>
                       <td>
                        <button type="button" onclick="deleteMenuId(${carritoUser.menuId})"  data-toggle="modal" data-target="#deletetCategorie">Delete</button>
                       </td>
                `
            }
        }
    }
}
getMenuPorUsuarios();


function deleteMenuId(menuId){
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
