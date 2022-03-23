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
