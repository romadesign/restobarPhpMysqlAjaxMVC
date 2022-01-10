
const deleteUser = async (id) => {
    let showDetailModel = document.getElementById("modalDelete");
    showDetailModel.innerHTML = `
        <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Quieres eliminar este usuario? ${id}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Delete</button>
        </div>
    `
}

const getUsers = async () => { const xhttpUsers = new XMLHttpRequest();
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
                        <td>${user.userType == "1" && admin || usuario }</td> 
                        <td>
                        <div class="d-flex">
                            <button type="button" class="btn btn-primary mr-1">Edit</button>
                            <button type="button" onClick="deleteUser(${user.id})" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser">
                            Delete
                            </button>
                        </div>
                        </td>
                    </tr>
                `
            }
        }
    }
};
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
    if (username.value == "" || firstName.value == "" || lastName.value == ""  || email.value == "" || phone.value == "" || userType.value == "" || password.value == "") {
        console.log("Necesita rellenar todos los campos")
        password.classList.remove("is-invalid");
        username.classList.add("is-invalid");
        username.focus();
    } else if (password.value != cpassword.value ) {
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

