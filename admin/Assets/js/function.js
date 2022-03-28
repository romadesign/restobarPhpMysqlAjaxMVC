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
        getMessage()
        amountMessage()
    } else {
        //Mostrando errodata por pantalla
        console.log(data, 'malo');
    }
   
}