var tablecontratos;

document.addEventListener("DOMContentLoaded", function () {
    tablecontratos = $('#tablecontratos').DataTable({
        "aProcessing": true,
        "aSeverSide": true,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax": {
            "url": " " + baseurl + "/Contratos/getcontratos",
            "dataSrc": ""
        },
        "columns": [
            { "data": 'IdContrato' },
            // { "data": 'IdUsuario' },
            { "data": 'Usuario' },
            // { "data": 'IdCliente' },
            { "data": 'Cliente' },
            { "data": 'Descripcion' },
            { "data": 'FileName' },
            { "data": 'FileSize' },
            { "data": 'FileUrl' },
            { "data": 'Fecha' },
            { "data": 'Estado' },
            { "data": 'options' }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });


    var formcontratos = document.querySelector("#formcontratos");
    formcontratos.onsubmit = function (e) {
        e.preventDefault();

        //VALIDACION
        var intidcontrato = document.querySelector("#idcontrato").value;
        var intidusuario = document.querySelector("#idusuario").value;
        var intidcliente = document.querySelector("#idcliente").value;
        var strdescripcion = document.querySelector("#txtdescripcion").value;
        var datefecha = document.querySelector("#txtfecha").value;
        var intstatus = document.querySelector("#liststatus").value;
        var filearchivo = document.querySelector("#txtarchivo").value;

        if (intidcliente == '' || strdescripcion == '' || datefecha == '' || filearchivo == null) {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        //PREPARACION Y LLAMADO DE CONTROLADOR PARA INSERTAR DATOS.
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = baseurl + '/Contratos/setcontratos';

        var formdata = new FormData(formcontratos);

        request.open("POST", ajaxUrl, true);
        request.send(formdata);

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                console.log(request.responseText);
                var obdata = JSON.parse(request.responseText);
                console.log(obdata);
                if (obdata.status) {
                    $('#modalformcontratos').modal("hide");
                    formcontratos.reset();
                    swal("Se agrego correctamente", obdata.msg, "success");
                    tablecontratos.ajax.reload(function () {
                        //fntdelcontratos();
                        //fntusuariocontrato();
                    });

                } else {
                    swal("Error", obdata.msg, "error");
                }
            }
        }
    }

}, false);


//
$('#txtcliente').on('input', function () {
    // clearTimeout(this.delay);
    // this.delay = setTimeout(function () {
    //     $(this).trigger('search');
    // }.bind(this), 300);

}).on('search', function () {
    if (this.value) {
        document.getElementById('txtcarnet').value = this.value;
        fntEncontrar(this.value);
    }
});



function fntEncontrar(variable) {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxurl = baseurl + '/Clientes/getClienteSearch';
    request.open("POST", ajaxurl, true);
    request.send(variable);
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objdata = JSON.parse(request.responseText);

            if (objdata.status) {
                var estadoUsuario = objdata.data.Estado == 1 ?
                    '<span class="badge badge-success">Activo</span>' :
                    '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celIdentificacion").innerHTML = objdata.data.ci;
                document.querySelector("#celNit").innerHTML = objdata.data.Nit;
                document.querySelector("#celNombre").innerHTML = objdata.data.Nombre;
                document.querySelector("#celNombrefiscal").innerHTML = objdata.data.NombreFiscal;
                document.querySelector("#celApellido").innerHTML = objdata.data.Apellido;
                document.querySelector("#celTelefono").innerHTML = objdata.data.Telefono;
                document.querySelector("#celEmail").innerHTML = objdata.data.Correo;
                document.querySelector("#celDireccion").innerHTML = objdata.data.Direccion;
                document.querySelector("#celEstado").innerHTML = estadoUsuario;

                $('#modalviewuser').modal('show');
            } else {
                swal("Error", objdata.msg, "error");
            }
        }
    }
}

//BUSCA USUASRIO
/*document.querySelector('#txtcliente').addEventListener('change', function (e) {
    e.preventDefault();
    let valor = document.querySelector('#txtcliente').value;
    alert('--> '+ valor);
});*/

