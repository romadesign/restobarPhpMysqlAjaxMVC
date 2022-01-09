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
        const xhr = new XMLHttpRequest(),
            method = "POST",
            url = base_url + 'Usuarios/validar',
            frm = document.getElementById("frmLogin");

        //Metodo 1
        xhr.open(method, url, true);
        xhr.send(new FormData(frm));
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                var status = xhr.status;
                if (status === 0 || (status >= 200 && status < 400)) {
                    const res = JSON.parse(xhr.responseText);
                    console.log(xhr.responseText);
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

        //Metodo2
        // const url = base_url + 'Usuarios/validar';
        // const frm = document.getElementById("frmLogin");
        // const xhr = new XMLHttpRequest();
        // xhr.open("POST", url, true );
        // xhr.send(new FormData(frm));
        // xhr.onreadystatechange = function(){
        //     if (xhr.readyState == 4 && xhr.status == 200) {
        //         console.log(xhr.responseText)
        //         const res = JSON.parse(xhr.responseText) ;
        //         if(res == "ok"){
        //         console.log(res, 'jello')
        //             window.location = base_url + "Usuarios/index";
        //         }else{
        //             document.getElementById("alerta").classList.remove("d-none")
        //             document.getElementById("alerta").innerHTML = res;
        //         }
        //     }
        // }








    }
}