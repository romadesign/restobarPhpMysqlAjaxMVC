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
                            <button type="button" onclick="selectCategorieId(${categorie.id})"  data-toggle="modal" data-target="#editCategorie">Edit</button>
                            <button type="button" onclick="deleteCategorieId(${categorie.id})"  data-toggle="modal" data-target="#deletetCategorie">Delete </button>
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
