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
                console.log(res.menuId)
                document.getElementById("menuId").value = res.menuId
                document.getElementById("menuName").value = res.menuName
                // document.getElementById("menuPrice").value = res.menuPrice
            }
        }
    }
}


function addMenuAlCarrito() {
    const xhttpAddMenuAlCart = new XMLHttpRequest(),
        method = "POST",
        url = base_url_user + 'Categorias/ingresarMenuAlCarrito',
        frm = document.getElementById("frmAddCartMenu");

    xhttpAddMenuAlCart.open(method, url, true);
    xhttpAddMenuAlCart.send(new FormData(frm));
    xhttpAddMenuAlCart.onreadystatechange = function () {
        if (xhttpAddMenuAlCart.readyState === XMLHttpRequest.DONE) {
            var status = xhttpAddMenuAlCart.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhttpAddMenuAlCart.responseText);
                if (res == "si") {
                    console.log(res + ' Usuario registrado con exito');
                } else {
                    //Mostrando errores por pantalla
                    console.log(res, 'malo');
                }
            }
        }
    }

}