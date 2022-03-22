

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
                    const resHtmlBackend = document.getElementById("errorAddMenu");
                    resHtmlBackend.innerHTML = `<div class="alert alert-primary" role="alert">
                                            ${res}
                                      </div>`;
                    location.reload();
                } else {
                    const resHtmlBackend = document.getElementById("errorAddMenu");
                    resHtmlBackend.innerHTML = `<div class="alert alert-info" role="alert">
                                            ${res}
                                      </div>`;
                    document.getElementById("optionsAddCart").style.display = "none";
                    document.getElementById("errorAddMenu").style.display = "block";
                    location.reload();

                }
                document.getElementById("itemQuantity").value = ""

            }
        }
    }
}

function closeButton() {
    document.getElementById("menuId").value = ""
    document.getElementById("itemQuantity").value = ""
    document.getElementById("optionsAddCart").style.display = "block";
    document.getElementById("errorAddMenu").style.display = "none";

}

