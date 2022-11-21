<?php 
    class Contratos extends Controllers{
        public function __construct() {
            parent::__construct();
            session_start();
            if (empty($_SESSION['login'])) {
                header('Location: ' . base_url() . "/login");
            }
            getpermisos(11);
        }
        public function contratos(){

            $data['page_id'] = 5;
            $data['page_tag'] = "Contratos";
            $data['page_title']= "Contratos <small>Tienda Virtual</small>";
            $data['page_name'] = "ContratosAdmin";
            $data['page_js'] = "functionscontratos.js";
            $data['page_content'] = "Lorem Ipsum is simply dumamy text; aute irure dolor in reprehenderit."; 
            $this->views->getview($this,"contratos",$data);
        }

        public function getcontratos(){
            $arrdata= $this->model->selectcontratos();
            for($i=0;$i< count($arrdata);$i++){
                

                $arrdata[$i]['url']= '<div class="text-center">
                
                <a href="./Assets/archivos/contratos/'.$arrdata[$i]['url'].'" title="Descargar" target="_tapha">'.$arrdata[$i]['url'].'</a>

                </div>';

                $arrdata[$i]['options']= '<div class="text-center">

                
                <button class="btn btn-danger btn-sm btndelstyle btndelcontratos" rl="'.$arrdata[$i]['IdContratos'].'" title="Eliminar" type="button"><i class="fas fa-trash-alt"></i></button>
                <script type="text/javascript"> fntdelcontratos();</script>
                </div>';

            }
            echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function setcontratos(){
           //dep($_POST);
           $intidcontrato=intval($_POST['idcontrato']);
           $strnombre=strclean($_POST['txtnombre']);
           $strdescripcion=strclean($_POST['txtdescripcion']);
           
           $filetamanio=$_FILES['txtarchivo']['size'];
           $filename=$_FILES['txtarchivo']['name'];
           $temp=$_FILES['txtarchivo']['tmp_name'];

           $download=$filename;

           $datefecha=date("Y-m-d");
           //$intidusuario=intval($_SESSION['iduser']);
           
           

           if($intidcontrato == 0){
                $requestrol=$this->model->insertofertas($strnombre,$strdescripcion,$filetamanio, $download, $datefecha);
                $option=1;
           }
           if($intidcontrato != 0){

                //Muestra algun mensaje de error
                /*
                $requestrol=$this->model->updateofertas( $intidoferta,$intidproducto,$intcantidad, $strfecha, $intporcentaje, $intstatus);*/
                $option=2;
           }

           if(!file_exists('Assets/archivos/contratos/'.$filename)){
                move_uploaded_file($temp,'Assets/archivos/contratos/'.$filename);
           }

           if($requestrol > 0){

                if($option == 1 ){
                    $arrresponse= array('status'=>true,'msg'=>'Datos Guardados Correctamente');
                }
                if($option == 2 ){
                    $arrresponse= array('status'=>true,'msg'=>'Datos Repetidos');
                }
                
           }else{
                if($requestrol == -1){
                    $arrresponse= array('status'=>false,'msg'=>'!Atencion! Ya existe un contrato con este nombre');
                }else
                $arrresponse= array('status'=>true,'msg'=>'No se almaceno los datos');
           }
           
           
           echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
           die();
           
        }
         public function delcontrato(){
            if($_POST){
                $intidcontrato=intval($_POST['idcontrato']);
                $requestdelete=$this->model->deletecontrato($intidcontrato);
                if($requestdelete == 'ok'){
                    $arrresponse= array('status'=>true,'msg'=>'Datos Eliminados Correctamente'.$requestdelete);
                
                }else{
                    $arrresponse= array('status'=>true,'msg'=>'No se elimino los datos'.$requestdelete);
               }
               echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }
            die();
         } 
    }
?>