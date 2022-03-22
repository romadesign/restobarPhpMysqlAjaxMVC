function getMenuPorUsuarios() {
    const xhttpMenuPorUsuario = new XMLHttpRequest();
    xhttpMenuPorUsuario.open('GET', base_url_user + 'Navbar/ListarNav', true);
    xhttpMenuPorUsuario.send();
    xhttpMenuPorUsuario.onreadystatechange = function () {
        if (xhttpMenuPorUsuario.readyState == 4 && xhttpMenuPorUsuario.status == 200) {
            let data = JSON.parse(this.responseText);
            let res = document.getElementById("navBarQuantityMenuCant");
            let cantidad = data[0]["c"];
            console.log(cantidad)
            res.innerHTML += `
            <i class="fas fa-shopping-cart"></i>
             <i  class="bi bi-cart">${cantidad} Items</i>
         `
        }
    }
}
getMenuPorUsuarios();


