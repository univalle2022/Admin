<?php 

    class ContratosModel extends Mysql{

        public $intidcontratos;
        public $intidusuarios;
        public $intidclientes;
        public $strdescription;
        public $strdate;
        public $strfilename;
        public $strurl;
        public $intsize;
        public $status;

        public function __construct() {

            parent::__construct();
        }
        //YO
        public function selectcontratos(){
            $sql= "SELECT * FROM tcontrato";
            $request=$this->selectall($sql);
            return $request;
        }
        public function selectusuarios(){
            $sql= "SELECT * FROM tusuarios where IdRoles = 2 and Estado != 0";
            $request=$this->selectall($sql);
            return $request;
        }

        public function insertofertas($idusuario_r, $idcliente_r, $strdescripcion_r, $datefecha_r, $filename_r, $download_r, $filetamanio_r, $filetamanio_r){
            
            $return = 0;
            $this->strintif=$strnombre_r;
            $this->strfilename=$strnombre_r;
            $this->strfilename=$strnombre_r;
            $this->strdescripcion=$strdescripcion_r;
            $this->intsize=$filetamanio_r;
            $this->strurl=$download_r;
            $this->strdate=$datefecha_r;
            //$this->intidusuario=$intidusuario_r;

            $sql= "SELECT * FROM tcontrato where file_name = '{$this->strfilename}'";
            $requestinsert = $this->selectall($sql);

            if(empty($requestinsert)){

                //Tipo de dato para fechas

                $queryinsert="INSERT INTO tcontrato(file_name, description, size, url, date_file) VALUES (?,?,?,?,?)";
                $arrdata = array($this->strfilename,$this->strdescripcion,$this->intsize,$this->strurl,$this->strdate);
                $requestinsert= $this->insert($queryinsert,$arrdata);
                $return = $requestinsert;
            }else{
                $return=-1;
            }
            return $return;

        }

        public function deletecontrato(int $idcontrato_r){
            
            $this->intidcontratos=$idcontrato_r;
            
            //if(empty($requestdelete)){
                $querydelete="DELETE from tcontrato WHERE IdContratos  = $this->intidcontratos";
                $arrdata = array(0);
                $requestdelete= $this->delete($querydelete,$arrdata);

                if($requestdelete){
                    $requestdelete='ok';
                    $return=$requestdelete;
                }else{
                    $request='error';
                    $return=$request;
                }

            return $return;

        }
    }

?>