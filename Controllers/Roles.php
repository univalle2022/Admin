<?php 
    class Roles extends Controllers{
        public function __construct() {
            parent::__construct();
            session_start();
            if(empty($_SESSION['login'])){
                header('Location: '.base_url()."/login");
            }
            getpermisos(6);
        }
        public function roles(){

            $data['page_id'] = 3;
            $data['page_tag'] = "Roles Usuario";
            $data['page_title']= "Roles Usuario <small>Tienda Virtual</small>";
            $data['page_name'] = "RolesAdmin";
            $data['page_js'] = "functionsroles.js";
            $data['page_content'] = "Lorem Ipsum is simply dumamy text; aute irure dolor in reprehenderit."; 
            $this->views->getview($this,"roles",$data);
        }

        public function getroles(){
            $arrdata= $this->model->selectroles();
            
            for($i=0;$i< count($arrdata);$i++){
                if($arrdata[$i]['Estado']==1){
                    $arrdata[$i]['Estado']='<span class="badge badge-pill badge-success">Activo</span>';
                }else{
                    $arrdata[$i]['Estado']='<span class="badge badge-pill badge-danger">Inactivo</span>';
                }
                $arrdata[$i]['options']= '<div class="text-center">
                <button class="btn btn-secondary btn-sm btnpermisostyle btnpermisorol" rl="'.$arrdata[$i]['IdRoles'].'" title="Permisos" type="button"><i class="fas fa-key"></i></button>
                <button class="btn btn-primary btn-sm btneditstyle btneditrol" rl="'.$arrdata[$i]['IdRoles'].'" title="Editar" type="button"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btndelstyle btndelrol" rl="'.$arrdata[$i]['IdRoles'].'" title="Eliminar" type="button"><i class="fas fa-trash-alt"></i></button>
                
             
                </div>';

                if(count($arrdata)-1 == $i){
                    $arrdata[$i]['options']= '<div class="text-center">
                    <button class="btn btn-secondary btn-sm btnpermisostyle btnpermisorol" rl="'.$arrdata[$i]['IdRoles'].'" title="Permisos" type="button"><i class="fas fa-key"></i></button>
                    <button class="btn btn-primary btn-sm btneditstyle btneditrol" rl="'.$arrdata[$i]['IdRoles'].'" title="Editar" type="button"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm btndelstyle btndelrol" rl="'.$arrdata[$i]['IdRoles'].'" title="Eliminar" type="button"><i class="fas fa-trash-alt"></i></button>
                    
                    <script type="text/javascript"> fnteditrol();fntdelrol(); fntpermisosrol(); </script>
                    </div>'; 
                }

            }

            
            //<span class="badge badge-pill badge-success">Success</span>
            echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function setroles(){
           //dep($_POST);
           $intidrol=intval($_POST['idrol']);
           $strrol=strclean($_POST['txtnombre']);
           $strdescripcion=strclean($_POST['txtdescripcion']);
           $intstatus=intval($_POST['liststatus']);
           

           if($intidrol == 0){
                $requestrol=$this->model->insertrol($strrol,$strdescripcion,$intstatus);
                $option=1;
           }
           if($intidrol != 0){
                $requestrol=$this->model->updaterol( $intidrol,$strrol,$strdescripcion,$intstatus);
                $option=2;
           }

           if($requestrol > 0){

                if($option == 1 ){
                    $arrresponse= array('status'=>true,'msg'=>'Datos Guardados Correctamente');
                }
                if($option == 2 ){
                    $arrresponse= array('status'=>true,'msg'=>'Datos Actualizados Correctamente');
                }
                
           }else{
                if($requestrol == -1){
                    $arrresponse= array('status'=>false,'msg'=>'!Atencion! El rol ya existe');
                }else
                $arrresponse= array('status'=>true,'msg'=>'No se almaceno los datos');
           }
           
           
           echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
           die();
           
        }

        public function getrol($idrol){
            //dep($_POST);
            $intidrol=intval(strclean($idrol));

            if ($intidrol>0){
                $arrdata = $this->model->selectrol($intidrol);
                if(empty($arrdata)){
                    $arrresponse= array('status'=>false,'msg'=>'Datos no encontrados');
                }else{
                    $arrresponse= array('status'=>true,'data'=>$arrdata);
                }
                echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }
            die();
         }

         public function delrol(){
            if($_POST){
                $intidrol=intval($_POST['idrol']);
                $requestdelete=$this->model->deleterol($intidrol);
                if($requestdelete == 'ok'){
                    $arrresponse= array('status'=>true,'msg'=>'Datos Eliminados Correctamente'.$requestdelete);
                
                }else{
                    if($requestdelete == 'existe'){
                        $arrresponse= array('status'=>false,'msg'=>'No es Posible Eliminar un rol asociado a un usuario'.$requestdelete);
                    }else
                        $arrresponse= array('status'=>true,'msg'=>'No se elimino los datos'.$requestdelete);
               }
               echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }
            die();
         }


    }
?>