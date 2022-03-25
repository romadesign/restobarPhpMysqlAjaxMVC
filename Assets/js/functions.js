
////////////////////////////////////////////////Function Navbar//////////////////////////////////////////

getMenuPorUsuariosCantidad()
async function getMenuPorUsuariosCantidad() {
    document.getElementById("navBarQuantityMenuCant").innerHTML = "";
    const response = await fetch(`${base_url_user}Navbar/CantidadItems`);
    const data = await response.json();
    data.forEach(cantidad => {
        console.log(cantidad)
        document.getElementById("navBarQuantityMenuCant").innerHTML += `
                <i class="fas fa-shopping-cart"></i>
                <i  class="bi bi-cart">${cantidad.c} Items</i>
            `;
    })
   
}

amountMessage()
async function amountMessage() {
    document.getElementById("totalMessage").innerHTML = "";
    document.getElementById("dataMessage").innerHTML = "";
    const response = await fetch(`${base_url_user}Navbar/getMessage`);
    const data = await response.json();
    let amount = data.length
    document.getElementById("totalMessage").innerHTML += `
        <i class="far fa-envelope "></i>
        <i class="fst-italic">${amount}</i>
    `;
}

getMessage()
async function getMessage() {
    const response = await fetch(`${base_url_user}Navbar/getMessage`);
    const data = await response.json();
    data.forEach(message => {
        console.log(message)
        document.getElementById("dataMessage").innerHTML += `
        <div class="contentAddMessage">
            <div>
                <h6>Recibido el ${message.datetime}</h6>
                <div class="text-message">${message.message}</div>
            </div>
            <i class="icon-delete-message fa fa-trash" aria-hidden="true"  onclick="deleteMessageId(${message.id})"></i>
        </div>
        `
    })
   
}

async function deleteMessageId(id) {
    const response = await fetch(`${base_url_user}Navbar/eliminarMensajeId/${id}`);
    const data = await response.json();
    if (data == "ok") {
        console.log(data + ' Mensaje eliminado');
        getMessage()
        amountMessage()
    } else {
        //Mostrando errodata por pantalla
        console.log(data, 'malo');
    }
   
}
////////////////////////////////////////////////Function Navbar//////////////////////////////////////////

