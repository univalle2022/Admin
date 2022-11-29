document.addEventListener("DOMContentLoaded", function () {

    var formusuarios = document.querySelector("#formclientes");

    formusuarios.onsubmit = function (e) {
        e.preventDefault();
        var strnombre = document.querySelector("#txtnombre").value;
        var strdireccion = document.querySelector("#txtapellido").value;
        var inttelefono = document.querySelector("#txttelefono").value;
        var intci = document.querySelector("#txtci").value;
        var strapellido = document.querySelector("#txtdireccion").value;
        var strcorreo = document.querySelector("#txtcorreo").value;
        var strcontrasenia = document.querySelector("#txtcontrasenia").value;

        if (
            strnombre == '' ||
            strdireccion == '' ||
            inttelefono == '' ||
            intci == '' ||
            strapellido == '' ||
            strcorreo == '' ||
            strcontrasenia == '') {
            swal("Atención", "Los campos con (*) son obligatorios.", "error");
            return false;
        }

        console.log(strnombre);
        console.log(strdireccion);
        console.log(inttelefono);
        console.log(intci);
        console.log(strapellido);
        console.log(strcorreo);
        console.log(strcontrasenia);

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = baseurl + '/Registrarse/setregistrarse';
        var formdata = new FormData(formusuarios);
        request.open("POST", ajaxUrl, true);
        request.send(formdata);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var obdata = JSON.parse(request.responseText);
                if (obdata.status) {
                    formusuarios.reset();
                    swal("", obdata.msg, "success");
                } else {
                    swal("Error", obdata.msg, "error");
                }
            }
        }
    }
}, false);
