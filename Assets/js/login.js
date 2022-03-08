function frmLogin(e) {
    e.preventDefault();
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
        const xhrLogin = new XMLHttpRequest(),
            method = "POST",
            url = base_url_user + 'Login/validarLogin',
            frm = document.getElementById("frmLogin");

        //Metodo 1
        xhrLogin.open(method, url, true);
        xhrLogin.send(new FormData(frm));
        xhrLogin.onreadystatechange = function () {
            if (xhrLogin.readyState === XMLHttpRequest.DONE) {
                var status = xhrLogin.status;
                if (status === 0 || (status >= 200 && status < 400)) {
                    const res = JSON.parse(xhrLogin.responseText);
                    console.log(xhrLogin.responseText);
                    if (res == "ok") {
                        console.log(res, 'jello')
                        window.location = base_url_user + "Categorias";
                    } else {
                        //Mostrando errores por pantalla
                        document.getElementById("alerta").classList.remove("d-none")
                        document.getElementById("alerta").innerHTML = res;

                    }
                }
            }
        }
    }
}