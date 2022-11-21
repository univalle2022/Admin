<?php 
    class Productos extends Controllers{
        public function __construct() {
            parent::__construct();
            session_start();
            if(empty($_SESSION['login'])){
                header('Location: '.base_url()."/login");
            }
            getpermisos(4);
        }
        public function productos(){

            $data['page_id'] = 4;
            $data['page_tag'] = "Productos";
            $data['page_title']= "Adminitracion de Productos <small>Tienda Virtual</small>";
            $data['page_name'] = "ProductosAdmin";
            $data['page_js'] = "functionsproductos.js";
            $data['page_content'] = "Lorem Ipsum is simply dumamy text; aute irure dolor in reprehenderit."; 
            $this->views->getview($this,"productos",$data);
        }

        public function getproductos(){
            $arrdata= $this->model->selectproductos();
            for($i=0;$i< count($arrdata);$i++){
                if($arrdata[$i]['Estado']==1){
                    $arrdata[$i]['Estado']='<span class="badge badge-pill badge-success">Activo</span>';
                }else{
                    $arrdata[$i]['Estado']='<span class="badge badge-pill badge-danger">Inactivo</span>';
                }
                $arrdata[$i]['options']= '<div class="text-center">

                <button class="btn btn-primary btn-sm btneditstyle btneditproducto" rl="'.$arrdata[$i]['IdProducto'].'" title="Editar" type="button"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btndelstyle btndelproducto" rl="'.$arrdata[$i]['IdProducto'].'" title="Eliminar" type="button"><i class="fas fa-trash-alt"></i></button>
                
                <script type="text/javascript"> fnteditproducto(); fntdelproducto();</script>
                </div>';

                $arrdata[$i]['foto']='<div class="text-center"><img src="Assets/Images/productos/'.$arrdata[$i]['foto'].'" height="40"></div>';

            }
            echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
            die();
        }

        

        public function setproductos(){
           //dep($_POST);
           
           if($_POST){
                if(empty($_POST['txtcategoria']) ||  empty($_POST['txtoferta']) ||  empty($_POST['txtnombre']) ||  empty($_POST['txtprecio']) ||  empty($_POST['txtcantidad']) ||  empty($_POST['txtdescripcion'])){
                    $arrresponse= array('status'=>false,'msg'=>'Datos Incorrectos');
                   
                }else{

                    $intidproducto=intval($_POST['idproducto']);
                    $intidcategoria=intval($_POST['txtcategoria']);
                    $intidoferta=intval($_POST['txtoferta']);
                    $strproducto=strclean($_POST['txtnombre']);
                    $intprecio=intval($_POST['txtprecio']);
                    $intcantidad=intval($_POST['txtcantidad']);
                    $strfoto=$_FILES['txtimagen']['name'];
                    $strdescripcion=strclean($_POST['txtdescripcion']);
                    $intstatus=intval($_POST['liststatus']);

                    
                    $temp=$_FILES['txtimagen']['tmp_name'];


                    if($intidproducto == 0){
                        $requestproducto=$this->model->insertproducto($intidcategoria,$intidoferta,$strproducto,$intprecio,$intcantidad,$strfoto,$strdescripcion,$intstatus);
                        $option=1;
                   }
                   if($intidproducto != 0){
                        $requestproducto=$this->model->updateproducto($intidproducto,$intidcategoria,$intidoferta,$strproducto,$intprecio,$intcantidad,$strfoto,$strdescripcion,$intstatus);
                        $option=2;
                   }

                    
                    if(!file_exists('Assets/Images/productos/'.$strfoto)){
                        move_uploaded_file($temp,'Assets/Images/productos/'.$strfoto);
                    }

                    if($requestproducto > 0){

                        if($option == 1 ){
                            $arrresponse= array('status'=>true,'msg'=>'Datos Guardados Correctamente');
                        }
                        if($option == 2 ){
                            $arrresponse= array('status'=>true,'msg'=>'Datos Actualizados Correctamente');
                        }
                        
                   }else{
                        if($requestproducto == -1){
                            $arrresponse= array('status'=>false,'msg'=>'!Atencion! El producto ya existe');
                        }else
                        $arrresponse= array('status'=>true,'msg'=>'No se almaceno los datos');
                   }
    
               }
               echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
           }
           
           die();
        }

        public function getproducto($idproducto){
            //dep($_POST);
            $intidproductos=intval(strclean($idproducto));

            if ($intidproductos>0){
                $arrdata = $this->model->selectproducto($intidproductos);
                if(empty($arrdata)){
                    $arrresponse= array('status'=>false,'msg'=>'Datos no encontrados');
                }else{
                    $arrresponse= array('status'=>true,'data'=>$arrdata);
                }
                echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }
            die();
         }

         public function delproducto(){
            if($_POST){
                $intidproducto=intval($_POST['idproducto']);
                $requestdelete=$this->model->deleteproducto($intidproducto);
                if($requestdelete == 'ok'){
                    $arrresponse= array('status'=>true,'msg'=>'Datos Eliminados Correctamente');
                
                }else{
                    if($requestdelete == 'existe'){
                        $arrresponse= array('status'=>false,'msg'=>'No es Posible Eliminar un rol asociado a un usuario');
                    }else
                        $arrresponse= array('status'=>true,'msg'=>'No se elimino los datos');
               }
               echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }
            die();
         }


         public function getselectcategorias(){

            $htmloptions="";
            $arrdata = $this->model->selectcategorias();
            if(count($arrdata) > 0){
                for($i=0;$i < count($arrdata); $i++){
                    $htmloptions.='<option value="'.$arrdata[$i]['IdCategoria'].'">'.$arrdata[$i]['Tipo'].'</option>';
                }
            }
            echo $htmloptions;
            die();

         }
         


    }
?>