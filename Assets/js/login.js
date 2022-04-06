function frmLoginn(e) {
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