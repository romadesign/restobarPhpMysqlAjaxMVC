
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
// selectMenuAddCart()
async function selectMenuAddCart(menuId) {
    document.getElementById("tittle-menu-modal").innerHTML = "";
    const response = await fetch(`${base_url_user}Categorias/selectMenuIdAddCart/${menuId}`);
    const data = await response.json();
    console.log(data)
    document.getElementById("menuId").value = data.menuId
    document.getElementById("tittle-menu-modal").innerHTML += `
            <h4 scope="row"> ${data.menuName} </h4>
        `;
    document.getElementById("optionsAddCart").style.display = "block";
    document.getElementById("errorAddMenu").style.display = "none";
    document.getElementById("itemQuantity").value = ""

}

async function addMenuAlCarrito(e) {
    e.preventDefault()
    const response = await fetch(`${base_url_user}Categorias/ingresarMenuAlCarrito`, {
        method: 'POST',
        body: new URLSearchParams(new FormData(frmAddCartMenu))
    });
    const data = await response.json();
    console.log(data)
    const resHtmlBackend = document.getElementById("errorAddMenu");
    resHtmlBackend.innerHTML = `<div class="alert alert-primary" role="alert">
                                            ${data}
                                      </div>`;
    document.getElementById("optionsAddCart").style.display = "none";
    document.getElementById("errorAddMenu").style.display = "block";

    getMenuPorUsuariosCantidad()
    console.log("se recivio", data)

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


async function selecToRder(orderId) {
    document.getElementById("contenMenu").innerHTML = "";
    const response = await fetch(`${base_url_user}ViewOrder/selectItemsOrders/${orderId}`);
    const data = await response.json();
    console.log(data)
    data.forEach(menu => {
        console.log(menu)
        document.getElementById("contenMenu").innerHTML += `
                <tr>
                    <th scope="row">${menu.menuId}</th>
                    <td>${menu.menuName}</td>
                    <td>${menu.itemQuantity}</td>
                </tr>
            `;
    })

}
////////////////////////////////////////////////Function vieworder//////////////////////////////////////////////////////


////////////////////////////////////////////////Function Cart//////////////////////////////////////////
document.getElementById("alert-modal-edit-quantity").style.display = "none";
async function editQuantity(e) {
    e.preventDefault()
    const response = await fetch(`${base_url_user}Carrito/editCantidad`, {
        method: 'POST',
        body: new URLSearchParams(new FormData(frmCarritoUser))
    });
    const data = await response.json();
    console.log(data)
    document.getElementById("alert-modal-edit-quantity").style.display = "block"
    document.getElementById("content-edit-quantity").style.display = "none"
    mostrarItemsCart()

}

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

async function selectMenuIdCant(menuId) {
    document.getElementById("alert-modal-edit-quantity").style.display = "none"
    document.getElementById("content-edit-quantity").style.display = "block"

    const response = await fetch(`${base_url_user}Carrito/selectMenuIdCantidad/${menuId}`);
    const data = await response.json();
    console.log(data)
    document.getElementById("menuId").value = data.menuId;
    document.getElementById("edititemQuantity").value = data.itemQuantity;

}


async function deleteMenuId(menuId) {
    const response = await fetch(`${base_url_user}Carrito/eliminarMenuId/${menuId}`);
    const data = await response.json();
    if (data == "ok") {
        console.log(data + ' Mensaje menu eliminado');
        mostrarItemsCart()
        getMenuPorUsuariosCantidad();
    } else {
        //Mostrando errodata por pantalla
        console.log(data, 'malo');
    }

}

document.getElementById("alert-checkout").style.display = "none";
async function addCheckoutUser(e) {
    e.preventDefault()
    const response = await fetch(`${base_url_user}Carrito/realiandoOrder`, {
        method: 'POST',
        body: new URLSearchParams(new FormData(checkout))
    });
    const data = await response.json();
    console.log(data)
    if (data == "eliminado") {
        document.getElementById("checkout").style.display = "none";
        document.getElementById("alert-checkout").style.display = "block";
        window.location.reload()
    } else {

    }

}

////////////////////////////////////////////////Function Cart//////////////////////////////////////////


async function frmLoginn(e) {
    e.preventDefault()
    const username = document.getElementById("username");
    const password = document.getElementById("password");
    if (username.value == "") {
        console.log("ingrese usuername")
        password.classList.remove("is-invalid");
        username.classList.add("is-invalid");
        username.focus();
    } else if (password.value == "") {
        username.classList.remove("is-invalid");
        password.classList.add("is-invalid");
        password.focus();
    } else {
        const response = await fetch(`${base_url_user}Login/validarLogin`, {
            method: 'POST',
            body: new URLSearchParams(new FormData(frmLogin))
        });
        const data = await response.json();
        console.log(data)
        console.log(data, 'jello')
        window.location = base_url_user + "Categorias";
    }
}


function userRegister(e) {
    e.preventDefault();
    const username = document.getElementById("username");
    const firstName = document.getElementById("firstName");
    const lastName = document.getElementById("lastName");
    const email = document.getElementById("email");
    const phone = document.getElementById("phone");
    const userType = document.getElementById("userType");
    const password = document.getElementById("password");
    const cpassword = document.getElementById("cpassword");
    if (username.value == "" || firstName.value == "" || lastName.value == "" || email.value == "" || phone.value == "" || password.value == "") {
        console.log("Necesita rellenar todos los campos")
        password.classList.remove("is-invalid");
        username.classList.add("is-invalid");
        username.focus();
    } else if (password.value != cpassword.value) {
        console.log("las contraseña no son iguales")

    } else {
        const xhrRegisterUser = new XMLHttpRequest(),
            method = "POST",
            url = base_url_user + 'Login/registrar',
            frm = document.getElementById("frmNewUsuario");

        xhrRegisterUser.open(method, url, true);
        xhrRegisterUser.send(new FormData(frm));
        xhrRegisterUser.onreadystatechange = function () {
            if (xhrRegisterUser.readyState === XMLHttpRequest.DONE) {
                var status = xhrRegisterUser.status;
                if (status === 0 || (status >= 200 && status < 400)) {
                    const res = JSON.parse(xhrRegisterUser.responseText);
                    if (res == "si") {
                        console.log(res + ' Usuario registrado con exito');
                        window.location.href = base_url_user + 'Login';
                    } else {
                        //Mostrando errores por pantalla
                        console.log(res, 'malo');
                    }
                }
            }
        }
    }
}