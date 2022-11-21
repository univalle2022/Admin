var tableofertas;

document.addEventListener("DOMContentLoaded",function(){
    tableofertas=$('#tableofertas').DataTable({
        "aProcessing":true,
        "aSeverSide":true,
        "language" :{
            "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url":" "+baseurl+"/Ofertas/getofertas",
            "dataSrc":""
        },
        "columns": [
            { "data": 'IdOfertas' },
            { "data": 'IdProducto' },
            { "data": 'Porcentaje' },
            { "data": 'FechaInicio' },
            { "data": 'FechaFinal' },
            { "data": 'Estado' },
            { "data": 'options' }
        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"desc"]]
    
    });

    var formofertas= document.querySelector("#formofertas");
    formofertas.onsubmit=function(e){
        e.preventDefault();

         //VALIDACION
           var intidoferta=document.querySelector("#idoferta").value;
           var intidproducto=document.querySelector("#txtproducto").value;
           var intporcentaje=document.querySelector("#txtporcentaje").value;
           var strfechaini=document.querySelector("#txtfechaini").value;
           var strfechafin=document.querySelector("#txtfechafin").value;
           var intstatus=document.querySelector("#liststatus").value;

        if(strfechaini =='' || strfechafin =='' || intporcentaje ==''){
            swal("Atención","Todos los campos son obligatorios.","error");
            return false;
        }

        //PREPARACION Y LLAMADO DE CONTROLADOR PARA INSERTAR DATOS.
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = baseurl+'/Ofertas/setofertas';

        var formdata=new FormData(formofertas);

        request.open("POST",ajaxUrl,true);
        request.send(formdata);
        
        request.onreadystatechange =function(){
            if(request.readyState == 4 && request.status==200){
                console.log(request.responseText);
                var obdata=JSON.parse(request.responseText);
                console.log(obdata);
                if(obdata.status){
                    $('#modalformofertas').modal("hide");
                    formofertas.reset();
                    swal("Oferta agregada", obdata.msg ,"success");
                    tableofertas.ajax.reload(function(){
                        fnteditofertas();
                        fntdelofertas();
                    });
                   
                } else{
                    swal("Error",obdata.msg,"error");
                }
            }
        }
    }


},false);

$('#tableofertas').DataTable();
function openmodal(){
    document.querySelector('#idoferta').value="";
    document.querySelector('#titlemodal').innerHTML = "Nueva Oferta";
    document.querySelector('.modal-header').classList.replace("headerupdate","headerregister");
    document.querySelector('#btnactionform').classList.replace("btn-info","btn-primary");
    document.querySelector('#btntext').innerHTML="Guardar";
    document.querySelector('#formofertas').reset();
    $('#modalformofertas').modal("show");
};

window.addEventListener('load',function(){
    fntproductosofertas();
    fnteditofertas();
    fntdelofertas();
},false)

function fntproductosofertas(){
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = baseurl+'/Ofertas/getselectproductos';
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange =function(){
            if(request.readyState == 4 && request.status==200){
             
                document.querySelector('#txtproducto').innerHTML = request.responseText;
                document.querySelector('#txtproducto').value = 1;
                $('#txtproducto').selectpicker('render');
            }
        }
        
}
function fnteditofertas(){
    var btneditofertas=Array.apply(null, document.querySelectorAll(".btneditofertas"));
 
    btneditofertas.forEach(function(btneditofertas){     
        btneditofertas.addEventListener("click",function(){
            document.querySelector('#titlemodal').innerHTML = "Actualizar Oferta";
            document.querySelector('.modal-header').classList.replace("headerregister","headerupdate");
            document.querySelector('#btnactionform').classList.replace("btn-primary","btn-info");
            document.querySelector('#btntext').innerHTML="Actualizar";

            var idofertas = this.getAttribute("rl");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = baseurl+'/Ofertas/getoferta/'+idofertas;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange =function(){
                if(request.readyState == 4 && request.status==200){
                    //console.log(request.responseText);
                    var objdata=JSON.parse(request.responseText);
                    if(objdata.status){ 
                        document.querySelector("#idoferta").value=objdata.data.IdOfertas;              
                        document.querySelector("#txtporcentaje").value=objdata.data.Porcentaje;
                        document.querySelector("#txtfechaini").value=objdata.data.FechaInicio;
                        document.querySelector("#txtfechafin").value=objdata.data.FechaFinal;
                        document.querySelector("#txtproducto").value=objdata.data.IdProducto;            
                        $('#txtproducto').selectpicker('render');   

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
                        $('#modalformofertas').modal("show");
                    }else{
                        swal("Error",objdata.msg,"error");
                    }
                }
            }
           
        });
    });
};
function fntdelofertas(){
    var btndelofertas = document.querySelectorAll(".btndelofertas")
    btndelofertas.forEach(function(btndelofertas){
        btndelofertas.addEventListener("click",function(){
            var idofertas = this.getAttribute("rl");
            swal({
                title:"Eliminar oferta ? ",
                text: "¿Realmente Quiere eliminar esta oferta?",
                type:"warning",
                showCancelButton:true,
                confirmButtonText: "Si, Eliminar",
                cancelButtonText: "No, Cancelar",
                closeOnConfirm:false,
                closeOnCancel:true
            },function(isConfirm){
                if(isConfirm){
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = baseurl+'/Ofertas/delofertas/';
                var strdata = "idofertas="+idofertas;
                request.open("POST",ajaxUrl,true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(strdata);
                request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status==200){
                            //console.log(request.responseText);
                            var objdata=JSON.parse(request.responseText);
                            if(objdata.status){
                                swal("Eliminar!",objdata.msg,"success");
                                tableofertas.ajax.reload(function(){
                                    //fnteditrol();
                                    //fntdelmateria();
                                    //fntpermisosrol();
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