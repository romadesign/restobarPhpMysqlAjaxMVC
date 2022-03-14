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
                    <td>${order.paymentMode}</td>
                    <td>${order.orderDate}</td>
                    <td>
                    <button id="orderStatusViews" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#statusOrder">
                    ${order.orderStatus}
                    </button>
                    </td>
                    <td>${order.orderId}</td>
                `
            }
        }
       
    }
    
}
getOrderView();
