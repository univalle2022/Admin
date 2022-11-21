<?php 

    class OfertasModel extends Mysql{

        public $intidofertas;
        public $intidproducto;
        public $intcantidad;
        public $strfecha;
        public $intporcentaje;
        public $intstatus;

        public function __construct() {

            parent::__construct();
        }
        //YO
        public function selectofertas(){
            $sql= "SELECT * FROM tofertas ";
            $request=$this->selectall($sql);
            return $request;
        }

        public function selectoferta(int $idoferta){
            $this->intidoferta= $idoferta;
            $sql="SELECT * FROM tofertas WHERE IdOfertas = $this->intidoferta";
            $request=$this->select($sql);
            return $request;
        }
        public function selectproductos(){
          
            $sql="SELECT * FROM tproductos WHERE Estado != 0";
            $request=$this->selectall($sql);
            return $request;
        }


        public function insertofertas($idproducto, $cantidad, $fecha, $porcentaje, $estado){
            
            $return = 0;
            $this->intidproducto=$idproducto;
            $this->intcantidad=$cantidad;
            $this->strfecha=$fecha;
            $this->intporcentaje=$porcentaje;
            $this->intstatus=$estado;


            $sql= "SELECT * FROM tofertas WHERE IdProducto ='{$this->intidproducto}'";
            $requestinsert = $this->selectall($sql);
            if(empty($requestinsert)){
                $queryinsert="INSERT INTO tofertas(IdProducto,Cantidad,Fecha,Porcentaje,Estado) VALUES (?,?,?,?,?)";
                $arrdata = array($this->intidproducto,$this->intcantidad,$this->strfecha,$this->intporcentaje,$this->intstatus);
                $requestinsert= $this->insert($queryinsert,$arrdata);
                $return = $requestinsert;
            }else{
                $return=-1;
            }
            return $return;

        }
    
        public function updateofertas($idofertas, $producto, $cantidad, $fecha, $porcentaje, $status){
            
            $this->intidofertas=$idofertas;
            $this->intidproducto=$producto;
            $this->intcantidad=$cantidad;
            $this->strfecha=$fecha;
            $this->intporcentaje=$porcentaje;
            $this->intstatus=$status;

            $sql= "SELECT * FROM tofertas WHERE IdProducto='$this->intidproducto' AND IdOfertas != $this->intidofertas";
            $requestupdate = $this->selectall($sql);
            
            if(empty($requestupdate)){
                $queryupdate="UPDATE tofertas SET IdProducto=?,Cantidad=?,Fecha=?,Porcentaje=?,Estado=? WHERE IdOfertas=$this->intidofertas";
                $arrdata = array($this->intidproducto,$this->intcantidad,$this->strfecha,$this->intporcentaje,$this->intstatus);
                $requestupdate= $this->update($queryupdate,$arrdata);
                $return=$requestupdate;
            }else{
                $return=-1;
            }
            
            return $return;

        }

        public function deleteofertas(int $idofertas_r){
            
            $this->intidofertas=$idofertas_r;
    
                $querydelete="UPDATE tofertas SET Estado=? WHERE IdOfertas  = $this->intidofertas";
                $arrdata = array(0);
                $requestdelete= $this->update($querydelete,$arrdata);

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