
////////////////////////////////////////////////Function Navbar//////////////////////////////////////////
const getMenuPorUsuariosCantidad = function () {
    document.getElementById("navBarQuantityMenuCant").innerHTML = "";
    fetch(`${base_url_user}Navbar/CantidadItems`)
        .then(data => data.json())
        .then(data => data.forEach(cantidad => {
            console.log(cantidad.c)
            document.getElementById("navBarQuantityMenuCant").innerHTML += `
                <i class="fas fa-shopping-cart"></i>
                <i  class="bi bi-cart">${cantidad.c} Items</i>
            `;
        }));
}
getMenuPorUsuariosCantidad()

const amountMessage = function () {
    document.getElementById("totalMessage").innerHTML = "";
    fetch(`${base_url_user}Navbar/getMessage`)
        .then(data => data.json())
        .then(data => {
            let amount = data.length
            document.getElementById("totalMessage").innerHTML += `
                <i class="far fa-envelope "></i>
                <i class="fst-italic">${amount}</i>
            `;
        });
}
amountMessage()


function getMessage() {
    const xhttpMenuPorUsuario = new XMLHttpRequest();
    xhttpMenuPorUsuario.open('GET', base_url_user + 'Navbar/getMessage', true);
    xhttpMenuPorUsuario.send();
    xhttpMenuPorUsuario.onreadystatechange = function () {
        if (xhttpMenuPorUsuario.readyState == 4 && xhttpMenuPorUsuario.status == 200) {
            let data = JSON.parse(this.responseText);
            let res = document.getElementById("dataMessage");
            for (const message of data) {
                res.innerHTML += `
                
                <div class="contentAddMessage">
                    <div>
                        <h6>Recibido el ${message.datetime}</h6>
                        <div class="text-message">${message.message}</div>
                    </div>
                    <i class="icon-delete-message fa fa-trash" aria-hidden="true"  onclick="deleteMessageId(${message.id})"></i>
                </div>
                `
            }
        }
    }
}
getMessage();

function deleteMessageId(id) {
    console.log("delete " + id)
    const xhrDeleteMessage = new XMLHttpRequest(),
        method = "POST",
        url = base_url_user + 'Navbar/eliminarMensajeId/' + id;

    xhrDeleteMessage.open(method, url, true);
    xhrDeleteMessage.send();
    xhrDeleteMessage.onreadystatechange = function () {
        if (xhrDeleteMessage.readyState === XMLHttpRequest.DONE) {
            var status = xhrDeleteMessage.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhrDeleteMessage.responseText);
                if (res == "ok") {
                    console.log(res + ' Mensaje eliminado');
                    window.location.reload()
                } else {
                    //Mostrando errores por pantalla
                    console.log(res, 'malo');
                }
            }
        }
    }
}

////////////////////////////////////////////////Function Navbar//////////////////////////////////////////



////////////////////////////////////////////////Function Cart//////////////////////////////////////////
const frmCarritoUser = document.querySelector("#frmCarritoUser");
frmCarritoUser.addEventListener('submit', (e) => {
    e.preventDefault();
    const datos = new FormData(document.getElementById('frmCarritoUser'));
    var itemQuantity = datos.get("edititemQuantity")
    var url = `${base_url_user}Carrito/editCantidad`;
    fetch(url, {
        method: 'POST',
        body: datos
    })
        .then(data => data.json())
        .then(data => {
            mostrarItemsCart(data)
            document.querySelector("#editMenu").style.display = "none";
            // document.querySelector(".modal-backdrop.fade.show").style.display= "none";

        })
        .catch(function (error) {
            console.log("se recivio", error)
        })
})

const mostrarItemsCart = function () {
    document.getElementById("carritoUser").innerHTML = "";
    fetch(`${base_url_user}Carrito/Listar`)
        .then(data => data.json())
        .then(data => data.forEach(carritoUser => {
            const menuPrice = carritoUser.menuPrice
            const itemQuantity = carritoUser.itemQuantity
            const menuPrecioCantidad = menuPrice * itemQuantity
            console.log(menuPrecioCantidad)
            document.getElementById("carritoUser").innerHTML += `
                <tr>
                <th scope="row"> ${carritoUser.menuId} </th>
                <td>${carritoUser.menuName}</td>
                <td>${menuPrice} €</td>
                <td id="cantidadMenu">
                ${itemQuantity}
                <button class="button-editItem" type="submit" onclick="selectMenuIdCant(${carritoUser.menuId})" data-bs-toggle="modal" data-bs-target="#editMenu">+</button>
                </td>
                <td id="priceTotsal">${menuPrecioCantidad} €</td>
                <td class="d-flex">
                <button class="button-delete" type="submit" onclick="deleteMenuId(${carritoUser.menuId})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
                </tr>
            `;

            //Mostrando el precio total sumanando por datos de cada fila (ID)
            let preciosSpan = document.querySelectorAll('#priceTotsal');
            let total = 0;

            preciosSpan.forEach(function (element) {
                let value = element.innerHTML;
                //eliminamos todo lo que no sea numero
                value = parseFloat(value.replace(/(?!-)[^0-9.]/g, ''))
                total += value
            })
            document.getElementById('total').innerHTML = `${total}€`
            document.getElementById('totalfinal').innerHTML = `${total}€`
            document.getElementById('amount').value = total
        }));
}
mostrarItemsCart()


