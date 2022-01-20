function getMenuss(){
    const xhttpMenus = new XMLHttpRequest();
    xhttpMenus.open('GET', base_url + 'Menus/Mostrar', true);
    xhttpMenus.send();
    xhttpMenus.onreadystatechange = function () {
        if (xhttpMenus.readyState == 4 && xhttpMenus.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data)
            let res = document.getElementById("dataMenus");
            res.innerHTML = "";
            for (let menu of data) {
                console.log(menu)
                res.innerHTML += `
                    <tr>
                        <th scope="row">${menu.menuCategorieId}</th>
                        <td>${menu.menuId}</td>
                        <td>${menu.menuName}</td>
                        <td><img class="image_menu card-img-top" style="width: 5rem;" src="${menu.menuImage}"></td>
                        <td>
                        <div class="d-flex">
                            <button type="button" onclick="selectCategoriaId(${menu.categorieId})"  data-toggle="modal" data-target="#editCategorie">Edit</button>
                            <button type="button" onclick="deleteCategorieId(${menu.categorieId})"  data-toggle="modal" data-target="#deletetCategorie">Delete</button>
                        </div>
                        </td>
                    </tr>
                `
            }
        }

    }
}
getMenuss();
