
function getUsers(){
    const xhttpUsers = new XMLHttpRequest();
    xhttpUsers.open('GET', base_url + 'Usuarios/Listar', true);
    xhttpUsers.send();
    xhttpUsers.onreadystatechange = function () {
        if (xhttpUsers.readyState == 4 && xhttpUsers.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data)
            let res = document.getElementById("dataUsers");
            res.innerHTML = "";
            for (let user of data) {
                console.log(user)
                const admin = "admin";
                const usuario = "usuario";
                res.innerHTML += `
                    <tr>
                        <th scope="row">${user.id}</th>
                        <td>${user.username}</td>
                        <td>${user.email}</td>
                        <td>${user.phone}</td>
                        <td>${user.userType == "1" && admin || usuario}</td> 
                        <td>
                        <div class="d-flex">
                            <button type="button" onclick="selectUserId(${user.id})"  data-toggle="modal" data-target="#editUser">Edit</button>
                            <button type="button" onclick="deleteUserId(${user.id})"  data-toggle="modal" data-target="#deletetUser">Delete </button>
                        </div>
                        </td>
                    </tr>
                `
            }
        }

    }
}
getUsers();

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
            url = base_url + 'Usuarios/validar',
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
                        window.location = base_url + "Usuarios";
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
    if (username.value == "" || firstName.value == "" || lastName.value == "" || email.value == "" || phone.value == "" || userType.value == "" || password.value == "") {
        console.log("Necesita rellenar todos los campos")
        password.classList.remove("is-invalid");
        username.classList.add("is-invalid");
        username.focus();
    } else if (password.value != cpassword.value) {
        console.log("las contraseña no son iguales")

    } else {
        const xhrRegisterUser = new XMLHttpRequest(),
            method = "POST",
            url = base_url + 'Usuarios/registrar',
            frm = document.getElementById("frmUsuario");


        //Metodo 2
        xhrRegisterUser.open(method, url, true);
        xhrRegisterUser.send(new FormData(frm));
        xhrRegisterUser.onreadystatechange = function () {
            if (xhrRegisterUser.readyState === XMLHttpRequest.DONE) {
                var status = xhrRegisterUser.status;
                if (status === 0 || (status >= 200 && status < 400)) {
                    const res = JSON.parse(xhrRegisterUser.responseText);
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
}


function modificarUsuario(e) {
    e.preventDefault();
    const username = document.getElementById("editUsername");
    const firstName = document.getElementById("editFirstName");
    const lastName = document.getElementById("editLastName");
    const email = document.getElementById("editEmail");
    const phone = document.getElementById("editPhone");
    const userType = document.getElementById("editUserType");
    // if (username.value == "" || firstName.value == "" || lastName.value == "" || email.value == "" || phone.value == "" || userType.value == "") {
    //     console.log("Necesita rellenar todos los campos")
    // } else {
    const xhrModifyUser = new XMLHttpRequest(),
        method = "POST",
        url = base_url + 'Usuarios/modificar',
        frm = document.getElementById("frmEditUsuario");


    //Metodo 2
    xhrModifyUser.open(method, url, true);
    xhrModifyUser.send(new FormData(frm));
    xhrModifyUser.onreadystatechange = function () {
        if (xhrModifyUser.readyState === XMLHttpRequest.DONE) {
            var status = xhrModifyUser.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhrModifyUser.responseText);
                if (res == "si") {
                    console.log(res + ' Usuario editado con exito');
                } else {
                    //Mostrando errores por pantalla
                    console.log(res, 'malo');
                }
            }
        }
        // }
    }
}

function selectUserId(id) {
    const xhrSelectUser = new XMLHttpRequest(),
        method = "GET",
        url = base_url + 'Usuarios/selectUserId/' + id,
        frm = document.getElementById("frmEditUsuario");

    //Metodo 2
    xhrSelectUser.open(method, url, true);
    xhrSelectUser.send(new FormData(frm));
    xhrSelectUser.onreadystatechange = function () {
        if (xhrSelectUser.readyState === XMLHttpRequest.DONE) {
            var status = xhrSelectUser.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhrSelectUser.responseText);
                console.log(res.username)
                document.getElementById("id").value = res.id;
                document.getElementById("editUsername").value = res.username;
                document.getElementById("editFirstName").value = res.firstName;
                document.getElementById("editLastName").value = res.lastName;
                document.getElementById("editEmail").value = res.email;
                document.getElementById("editPhone").value = res.phone;
                document.getElementById("editUserType").value = res.userType;

            }
        }
    }
}

function deleteUserId(id) {
    console.log("delete " + id)
    const xhrDeleteUser = new XMLHttpRequest(),
        method = "POST",
        url = base_url + 'Usuarios/eliminarUserId/' + id;

    //Metodo 2
    xhrDeleteUser.open(method, url, true);
    xhrDeleteUser.send();
    xhrDeleteUser.onreadystatechange = function () {
        if (xhrDeleteUser.readyState === XMLHttpRequest.DONE) {
            var status = xhrDeleteUser.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhrDeleteUser.responseText);
                if (res == "ok") {
                    console.log(res + ' Usuario eliminado con exito');
                } else {
                    //Mostrando errores por pantalla
                    console.log(res, 'malo');
                }
            }
        }
    }
}



