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
                // document.getElementById("menuPrice").value = res.menuPrice
            }
        }
    }
}


function addMenuAlCarrito(e) {
    e.preventDefault();
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
                console.log(res)
                if (res == "ok") {
                    console.log(res + ' Usuario agregado al carrito con exito');
                    const resHtmlBackend = document.getElementById("errorAddMenu");
                    resHtmlBackend.innerHTML = `<div class="alert alert-primary" role="alert">
                                            ${res}
                                      </div>`;
                } else {
                    const resHtmlBackend = document.getElementById("errorAddMenu");
                    resHtmlBackend.innerHTML = `<div class="alert alert-info" role="alert">
                                            ${res}
                                      </div>`;
                    document.getElementById("optionsAddCart").style.display = "none";
                    console.log('ITEM YA INGRESADO AL CARRITO');
                }
            }
        }
    }
}