function fntusuariocontrato() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = baseurl + '/Contratos/getselectusuarios';
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#idcliente').innerHTML = request.responseText;
            document.querySelector('#idcliente').value = 1;
            $('#idcliente').selectpicker('render');
        }
    }
}

window.addEventListener('load', function () {
    fnteditcontrato();
    fntdelcontrato();
    fntusuariocontrato();
}, false)


$('#tablecontratos').DataTable();
function openmodal() {
    document.querySelector('#idcontrato').value = "";
    document.querySelector('#titlemodal').innerHTML = "Agregar Contrato";
    document.querySelector('.modal-header').classList.replace("headerupdate", "headerregister");
    document.querySelector('#btnactionform').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btntext').innerHTML = "Guardar";
    document.querySelector('#formcontratos').reset();
    $('#modalformcontratos').modal("show");
};



function fnteditcontrato(){
    var btneditcontratos=Array.apply(null, document.querySelectorAll(".btneditcontratos"));
    btneditcontratos.forEach(function(btneditcontratos){        
        btneditcontratos.addEventListener("click",function(){
            //alert("Click to close...");
            document.querySelector('#titlemodal').innerHTML = "Actualizar Usuario";
            document.querySelector('.modal-header').classList.replace("headerregister","headerupdate");
            document.querySelector('#btnactionform').classList.replace("btn-primary","btn-info");
            document.querySelector('#btntext').innerHTML="Actualizar";

            var idproducto = this.getAttribute("rl");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = baseurl+'/Usuarios/getusuario/'+idproducto;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange =function(){
                if(request.readyState == 4 && request.status==200){
                    console.log(request.responseText);
                    var objdata=JSON.parse(request.responseText);
                    if(objdata.status){

                        
                        document.querySelector("#idusuario").value=objdata.data.IdUsuario;
                        document.querySelector("#txtnombre").value=objdata.data.Nombre;
                        document.querySelector("#txtapellido").value=objdata.data.Apellido;
                        document.querySelector("#txtcorreo").value=objdata.data.Correo;
                        //document.querySelector("#txtcontrasenia").value=objdata.data.Contrasenia;

                        
                        document.querySelector("#txtrol").value=objdata.data.IdRoles;
                        $('#txtrol').selectpicker('render');
                        


                        if(objdata.data.Estado == 1){
                            var optionselect = '<option value="1" selected class="notblock">Activo</option>';
                        }else{
                            var optionselect = '<option value="2" selected class="notblock">Inactivo</option>';
                        }
                        var htmlselect=`${optionselect} 
                                        <option value="1">Activo</option> 
                                        <option value="2">Inactivo</option>
                                        `;
                        document.querySelector("#liststatus").innerHTML = htmlselect;



                        $('#modalformusuario').modal("show");
                    }else{
                        swal("Error",objdata.msg,"error");
                    }
                }
            }
           
        });
    });    
}

function fntdelcontrato() {
    var btndelcontratos = document.querySelectorAll(".btndelcontratos")
    btndelcontratos.forEach(function (btndelcontratos) {
        btndelcontratos.addEventListener("click", function () {
            var idcontrato = this.getAttribute("rl");
            swal({
                title: "Eliminar registro de contrato",
                text: "¿Realmente Quiere este registro?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, Eliminar",
                cancelButtonText: "No, Cancelar",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = baseurl + '/Contratos/delcontrato/';
                    var strdata = "idcontrato=" + idcontrato;
                    request.open("POST", ajaxUrl, true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strdata);
                    request.onreadystatechange = function () {
                        if (request.readyState == 4 && request.status == 200) {
                            //console.log(request.responseText);
                            var objdata = JSON.parse(request.responseText);
                            if (objdata.status) {
                                swal("Eliminar!", objdata.msg, "success");
                                tablecontratos.ajax.reload(function () {
                                    //fntdelcontratos();
                                });

                            } else {
                                swal("Error", objdata.msg, "error");
                            }
                        }
                    }
                }

            });
        });
    });
}
