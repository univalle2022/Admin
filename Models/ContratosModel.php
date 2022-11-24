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
        public $estado;

        public function __construct() {

            parent::__construct();
        }
        
        public function selectcontratos(){
            $sql= "SELECT
            t.IdContrato,
            tu.Nombre as Usuario,
            tc.Nombre as Cliente,
            t.Descripcion,
            t.FileName,
            t.FileSize,
            t.FileUrl,
            t.Fecha,
            t.Estado
        FROM
            tcontrato t,
            tusuarios tu,
            tusuarios tc
        WHERE
            t.IdUsuario = tu.IdUsuario AND 
            t.IdCliente = tc.IdUsuario";
            $request=$this->selectall($sql);
            return $request;
        }

        public function selectusuarios(){
            $sql= "SELECT * FROM tusuarios where IdRoles = 2 and Estado != 0";
            $request=$this->selectall($sql);
            return $request;
        }

        public function insertcontratos($idusuario_r, $idcliente_r, $strdescripcion_r, $datefecha_r, $filename_r, $download_r, $filetamanio_r, $status){
            
            $return = 0;

            $this->intidusuarios=$idusuario_r;
            $this->intidclientes=$idcliente_r;
            $this->strdescripcion=$strdescripcion_r;
            $this->strdate=$datefecha_r;
            $this->strfilename=$filename_r;
            $this->strurl=$download_r;
            $this->intsize=$filetamanio_r;
            $this->estado=$status;

            $sql= "SELECT * FROM tcontrato where FileName = '{$this->strfilename}'";
            $requestinsert = $this->selectall($sql);

            if(empty($requestinsert)){

                $queryinsert="INSERT INTO tcontrato(IdUsuario, IdCliente, Descripcion, Fecha, FileName,  FileUrl, FileSize, Estado) VALUES (?,?,?,?,?,?,?,?)";
                $arrdata = array(
                    $this->intidusuarios,
                    $this->intidclientes,
                    $this->strdescripcion,
                    $this->strdate,
                    $this->strfilename,
                    $this->strurl,
                    $this->intsize,
                    $this->estado);
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
                $querydelete="UPDATE tcontrato SET Estado=? IdContrato = $this->intidcontratos";
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