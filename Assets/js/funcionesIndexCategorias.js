function getCategoriasIndex(){
    const xhttpCategoriaIndex = new XMLHttpRequest();
    xhttpCategoriaIndex.open('GET', base_url_user + 'Categorias/Listar', true);
    xhttpCategoriaIndex.send();
    xhttpCategoriaIndex.onreadystatechange = function () {
        if (xhttpCategoriaIndex.readyState == 4 && xhttpCategoriaIndex.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data)
            let res = document.getElementById("show_categories");
            res.innerHTML = "";
            for (let categorie of data) {
                console.log(categorie)
                res.innerHTML += `
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <img class="image_menu card-img-top" style="width: 5rem;" src="${categorie.categorieImage}">
                                <h5 class="card-title">${categorie.categorieName}</h5>
                                <p class="card-text">${categorie.categorieDesc}</p>
                                <a href="#" class="btn btn-primary" onclick="selectCategoriaId(${categorie.categorieId})" >Mirar detalles</a>
                            </div>
                        </div>
                    </div>
                `
            }
        }

    }
}
getCategoriasIndex();



function selectCategoriaId(categorieId) {
    //window.location = base_url_user + "Categorias/details";

    console.log(categorieId)
    const xhrSelectCategorie = new XMLHttpRequest(),
        method = "GET",
        url = base_url_user + 'Categorias/selectCategoriaId/' + categorieId;

    xhrSelectCategorie.open(method, url, true);
    xhrSelectCategorie.send();
    xhrSelectCategorie.onreadystatechange = function () {
        if (xhrSelectCategorie.readyState === XMLHttpRequest.DONE) {
            var status = xhrSelectCategorie.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                const res = JSON.parse(xhrSelectCategorie.responseText);
                console.log(res.categorieName)

            }
        }
    }
}