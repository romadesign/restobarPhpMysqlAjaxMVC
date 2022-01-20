function getCategorias(){
    const xhttpCategorias = new XMLHttpRequest();
    xhttpCategorias.open('GET', base_url + 'Categorias/Listar', true);
    xhttpCategorias.send();
    xhttpCategorias.onreadystatechange = function () {
        if (xhttpCategorias.readyState == 4 && xhttpCategorias.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data)
            let res = document.getElementById("dataCategories");
            res.innerHTML = "";
            for (let categorie of data) {
                console.log(categorie)
                res.innerHTML += `
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
            }
        }

    }
}
getCategorias();


function createCategoria(e) {
    e.preventDefault();
    const categorieName = document.getElementById("categorieName");
    const categorieDesc = document.getElementById("categorieDesc");
    const categorieImage = document.getElementById("categorieImage");
    if (categorieName.value == "" || categorieDesc.value == "" || categorieImage.value == "") {
        console.log("Necesita rellenar todos los campos")
    } else {
        const xhrCreateCategorie = new XMLHttpRequest(),
            method = "POST",
            url = base_url + 'Categorias/createCategories',
            frm = document.getElementById("frmCategoria");

        xhrCreateCategorie.open(method, url, true);
        xhrCreateCategorie.send(new FormData(frm));
        xhrCreateCategorie.onreadystatechange = function () {
            if (xhrCreateCategorie.readyState === XMLHttpRequest.DONE) {
                var status = xhrCreateCategorie.status;
                if (status === 0 || (status >= 200 && status < 400)) {
                    const res = JSON.parse(xhrCreateCategorie.responseText);
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


function editCategoria(e) {
    e.preventDefault();
    const categorieName = document.getElementById("editCategorieName");
    const categorieDesc = document.getElementById("editCategorieDesc");
    if (categorieName.value == "" || categorieDesc.value == "" ) {
        console.log("Necesita rellenar todos los campos")
    } else {
        const xhrModifyCategorie = new XMLHttpRequest(),
        method = "POST",
        url = base_url + 'Categorias/modificarCategoria',
        frm = document.getElementById("frmEditCategoria");

        xhrModifyCategorie.open(method, url, true);
        xhrModifyCategorie.send(new FormData(frm));
        xhrModifyCategorie.onreadystatechange = function () {
            if (xhrModifyCategorie.readyState === XMLHttpRequest.DONE) {
                var status = xhrModifyCategorie.status;
                if (status === 0 || (status >= 200 && status < 400)) {
                    const res = JSON.parse(xhrModifyCategorie.responseText);
                    if (res == "si") {
                        console.log(res + ' Categoria modificada con exito');
                    } else {
                        //Mostrando errores por pantalla
                        console.log(res, 'malo');
                    }
                }
            }
        }
    }
}


function selectCategoriaId(categorieId) {
    const xhrSelectCategorie = new XMLHttpRequest(),
        method = "GET",
        url = base_url + 'Categorias/selectCategoriaId/' + categorieId,
        frm = document.getElementById("frmEditCategoria");

    xhrSelectCategorie.open(method, url, true);
    xhrSelectCategorie.send(new FormData(frm));
    xhrSelectCategorie.onreadystatechange = function () {
        if (xhrSelectCategorie.readyState === XMLHttpRequest.DONE) {
            var status = xhrSelectCategorie.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhrSelectCategorie.responseText);
                console.log(res.categorieName)
                document.getElementById("categorieId").value = res.categorieId;
                document.getElementById("editCategorieName").value = res.categorieName;
                document.getElementById("editCategorieDesc").value = res.categorieDesc;

            }
        }
    }
}

function deleteCategorieId(categorieId){
    console.log("delete " + categorieId)
    const xhrDeleteCategorie = new XMLHttpRequest(),
        method = "POST",
        url = base_url + 'Categorias/eliminarCategoriaId/' + categorieId;

    xhrDeleteCategorie.open(method, url, true);
    xhrDeleteCategorie.send();
    xhrDeleteCategorie.onreadystatechange = function () {
        if (xhrDeleteCategorie.readyState === XMLHttpRequest.DONE) {
            var status = xhrDeleteCategorie.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhrDeleteCategorie.responseText);
                if (res == "ok") {
                    console.log(res + ' Categoria eliminado con exito');
                } else {
                    //Mostrando errores por pantalla
                    console.log(res, 'malo');
                }
            }
        }
    }
}



