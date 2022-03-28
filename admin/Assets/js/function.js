getUsers()
async function getUsers() {
    document.getElementById("dataUsers").innerHTML = "";
    const response = await fetch(`${base_url}Usuarios/Listar`);
    const data = await response.json();
    data.forEach(user => {
        console.log(user)
        const admin = "admin";
        const usuario = "usuario";
        document.getElementById("dataUsers").innerHTML += `
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
        `;
    })

}

async function deleteUserId(id) {
    const response = await fetch(`${base_url}Usuarios/eliminarUserId/${id}`);
    const data = await response.json();
    if (data == "ok") {
        console.log(data + ' User Eliminado');
    } else {
        //Mostrando errodata por pantalla
        console.log(data, 'malo');
    }

}

async function userRegister(e) {
    e.preventDefault()
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
        const response = await fetch(`${base_url}Usuarios/registrar`, {
            method: 'POST',
            body: new URLSearchParams(new FormData(frmUsuario))
        });
        const data = await response.json();
        console.log(data)
        if (data == "si") {
            console.log(data + ' Usuario registrado con exito');
            document.getElementById("modalCreateUser").style.display = "none";
            getUsers();

        } else {
            //Mostrando errores por pantalla
            console.log(data, 'malo');
        }

    }
}

async function selectUserId(id) {
    const response = await fetch(`${base_url}Usuarios/selectUserId/${id}`);
    const data = await response.json();
    console.log(data)
    document.getElementById("id").value = data.id;
    document.getElementById("editUsername").value = data.username;
    document.getElementById("editFirstName").value = data.firstName;
    document.getElementById("editLastName").value = data.lastName;
    document.getElementById("editEmail").value = data.email;
    document.getElementById("editPhone").value = data.phone;
    document.getElementById("editUserType").value = data.userType;
}

async function modificarUsuario(e) {
    e.preventDefault()
    const response = await fetch(`${base_url}Usuarios/modificar`, {
        method: 'POST',
        body: new URLSearchParams(new FormData(frmEditUsuario))
    });
    const data = await response.json();
    if (data == "si") {
        console.log(data + ' Usuario editado con exito');
    } else {
        //Mostrando errores por pantalla
        console.log(data, 'malo');
    }

}

getCategorias()
async function getCategorias() {
    const response = await fetch(`${base_url}Categorias/Listar`);
    const data = await response.json();
    data.forEach(categorie => {
        document.getElementById("dataCategories").innerHTML += `
        <tr>
            <th scope="row">${categorie.categorieId}</th>
            <td>${categorie.categorieName}</td>
            <td>${categorie.categorieDesc}</td>
            <td><img class="image_menu card-img-top" style="width: 5rem;" src="${categorie.categorieImage}"></td>
            <td>
            <div class="d-flex">
                <button type="button" onclick="selectCategoriaId(${categorie.categorieId})"  data-toggle="modal" data-target="#editCategorie">Edit</button>
                <button type="button" onclick="deleteCategorieId(${categorie.categorieId})"  data-toggle="modal" data-target="#deletetCategorie">Delete</button>
            </div>
            </td>
        </tr>
    `
    })

}

async function createCategoria(e) {
    e.preventDefault()
    let frmCategoria = document.getElementById('frmCategoria')
    const response = await fetch(`${base_url}Categorias/createCategories`, {
        method: 'POST',
        body: new FormData(frmCategoria)
    });
    const data = await response.text();
    console.log(data)
    if (data == "si") {
        console.log(data + ' Usuario registrado con exito');

    } else {
        //Mostrando errores por pantalla
        console.log(data, 'malo');
    }


}

async function editCategoria(e) {
    e.preventDefault()
    const categorieName = document.getElementById("editCategorieName");
    const categorieDesc = document.getElementById("editCategorieDesc");
    if (categorieName.value == "" || categorieDesc.value == "") {
        console.log("Necesita rellenar todos los campos")
    } else {
        const response = await fetch(`${base_url}Categorias/modificarCategoria`, {
            method: 'POST',
            body: new URLSearchParams(new FormData(frmEditCategoria))
        });
        const data = await response.json();
        if (data == "si") {
            console.log(data + 'Categoria modificada con exito');
        } else {
            //Mostrando errores por pantalla
            console.log(data, 'malo');
        }
    }
}

