function getMenuPorUsuarios() {
    const xhttpMenuPorUsuario = new XMLHttpRequest();
    xhttpMenuPorUsuario.open('GET', base_url_user + 'Navbar/CantidadItems', true);
    xhttpMenuPorUsuario.send();
    xhttpMenuPorUsuario.onreadystatechange = function () {
        if (xhttpMenuPorUsuario.readyState == 4 && xhttpMenuPorUsuario.status == 200) {
            let data = JSON.parse(this.responseText);
            let res = document.getElementById("navBarQuantityMenuCant");
            let cantidad = data[0]["c"];
            res.innerHTML += `
            <i class="fas fa-shopping-cart"></i>
             <i  class="bi bi-cart">${cantidad} Items</i>
         `
        }
    }
}
getMenuPorUsuarios();


function amountMessage() {
    const xhttpMenuPorUsuario = new XMLHttpRequest();
    xhttpMenuPorUsuario.open('GET', base_url_user + 'Navbar/getMessage', true);
    xhttpMenuPorUsuario.send();
    xhttpMenuPorUsuario.onreadystatechange = function () {
        if (xhttpMenuPorUsuario.readyState == 4 && xhttpMenuPorUsuario.status == 200) {
            let data = JSON.parse(this.responseText);
            let res = document.getElementById("totalMessage");
            let amountMessage = data.length
            // for (const message of data) {
            //     res.innerHTML += `
            //     <span  class="fst-italic"> 0 ${message.message}</span>
            //     `
            // }
            res.innerHTML += `
            <i class="far fa-envelope "></i>
            <i class="fst-italic">${amountMessage}</i>
            `
        }
    }
}
amountMessage();


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