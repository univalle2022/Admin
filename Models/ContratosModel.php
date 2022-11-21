<?php 

    class ContratosModel extends Mysql{

        public $intidcontratos;
        public $strfilename;
        public $strdescription;
        public $intsize;
        public $strurl;
        public $strdate;
        public $intidusuario;

        public function __construct() {

            parent::__construct();
        }
        //YO
        public function selectcontratos(){
            $sql= "SELECT * FROM tcontrato";
            $request=$this->selectall($sql);
            return $request;
        }

        public function insertofertas($strnombre_r, $strdescripcion_r, $filetamanio_r, $download_r, $datefecha_r){
            
            $return = 0;
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