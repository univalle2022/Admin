var objdatacat = '';
var objdata = '';
var request = '';
var ajaxUrl = '';

var nombrecategorias = [];

document.addEventListener("DOMContentLoaded", function () {
    request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    ajaxUrl = baseurl + '/Catalogo/getproductos';

    request.open("GET", ajaxUrl, true);
    request.send();


    var requestcat = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrlcat = baseurl + '/Catalogo/getcategorias';

    requestcat.open("GET", ajaxUrlcat, true);
    requestcat.send();

    request.onreadystatechange = function () {
        if (request.status == 200) {
            //console.log(request.responseText);
            request.onload = function () {
                objdata = JSON.parse(request.responseText);
                allcatalogoProductos();
            }

        }
    }

    //categorias

    requestcat.onreadystatechange = function () {
        if (requestcat.status == 200 && requestcat.readyState == 4) {
            //console.log(request.responseText);


            requestcat.onload = function () {
                objdatacat = JSON.parse(requestcat.responseText);
                var htmlcatalogos = '';

                for (var i = 0; i < objdatacat.length; i++) {
                    htmlcatalogos += `
                    <div class="form-check"><input title="checkcategoria" rl="${objdatacat[i].Tipo}" class="form-check-input checkcategoria" name="checkcategoria" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">${objdatacat[i].Tipo}</label></div>
                    
                `;
                }
                document.querySelector('.categoriaslist').innerHTML = htmlcatalogos;
                fntcheckcategoria();

            }

        }
    }

});

function allcatalogoProductos() {
    var htmlcatalogos = '';
    for (var i = 0; i < objdata.length; i++) {
        htmlcatalogos += `
        <div class="rounded bg-white mx-2 mb-3" style="width: 12rem">
            <div class="mt-2 mb-1 mr-2 ml-2">
                <div class="d-flex justify-content-between">
                    <span class="col-3"><i class="fas fa-heart"></i></span>`;
                    if (objdata[i].Porcentaje != null) {
                        htmlcatalogos += `<span class="col-3 badge badge-primary d-inline-flex p-2">${objdata[i].Porcentaje} %</span>`;
                    }
                    htmlcatalogos += `
                </div>
                <img class="card-img-to img-fluid" src="Assets/Images/productos/${objdata[i].foto}">
            </div>
            <div class="card-body text-center">
                <p class="card-title h5"><strong>${objdata[i].Nombre}</strong></p>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <p class="mt-2 h6">${objdata[i].Tipo}</p>
                <button onclick="openmodal();" rl="${objdata[i].IdProducto}" class="btn btn-sm btn-primary mt-2 btndetalle" type="button">Ver<i class="icon-basket ml-2"></i></button> 
            </div>
            </div>`;
    }
    document.querySelector('.catalogolist').innerHTML = htmlcatalogos;
    openmodal();
}




function filtrocategorias() {
    var htmlcatalogos = '';

    for (var i = 0; i < nombrecategorias.length; i++) {
        for (var j = 0; j < objdata.length; j++) {
            if (objdata[j].Tipo == nombrecategorias[i]) {
                htmlcatalogos += `
                <div class="rounded bg-white mx-2 mb-3" style="width: 12rem">
                <div class="mt-2 mb-1 mr-2 ml-2">
                    <div class="d-flex justify-content-between">
                        <span class="col-3"><i class="fas fa-heart"></i></span>`;
                if (objdata[j].Porcentaje != null) {
                    htmlcatalogos += `<span class="col-3 badge badge-primary d-inline-flex p-2">${objdata[j].Porcentaje} %</span>`;
                }
                htmlcatalogos += `   
                </div>
                    <img class="position-relative card-img-to img-fluid" src="Assets/Images/productos/${objdata[j].foto}">
                </div>
                <div class="card-body text-center">
                    <p class="card-title h5"><strong>${objdata[j].Nombre}</strong></p>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <p class="mt-2 h6">${objdata[j].Tipo}</p>
                    <button onclick="openmodal();" rl="${objdata[j].IdProducto}" class="btn btn-sm btn-primary mt-2 btndetalle" type="button">Ver<i class="icon-basket ml-2"></i></button> 
                </div>
                </div>`;
            }
        }
    }

    document.querySelector('.catalogolist').innerHTML = htmlcatalogos;
    openmodal();
}

function fntcheckcategoria() {
    var checkcategorias = document.querySelectorAll(".checkcategoria");

    checkcategorias.forEach(function (checkcategorias) {

        checkcategorias.addEventListener("click", function () {
            if (checkcategorias.checked == true) {
                let nombrecategoria = this.getAttribute("rl");
                nombrecategorias.push(nombrecategoria);
                filtrocategorias();

            }
            if (checkcategorias.checked == false) {
                nombrecategoria = this.getAttribute("rl");

                nombrecategorias = nombrecategorias.filter((item) => item !== nombrecategoria);

                filtrocategorias();
            }
            if (nombrecategorias.length == 0) {
                allcatalogoProductos();
            }

        });
    });
}

