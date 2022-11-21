var tablecontratos;

document.addEventListener("DOMContentLoaded",function(){
    tablecontratos=$('#tablecontratos').DataTable({
        "aProcessing":true,
        "aSeverSide":true,
        "language" :{
            "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url":" "+baseurl+"/Contratos/getcontratos",
            "dataSrc":""
        },
        "columns": [
            { "data": 'IdContratos' },
            { "data": 'file_name' },
            { "data": 'description' },
            { "data": 'size' },
            { "data": 'url' },
            { "data": 'date_file' },
            
            { "data": 'options' }
        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"desc"]]
    
    });


    var formcontratos= document.querySelector("#formcontratos");
    formcontratos.onsubmit=function(e){
        e.preventDefault();

         //VALIDACION
           var intidcontrato=document.querySelector("#idcontrato").value;
           var strnombre=document.querySelector("#txtnombre").value;
           var strdescripcion=document.querySelector("#txtdescripcion").value;
           var filearchivo=document.querySelector("#txtarchivo").value;
           var datefecha=document.querySelector("#txtfecha").value;

        if(strnombre =='' || strdescripcion =='' || filearchivo ==''){
            swal("Atención","Todos los campos son obligatorios.","error");
            return false;
        }

        //PREPARACION Y LLAMADO DE CONTROLADOR PARA INSERTAR DATOS.
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = baseurl+'/Contratos/setcontratos';

        var formdata=new FormData(formcontratos);

        request.open("POST",ajaxUrl,true);
        request.send(formdata);
        
        request.onreadystatechange =function(){
            if(request.readyState == 4 && request.status==200){
                console.log(request.responseText);
                var obdata=JSON.parse(request.responseText);
                console.log(obdata);
                if(obdata.status){
                    $('#modalformcontratos').modal("hide");
                    formcontratos.reset();
                    swal("Se agrego correctamente", obdata.msg ,"success");
                    tablecontratos.ajax.reload(function(){
                        fntdelcontratos();
                    });
                   
                } else{
                    swal("Error",obdata.msg,"error");
                }
            }
        }
    }

},false);

$('#tablecontratos').DataTable();
function openmodal(){
    document.querySelector('#idcontrato').value="";
    document.querySelector('#titlemodal').innerHTML = "Agregar Contrato";
    document.querySelector('.modal-header').classList.replace("headerupdate","headerregister");
    document.querySelector('#btnactionform').classList.replace("btn-info","btn-primary");
    document.querySelector('#btntext').innerHTML="Guardar";
    document.querySelector('#formcontratos').reset();
    $('#modalformcontratos').modal("show");
};

function fntdelcontratos(){
    var btndelcontratos = document.querySelectorAll(".btndelcontratos")
    btndelcontratos.forEach(function(btndelcontratos){
        btndelcontratos.addEventListener("click",function(){
            var idcontrato = this.getAttribute("rl");
            swal({
                title:"Eliminar registro de contrato",
                text: "¿Realmente Quiere este registro?",
                type:"warning",
                showCancelButton:true,
                confirmButtonText: "Si, Eliminar",
                cancelButtonText: "No, Cancelar",
                closeOnConfirm:false,
                closeOnCancel:true
            },function(isConfirm){
                if(isConfirm){
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = baseurl+'/Contratos/delcontrato/';
                var strdata = "idcontrato="+idcontrato ;
                request.open("POST",ajaxUrl,true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(strdata);
                request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status==200){
                            //console.log(request.responseText);
                            var objdata=JSON.parse(request.responseText);
                            if(objdata.status){
                                swal("Eliminar!",objdata.msg,"success");
                                tablecontratos.ajax.reload(function(){
                                    //fntdelcontratos();
                                });

                            }else{
                                swal("Error",objdata.msg,"error");
                            }
                        }
                    }
                }

            });
        });
    });
}