async function selectCategoriaId(categorieId) {
    const response = await fetch(`${base_url}Categorias/selectCategoriaId/${categorieId}`);
    const data = await response.json();
    console.log(data.categorieName)
    document.getElementById("categorieId").value = data.categorieId;
    document.getElementById("editCategorieName").value = data.categorieName;
    document.getElementById("editCategorieDesc").value = data.categorieDesc;
}

async function deleteCategorieId(categorieId) {
    const response = await fetch(`${base_url}Categorias/eliminarCategoriaId/${categorieId}`);
    const data = await response.json();
    if (data == "ok") {
        console.log(data + 'Categoria eliminado con exito');
    } else {
        //Mostrando errodata por pantalla
        console.log(data, 'malo');
    }

}



getMenuss()
async function getMenuss() {
    const response = await fetch(`${base_url}Menus/Listar`);
    const data = await response.json();
    data.forEach(menu => {
        document.getElementById("dataMenus").innerHTML += `
        <tr>
        <th scope="row">${menu.menuCategorieId}</th>
        <td>${menu.menuId}</td>
        <td>${menu.menuName}</td>
        <td>${menu.menuDesc}</td>
        <td><img class="image_menu card-img-top" style="width: 5rem;" src="${menu.menuImage}"></td>
        <td>
        <div class="d-flex">
            <button type="button" onclick="selectMenuId(${menu.menuId})"  data-toggle="modal" data-target="#editMenu">Edit</button>
            <button type="button" onclick="deleteMenuId(${menu.menuId})"  data-toggle="modal" data-target="#deletetCategorie">Delete</button>
        </div>
        </td>
    </tr>
    `
    })

}

async function createMenu(e) {
    e.preventDefault()
    const menuName = document.getElementById("menuName");
    const menuDesc = document.getElementById("menuDesc");
    const menuImage = document.getElementById("menuImage");
    if (menuName.value == "" || menuDesc.value == "") {
        console.log("Necesita rellenar todos los campos")
    } else {
        let frmCategoria = document.getElementById('frmMenus')
        const response = await fetch(`${base_url}Menus/createMenus`, {
            method: 'POST',
            body: new FormData(frmCategoria)
        });
        const data = await response.text();
        console.log(data)
        if (data == "si") {
            console.log(data + ' Usuario registrado con exito');

        } else {
            //Mostrando errores por pantalla
            console.log(data, 'malo');
        }
    }
}

async function editMenu(e) {
    e.preventDefault()

    const response = await fetch(`${base_url}Menus/editMenu`, {
        method: 'POST',
        body: new URLSearchParams(new FormData(frmEditMenus))
    });
    const data = await response.json();
    if (data == "si") {
        console.log(data + 'menú modificada con exito');
    } else {
        //Mostrando errores por pantalla
        console.log(data, 'malo');
    }

}

async function selectMenuId(menuId) {
    const response = await fetch(`${base_url}Menus/selectMenuId/${menuId}`);
    const data = await response.json();
    console.log(data.categorieName)
    document.getElementById("menuId").value = data.menuId;
    document.getElementById("editMenuName").value = data.menuName;
    document.getElementById("editMenuDesc").value = data.menuDesc;
    document.getElementById("editMenuPrice").value = data.menuPrice;
    document.getElementById("editMenuCategorieId").value = data.menuCategorieId;
}

async function deleteMenuId(menuId) {
    const response = await fetch(`${base_url}Menus/eliminarMenuId/${menuId}`);
    const data = await response.json();
    if (data == "ok") {
        console.log(data + 'Menú eliminado con exito');
    } else {
        //Mostrando errodata por pantalla
        console.log(data, 'malo');
    }

}