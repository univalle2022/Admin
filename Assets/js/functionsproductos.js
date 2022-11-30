var tableproductos;

document.addEventListener("DOMContentLoaded",function(){
    tableproductos=$('#tableproductos').DataTable({
        "aProcessing":true,
        "aSeverSide":true,
        "language" :{
            "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url":" "+baseurl+"/Productos/getproductos",
            "dataSrc":""
        },
        "columns": [
            { "data": 'IdProducto' },
            { "data": 'Tipo' },
            { "data": 'Nombre' },
            { "data": 'Precio' },
            { "data": 'Cantidad' },
            { "data": 'foto' },
            { "data": 'Descripcion' },
            { "data": 'Estado' },
            { "data": 'options' }
        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"desc"]]

    });

    var formproducts= document.querySelector("#formproducts");
    formproducts.onsubmit=function(e){
        e.preventDefault();

         
           var intidcategoria=document.querySelector("#txtcategoria").value;
           var intidoferta=document.querySelector("#txtoferta").value;
           var strproducto=document.querySelector("#txtnombre").value;
           var intprecio=document.querySelector("#txtprecio").value;
           var intcantidad=document.querySelector("#txtcantidad").value;
           var strfoto=document.querySelector("#txtimagen").value;
           var strdescripcion=document.querySelector("#txtdescripcion").value;
           var intstatus=document.querySelector("#liststatus").value;

        if(intidcategoria =='' || intidoferta =='' || strproducto =='' || intprecio =='' || intcantidad =='' || strdescripcion ==''){
            swal("Atención","Todos los campos son obligatorios.","error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = baseurl+'/Productos/setproductos';
      
        var formdata=new FormData(formproducts);

        request.open("POST",ajaxUrl,true);
        request.send(formdata);
        
        request.onreadystatechange =function(){
            if(request.readyState == 4 && request.status==200){
                console.log(request.responseText);
                var obdata=JSON.parse(request.responseText);
                console.log(obdata);
                if(obdata.status){
                    $('#modalformproducts').modal("hide");
                    formproducts.reset();
                    swal("Producto Modificado", obdata.msg ,"success");
                    tableproductos.ajax.reload(function(){
                        //fnteditrol();
                        //fntdelrol();
                        //fntpermisosrol();
                    });
                   
                } else{
                    swal("Error",obdata.msg,"error");
                }
            }
        }
    }
    
},false);

$('#tableproductos').DataTable();
function openmodal(){
     document.querySelector('#idproducto').value="";
    document.querySelector('#titlemodal').innerHTML = "Nuevo Producto";
    document.querySelector('.modal-header').classList.replace("headerupdate","headerregister");
    document.querySelector('#btnactionform').classList.replace("btn-info","btn-primary");
    document.querySelector('#btntext').innerHTML="Guardar";
    document.querySelector('#formproducts').reset();
    $('#modalformproducts').modal("show");
    
}

window.addEventListener('load',function(){
    fntcategoriasproductos();
    fnteditproducto();
},false)

function fntcategoriasproductos(){
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = baseurl+'/Productos/getselectcategorias';
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange =function(){
            if(request.readyState == 4 && request.status==200){
             
                document.querySelector('#txtcategoria').innerHTML= request.responseText;
                document.querySelector('#txtcategoria').value=1;
                $('#txtcategoria').selectpicker('render');
            }
        }
        
}


function fnteditproducto(){
    var btneditproducto=Array.apply(null, document.querySelectorAll(".btneditproducto"));
 
    
    btneditproducto.forEach(function(btneditproducto){
        
        btneditproducto.addEventListener("click",function(){
            //alert("Click to close...");
            document.querySelector('#titlemodal').innerHTML = "Actualizar Producto";
            document.querySelector('.modal-header').classList.replace("headerregister","headerupdate");
            document.querySelector('#btnactionform').classList.replace("btn-primary","btn-info");
            document.querySelector('#btntext').innerHTML="Actualizar";

            var idproducto = this.getAttribute("rl");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = baseurl+'/Productos/getproducto/'+idproducto;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange =function(){
                if(request.readyState == 4 && request.status==200){
                    //console.log(request.responseText);
                    var objdata=JSON.parse(request.responseText);
                    if(objdata.status){

                        document.querySelector("#idproducto").value=objdata.data.IdProducto;
                        document.querySelector("#txtnombre").value=objdata.data.Nombre;
                        document.querySelector("#txtcategoria").value=objdata.data.IdCategoria;
                        $('#txtcategoria').selectpicker('render');
                        

                        document.querySelector("#txtprecio").value=objdata.data.Precio;
                        document.querySelector("#txtcantidad").value=objdata.data.Cantidad;
                        document.querySelector("#txtoferta").value=objdata.data.IdOfertas;
                        document.querySelector("#txtdescripcion").value=objdata.data.Descripcion;
                        

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



                        $('#modalformproducts').modal("show");
                    }else{
                        swal("Error",objdata.msg,"error");
                    }
                }
            }
           
        });
    });
    
}



function fntdelproducto(){
    var btndelrol = document.querySelectorAll(".btndelproducto")
    btndelrol.forEach(function(btndelrol){
        btndelrol.addEventListener("click",function(){
            var idrol = this.getAttribute("rl");
            swal({
                title:"Eliminar Producto",
                text: "¿Realmente Quiere eliminar el Producto?",
                type:"warning",
                showCancelButton:true,
                confirmButtonText: "Si, Eliminar",
                cancelButtonText: "No, Cancelar",
                closeOnConfirm:false,
                closeOnCancel:true
            },function(isConfirm){
                if(isConfirm){
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = baseurl+'/Productos/delproducto/';
                var strdata = "idproducto="+idrol;
                request.open("POST",ajaxUrl,true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(strdata);
                request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status==200){
                            //console.log(request.responseText);
                            var objdata=JSON.parse(request.responseText);
                            if(objdata.status){
                                swal("Eliminar!",objdata.msg,"success");
                                tableproductos.ajax.reload(function(){
                                    //fnteditrol();
                                    //fntdelrol();
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


