<?php 

    class OfertasModel extends Mysql{

        public $intidofertas;
        public $intidproducto;
        public $intporcentaje;
        public $strfechaini;
        public $strfechafin;
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


        public function insertofertas($idproducto,  $porcentaje, $fechaini_r, $fechafin_r, $estado){
            
            $return = 0;
            $this->intidproducto=$idproducto;
            $this->intporcentaje=$porcentaje;
            $this->strfechaini=$fechaini_r;
            $this->strfechafin=$fechafin_r;
            $this->intstatus=$estado;


            $sql= "SELECT * FROM tofertas WHERE IdProducto ='{$this->intidproducto}'";
            $requestinsert = $this->selectall($sql);
            if(empty($requestinsert)){
                $queryinsert="INSERT INTO tofertas(IdProducto,Porcentaje,FechaInicio,FechaFinal,Estado) VALUES (?,?,?,?,?)";
                $arrdata = array($this->intidproducto,$this->intporcentaje,$this->strfechaini,$this->strfechafin,$this->intstatus);
                $requestinsert= $this->insert($queryinsert,$arrdata);
                $return = $requestinsert;
            }else{
                $return=-1;
            }
            return $return;

        }
    
        public function updateofertas($idofertas, $producto,  $porcentaje, $fechaini_r, $fechafin_r, $status){
            
            $this->intidofertas=$idofertas;
            $this->intidproducto=$producto;
            $this->intporcentaje=$porcentaje;
            $this->strfechaini=$fechaini_r;
            $this->strfechafin=$fechafin_r;
            $this->intstatus=$status;

            $sql= "SELECT * FROM tofertas WHERE IdProducto='$this->intidproducto' AND IdOfertas != $this->intidofertas";
            $requestupdate = $this->selectall($sql);
            
            if(empty($requestupdate)){
                $queryupdate="UPDATE tofertas SET IdProducto=?, Porcentaje=?, FechaInicio=?, FechaFinal=?, Estado=? WHERE IdOfertas=$this->intidofertas";
                $arrdata = array($this->intidproducto,$this->intporcentaje,$this->strfechaini,$this->strfechafin,$this->intstatus);
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