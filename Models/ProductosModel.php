<?php 

    class ProductosModel extends Mysql{

        public $intidproducto;
        public $intidcategoria;
        public $intidoferta;
        public $strproducto;
        public $intprecio;
        public $intcantidad;
        public $strfoto;
        public $strdescripcion;
        public $intstatus;

        public function __construct() {

            parent::__construct();
        }
        
        public function selectproductos(){
            $sql= "SELECT tp.IdProducto, tp.IdCategoria, tp.IdOfertas, tp.Nombre, tp.Precio, tp.Cantidad, tp.foto, tp.Descripcion, tp.Estado, tc.Tipo FROM tproductos tp, tcategorias tc WHERE tp.Estado != 0 AND tp.IdCategoria = tc.IdCategoria";
            $request=$this->selectall($sql);
            return $request;
        }

        public function insertproducto(int $categoria, int $oferta,string $producto,int $precio,int $cantidad, $foto,string $descripcion, int $status){
            
            $return = 0;
            $this->intidcategoria=$categoria;
            $this->intidoferta=$oferta;
            $this->strproducto=$producto;
            $this->intprecio=$precio;
            $this->intcantidad=$cantidad;
            $this->strfoto=$foto;
            $this->strdescripcion=$descripcion;
            $this->intstatus=$status;

            $sql= "SELECT * FROM tproductos WHERE Nombre='{$this->strproducto}'";
            $requestinsert = $this->selectall($sql);

            if(empty($requestinsert)){
                $queryinsert="INSERT INTO tproductos(IdCategoria, IdOfertas, Nombre, Precio, Cantidad, foto, Descripcion, Estado) VALUES (?,?,?,?,?,?,?,?)";
                $arrdata = array($this->intidcategoria,$this->intidoferta,$this->strproducto,$this->intprecio,$this->intcantidad,$this->strfoto,$this->strdescripcion,$this->intstatus);
                $requestinsert= $this->insert($queryinsert,$arrdata);
                $return = $requestinsert;
            }else{
                $return=-1;
            }
            return $return;

        }

        public function updateproducto(int $idproducto ,int $categoria, int $oferta,string $producto,int $precio,int $cantidad, $foto,string $descripcion, int $status){
            
            $this->intidproducto=$idproducto;
            $this->intidcategoria=$categoria;
            $this->intidoferta=$oferta;
            $this->strproducto=$producto;
            $this->intprecio=$precio;
            $this->intcantidad=$cantidad;
            $this->strfoto=$foto;
            $this->strdescripcion=$descripcion;
            $this->intstatus=$status;

            $sql= "SELECT * FROM tproductos WHERE Nombre='$this->strproducto' AND IdProducto != $this->intidproducto";
            $requestupdate = $this->selectall($sql);
            
            if(empty($requestupdate)){
                if($this->strfoto == ''){
                    $queryupdate="UPDATE tproductos SET IdCategoria=?,IdOfertas=?,Nombre=? ,Precio=? ,Cantidad=?,Descripcion=?,Estado=? WHERE IdProducto=$this->intidproducto";
                    $arrdata = array($this->intidcategoria,$this->intidoferta,$this->strproducto,$this->intprecio,$this->intcantidad,$this->strdescripcion,$this->intstatus);
                   
                }else{
                    $queryupdate="UPDATE tproductos SET IdCategoria=?,IdOfertas=?,Nombre=? ,Precio=? ,Cantidad=?,foto=?,Descripcion=?,Estado=? WHERE IdProducto=$this->intidproducto";
                    $arrdata = array($this->intidcategoria,$this->intidoferta,$this->strproducto,$this->intprecio,$this->intcantidad,$this->strfoto,$this->strdescripcion,$this->intstatus);
                }

                $requestupdate= $this->update($queryupdate,$arrdata);
                $return=$requestupdate;
                
            }else{
                $return=-1;
            }
            
            return $return;

        }

        public function deleteproducto(int $idproducto){
            
            $this->intidproducto=$idproducto;
    

            //$sql= "SELECT * FROM tusuarios WHERE IdRoles=$this->intidrol";
            //$requestdelete = $this->selectall($sql);
            
            //if(empty($requestdelete)){
                $querydelete="UPDATE tproductos SET Estado=? WHERE IdProducto = $this->intidproducto";
                $arrdata = array(0);
                $requestdelete= $this->update($querydelete,$arrdata);

                //$querydelete="DELETE FROM rol  WHERE idrol = $this->intidrol";
                //$arrdata = array(0);
                //$requestdelete= $this->delete($querydelete,$arrdata);

                if($requestdelete){
                    $requestdelete='ok';
                    $return=$requestdelete;
                }else{
                    $request='error';
                    $return=$request;
                }
                
            //}else{
               // $return='existe';
            //}
            
            return $return;

        }

        public function selectproducto(int $idproducto){
            $this->intidproducto= $idproducto;
            $sql= "SELECT * FROM tproductos tp, tcategorias tc WHERE tp.IdCategoria = tc.IdCategoria AND tp.IdProducto = $this->intidproducto";
            $request=$this->select($sql);
            return $request;
        }

        public function selectcategorias(){
          
            $sql="SELECT * FROM tcategorias WHERE Estado != 0";
            $request=$this->selectall($sql);
            return $request;
        }

     

    }

?>