const selectMenuIdCant = (menuId) => {
    console.log(menuId)
    var url = `${base_url_user}Carrito/selectMenuIdCantidad/${menuId}`;
    frm = document.getElementById("frmCarritoUser");

    var formData = new FormData(frm);
    formData.append('menuId', menuId);
    fetch(url, {
        method: "POST",
        body: formData
    })
        .then(data => data.json())
        .then(data => {
            console.log(data)
            document.getElementById("menuId").value = data.menuId;
            document.getElementById("edititemQuantity").value = data.itemQuantity;
        })
        .catch(function (error) {
            console.log("mal", error)
        })
}


const deleteMenuId = (menuId) => {
    console.log(menuId)
    var url = `${base_url_user}Carrito/eliminarMenuId/${menuId}`;

    fetch(url, {
        method: "DELETE"
    })
        .then(data => data.json())
        .then(data => {
            console.log("bien", data)
            mostrarItemsCart()
            getMenuPorUsuariosCantidad();
        })
        .catch(function (error) {
            console.log("mal", error)
        })
}

//Checkout
document.getElementById("alert-checkout").style.display = "none";
function addCheckoutUser(e) {
    e.preventDefault();

    const xhttpCheckOut = new XMLHttpRequest(),
        method = "POST",
        url = base_url_user + 'Carrito/realiandoOrder',
        frm = document.getElementById("checkout");

    xhttpCheckOut.open(method, url, true);
    xhttpCheckOut.send(new FormData(frm));
    xhttpCheckOut.onreadystatechange = function () {
        if (xhttpCheckOut.readyState === XMLHttpRequest.DONE) {
            var status = xhttpCheckOut.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhttpCheckOut.responseText);
                console.log(res)
                if (res == "eliminado") {
                    document.getElementById("checkout").style.display = "none";
                    document.getElementById("alert-checkout").style.display = "block";
                    window.location.reload()
                } else {

                }
            }
        }
    }
}



////////////////////////////////////////////////Function Cart//////////////////////////////////////////



////////////////////////////////////////////////Function menuCategorie//////////////////////////////////////////
function selectMenuAddCart(menuId) {
    console.log(menuId)

    const xhrSelectAddCarMenu = new XMLHttpRequest(),
        method = "GET",
        url = base_url_user + 'Categorias/selectMenuIdAddCart/' + menuId,
        frm = document.getElementById("frmAddCartMenu");

    xhrSelectAddCarMenu.open(method, url, true);
    xhrSelectAddCarMenu.send(new FormData(frm));
    xhrSelectAddCarMenu.onreadystatechange = function () {
        if (xhrSelectAddCarMenu.readyState === XMLHttpRequest.DONE) {
            var status = xhrSelectAddCarMenu.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhrSelectAddCarMenu.responseText);
                document.getElementById("menuId").value = res.menuId
                document.getElementById("menuName").value = res.menuName
            }
        }
    }
    document.getElementById("optionsAddCart").style.display = "block";
    document.getElementById("errorAddMenu").style.display = "none";
    document.getElementById("itemQuantity").value = ""

}


function addMenuAlCarrito(e) {

    e.preventDefault();
    const datos = new FormData(document.getElementById('frmAddCartMenu'));
    var url = `${base_url_user}Categorias/ingresarMenuAlCarrito`;
    fetch(url, {
        method: 'POST',
        body: datos
    })
        .then(data => data.json())
        .then(data => {
            const resHtmlBackend = document.getElementById("errorAddMenu");
            resHtmlBackend.innerHTML = `<div class="alert alert-primary" role="alert">
                                            ${data}
                                      </div>`;
            document.getElementById("optionsAddCart").style.display = "none";
            document.getElementById("errorAddMenu").style.display = "block";
           
            getMenuPorUsuariosCantidad()
            console.log("se recivio", data)
        })
        .catch(function (error) {
            console.log("norecivio", error)
        })

}

function closeButton(e) {
    e.preventDefault();
    document.getElementById("menuId").value = ""
    document.getElementById("itemQuantity").value = ""
   
    
}



////////////////////////////////////////////////Function menuCategorie//////////////////////////////////////////
