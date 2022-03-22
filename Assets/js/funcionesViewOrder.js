function getOrderView() {
    const xhttpMenuPorUsuario = new XMLHttpRequest();
    xhttpMenuPorUsuario.open('GET', base_url_user + 'ViewOrder/ListarOrders', true);
    xhttpMenuPorUsuario.send();
    xhttpMenuPorUsuario.onreadystatechange = function () {
        if (xhttpMenuPorUsuario.readyState == 4 && xhttpMenuPorUsuario.status == 200) {
            let data = JSON.parse(this.responseText);
            let res = document.getElementById("viewsOrder");
            for (const order of data) {
                res.innerHTML += `
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
            }

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
    }

}
getOrderView();

function selecToRder(orderId) {
    const xhrSelectOrdersViews = new XMLHttpRequest(),
        method = "GET",
        url = base_url_user + 'ViewOrder/selectItemsOrders/' + orderId,
        frm = document.getElementById("frmOrderItemsViews");

    xhrSelectOrdersViews.open(method, url, true);
    xhrSelectOrdersViews.send(new FormData(frm));
    xhrSelectOrdersViews.onreadystatechange = function () {
        const menu = ""
        if (xhrSelectOrdersViews.readyState === XMLHttpRequest.DONE) {
            var status = xhrSelectOrdersViews.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhrSelectOrdersViews.responseText);
                for (let menu of res) {
                    console.log(menu);
                    console.log("acabo");
                    console.log(menu.menuName);
                    let contentMenu = document.getElementById("contenMenu");
                    contentMenu.innerHTML += `
                        <tr>
                            <th scope="row">${menu.menuId}</th>
                            <td>${menu.menuName}</td>
                            <td>${menu.itemQuantity}</td>
                        </tr>
                    `

                }

            }

        }
    }
}

function deleteOrderbutton() {
    document.getElementById("contenMenu").remove();
}