////////////////////////////////////////////////Function menuCategorie//////////////////////////////////////////
function selectMenuAddCart(menuId) {
    document.getElementById("tittle-menu-modal").innerHTML = "";
    var url = `${base_url_user}Categorias/selectMenuIdAddCart/${menuId}`;
    frm = document.getElementById("frmAddCartMenu");
    var formData = new FormData(frm);
    formData.append('menuId', menuId);
    fetch(url, {
        method: "POST",
        body: formData
    })
        .then(data => data.json())
        .then(data => {
            console.log(data)
            document.getElementById("menuId").value = data.menuId
            document.getElementById("tittle-menu-modal").innerHTML += `
            <h4 scope="row"> ${data.menuName} </h4>
        `;
        })
        .catch(function (error) {
            console.log("mal", error)
        })
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

function closeButton() {
    document.getElementById("menuId").value = ""
    document.getElementById("itemQuantity").value = ""
}
////////////////////////////////////////////////Function menuCategorie//////////////////////////////////////////


////////////////////////////////////////////////Function vieworder//////////////////////////////////////////////////////
getOrderView()
async function getOrderView() {
    document.getElementById("navBarQuantityMenuCant").innerHTML = "";
    const response = await fetch(`${base_url_user}ViewOrder/ListarOrders`);
    const data = await response.json();
    data.forEach(order => {
        document.getElementById("viewsOrder").innerHTML += `
            <th scope="row">${order.orderId}</th>
            <td>${order.address}</td>
            <td>${order.phoneNo}</td>
            <td>${order.amount} €</td>
            <td>${order.orderDate}</td>
            <td >
                <div id="orderStatusViews"  data-bs-toggle="modal" data-bs-target="#statusOrder">
                    ${order.orderStatus}
                </div>
            </td>
            <td >
                <a class="button-views" data-bs-toggle="modal" data-bs-target="#frmOrder" onclick="selecToRder(${order.orderId})" ><i class="fa fa-eye" aria-hidden="true"></i></a>
            </td>
        `
    })
    //Validar estado del pedido
    let status = document.querySelectorAll('#orderStatusViews');
    for (let statu of status) {
        if (statu.innerHTML == 0) {
            statu.innerHTML = `<div class="alert-status alert alert-primary" role="alert">
                                            Pedido realizado.. 
                                        </div>`
        } else if (statu.innerHTML == 1) {
            statu.innerHTML = `<div class="alert-status alert alert-primary" role="alert">
                                            Confirmado. 
                                        </div>`
        } else if (statu.innerHTML == 2) {
            statu.innerHTML = `<div class="alert-status alert alert-primary" role="alert">
                                            Preparando. 
                                        </div>`
        } else if (statu.innerHTML == 3) {
            statu.innerHTML = `<div class="alert-status alert alert-primary" role="alert">
                                                En camino 
                                        </div>`
        } else if (statu.innerHTML == 4) {
            statu.innerHTML = `<div class="alert-status alert alert-primary" role="alert">
                                             Delivery. 
                                        </div>`
        } else if (statu.innerHTML == 5) {
            statu.innerHTML = `<div class="alert-status alert alert-primary" role="alert">
                                            Denegado. 
                                        </div>`
        } else {
            statu.innerHTML = `<div class="alert-status alert alert-danger" role="alert">
                                            Cancelado
                                        </div>`
        }
    }
}



function selecToRder(orderId) {
    document.getElementById("contenMenu").innerHTML = "";
    var url = `${base_url_user}ViewOrder/selectItemsOrders/${orderId}`;
    frm = document.getElementById("frmOrderItemsViews");
    var formData = new FormData(frm);
    formData.append('orderId', orderId);
    fetch(url, {
        method: "POST",
        body: formData
    })
        .then(data => data.json())
        .then(data => {
            console.log(data)
            for (let menu of data) {
                let contentMenu = document.getElementById("contenMenu");
                contentMenu.innerHTML += `
                    <tr>
                        <th scope="row">${menu.menuId}</th>
                        <td>${menu.menuName}</td>
                        <td>${menu.itemQuantity}</td>
                    </tr>
                `
            }
        })
        .catch(function (error) {
            console.log("mal", error)
        })
}
////////////////////////////////////////////////Function vieworder//////////////////////////////////////////////////////


////////////////////////////////////////////////Function Cart//////////////////////////////////////////
document.getElementById("alert-modal-edit-quantity").style.display = "none";
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
            document.getElementById("alert-modal-edit-quantity").style.display = "block"
            document.getElementById("content-edit-quantity").style.display = "none"
            mostrarItemsCart()
        })
        .catch(function (error) {
            console.log("se recivio", error)
        })
})

mostrarItemsCart()
async function mostrarItemsCart() {
    document.getElementById("carritoUser").innerHTML = "";
    const response = await fetch(`${base_url_user}Carrito/Listar`);
    const data = await response.json();
    data.forEach(carritoUser => {
        const menuPrice = carritoUser.menuPrice
        const itemQuantity = carritoUser.itemQuantity
        const menuPrecioCantidad = menuPrice * itemQuantity
        console.log(carritoUser)
        document.getElementById("carritoUser").innerHTML += `
        <tr>
        <th scope="row"> ${carritoUser.menuId} </th>
        <td>${carritoUser.menuName}</td>
        <td>${carritoUser.menuPrice} €</td>
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
    })
   
}


const selectMenuIdCant = (menuId) => {
    document.getElementById("alert-modal-edit-quantity").style.display = "none"
    document.getElementById("content-edit-quantity").style.display = "block"
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