let IdProducto = 0;
let idpreciotalla = 0;
function openmodal() {

    var btndetalle = document.querySelectorAll(".btndetalle");
    var htmltallas = '';
    btndetalle.forEach(function (btndetalle) {

        btndetalle.addEventListener("click", function () {

            IdProducto = this.getAttribute("rl");
            //alert(IdProducto);
            var requestp = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrlp = baseurl + '/Catalogo/getproducto/' + IdProducto;
            requestp.open("GET", ajaxUrlp, true);
            requestp.send();
            //

            var requestt = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrlt = baseurl + '/Catalogo/gettallas/' + IdProducto;
            requestt.open("GET", ajaxUrlt, true);
            requestt.send();

            requestt.onreadystatechange = function () {

                if (requestt.readyState == 4 && requestt.status == 200) {
                    requestt.onload = function () {
                        var objdata = JSON.parse(requestt.responseText);
                        if (objdata != "") {
                            var checked = "checked";
                            var htmltallas = '';
                            objdata.forEach(element => {
                                htmltallas += `
                                    <label>
                                        <input ${checked} rl="${IdProducto}" type="radio" name="txttalla" id="txttalla" class="txttalla" value="${element["IdTalla"]}"> ${element["Nombre"]} &nbsp;
                                    </label>
                                    `;
                                checked = "";
                            });
                            document.querySelector(".txttallas").innerHTML = htmltallas;

                            document.querySelector(".buttoncarrito").innerHTML = `
                            <button  class="btn btn-primary btnaddcarrito" type="button">
                            <i class="icon-basket"></i> Añadir al carrito
                            </button>`;

                            gettallaradio();
                            fntaddcarrito();
                        } else {
                            htmltallas = `
                            <label>
                                No Disponible
                            </label>
                            `;
                            document.querySelector(".txttallas").innerHTML = htmltallas;
                            document.querySelector(".buttoncarrito").innerHTML = "";
                            document.querySelector(".preciotxt").innerHTML = `
                                No Disponible
                            `;
                        }



                    }

                }
            }



            requestp.onreadystatechange = function () {
                if (requestp.readyState == 4 && requestp.status == 200) {
                    requestp.onload = function () {
                        console.log(requestp.responseText);

                        var objdata = JSON.parse(requestp.responseText);
                        //alert(objdata.data.IdProducto);
                        var iduser = objdata.data.IdProducto;
                        document.querySelector(".nombreproducto").innerHTML = objdata.data.Nombre;

                        document.querySelector(".descripcionproducto").innerHTML = objdata.data.Descripcion;
                        document.querySelector(".descripcionproductoadd").innerHTML = objdata.data.Descripcion;
                    };

                }
            };

            $('#modalinfodetalles').modal("show");

        });

    });


}



function gettallaradio() {
    let idTalla = 0;
    var txttalla = Array.apply(null, document.querySelectorAll(".txttalla"));

    let precio = 0;
    let preciofinal = 0;
    let porcentaje = 0;


    let findselected = () => {

        idTalla = document.querySelector(".txttalla:checked").value;
        var requestp = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrlp = baseurl + '/Catalogo/getpreciotalla/' + IdProducto + '/' + idTalla;

        requestp.open("GET", ajaxUrlp, true);
        requestp.send();


        requestp.onreadystatechange = function () {

            if (requestp.readyState == 4 && requestp.status == 200) {
                console.log(requestp.responseText);
                objdata = JSON.parse(requestp.responseText);
                idpreciotalla = objdata.data.IdPrecioTalla;
                precio = objdata.data.Precio;

                if (objdata.data.Porcentaje != null) {
                    porcentaje = objdata.data.Porcentaje;
                    var porcentajefnal = (100 - porcentaje) / 100;
                    preciofinal = round(precio * porcentajefnal);

                    document.querySelector(".preciotxt").innerHTML = `
                        <h3 class="precioproducto"><del>${precio} Bs.</del> &nbsp;&nbsp; ${preciofinal} Bs.</h3>
                        
                        `;
                } else {
                    document.querySelector(".preciotxt").innerHTML = `
                        <h3 class="precioproducto">${precio} Bs.</h3>
                        `;
                }

            }
        };




    }

    txttalla.forEach(function (txttalla) {
        txttalla.addEventListener("change", findselected);

    });

    findselected();


}


function oferta(precio) {

    var requesto = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrlo = baseurl + '/Catalogo/getoferta/' + IdProducto;

    requesto.open("GET", ajaxUrlo, true);
    requesto.send();
    requesto.onload = function () {
        var objdatao = JSON.parse(requesto.responseText);
        if (objdatao != "") {
            var porcentaje = objdatao.Porcentaje;
            document.querySelector(".preciotxt").innerHTML = `
            <h3 class="precioproducto">${precio} Bs. ${porcentaje}</h3>
              
            `;
        }

    }
}


function fntaddcarrito() {
    var btnaddcarrito = document.querySelector(".btnaddcarrito");


    btnaddcarrito.addEventListener("click", function () {

        var requestp = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrlp = baseurl + '/Carrito/addcarrito/' + IdProducto + '/' + idpreciotalla;
        requestp.open("GET", ajaxUrlp, true);
        requestp.send();
        requestp.onreadystatechange = function () {
            if (requestp.readyState == 4 && requestp.status == 200) {
                //console.log(requestp.responseText);
                alert("Producto Añadido");
            }
        }
    });

}


function round(num) {
    var m = Number((Math.abs(num) * 100).toPrecision(15));
    return Math.round(m) / 100 * Math.sign(num);
}

