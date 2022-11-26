<?php
//Moises
class UsuariosModel extends Mysql
{

    public $intidusuario;
    public $intidrol;
    public $strnombre;
    public $strapellido;
    public $strcorreo;
    public $strcontrasenia;
    public $intstatus;
    public $inttelefono;
    public $intci;
    public $strdireccion;
    public $intnit;
    public $strnombretr;


    public function __construct()
    {

        parent::__construct();
    }
    //YO
    public function selectusuarios()
    {
        $sql = "SELECT tu.IdUsuario, tu.IdRoles, tu.Nombre, tu.Apellido, tu.Correo, tu.Contrasenia, tu.Estado, tr.Tipo 
            FROM tusuarios tu, troles tr 
            WHERE tu.Estado != 0 AND tu.IdRoles = tr.IdRoles AND tr.Estado != 0";
        $request = $this->selectall($sql);
        return $request;
    }

    public function insertusuario(int $rol, string $nombre, string $apellido, string $correo, string $constrasenia, int $status)
    {

        $return = 0;
        $this->intidrol = $rol;
        $this->strnombre = $nombre;
        $this->strapellido = $apellido;
        $this->strcorreo = $correo;
        $this->strcontrasenia = $constrasenia;
        $this->intstatus = $status;


        $sql = "SELECT * FROM tusuarios WHERE Nombre='{$this->strnombre}' AND Apellido='{$this->strapellido}'";

        $requestinsert = $this->selectall($sql);

        if (empty($requestinsert)) {
            $queryinsert = "INSERT INTO tusuarios(IdRoles,Nombre, Apellido, Correo, Contrasenia, Estado) VALUES (?,?,?,?,?,?)";
            $arrdata = array($this->intidrol, $this->strnombre, $this->strapellido, $this->strcorreo, $this->strcontrasenia, $this->intstatus);
            $requestinsert = $this->insert($queryinsert, $arrdata);
            $return = $requestinsert;
        } else {
            $return = -1;
        }
        return $return;
    }

    public function updateusuario(int $iduser, int $rol, string $nombre, string $apellido, string $correo, string $constrasenia, int $status)
    {

        $this->intidusuario = $iduser;
        $this->intidrol = $rol;
        $this->strnombre = $nombre;
        $this->strapellido = $apellido;
        $this->strcorreo = $correo;
        $this->strcontrasenia = $constrasenia;
        $this->intstatus = $status;

        $sql = "SELECT * FROM tusuarios WHERE Nombre='{$this->strnombre}' AND Apellido='{$this->strapellido}' AND IdUsuario != $this->intidusuario";
        $requestupdate = $this->selectall($sql);

        if (empty($requestupdate)) {

            if ($constrasenia == '') {

                $queryupdate = "UPDATE tusuarios SET IdRoles=?,Nombre=?,Apellido=? ,Correo=? ,Estado=? WHERE IdUsuario=$this->intidusuario";
                $arrdata = array($this->intidrol, $this->strnombre, $this->strapellido, $this->strcorreo, $this->intstatus);
            } else {
                $this->strcontrasenia = hash("SHA256", ($constrasenia));;
                $queryupdate = "UPDATE tusuarios SET IdRoles=?,Nombre=?,Apellido=? ,Correo=? ,Contrasenia=?,Estado=? WHERE IdUsuario=$this->intidusuario";
                $arrdata = array($this->intidrol, $this->strnombre, $this->strapellido, $this->strcorreo, $this->strcontrasenia, $this->intstatus);
            }



            $requestupdate = $this->update($queryupdate, $arrdata);
            $return = $requestupdate;
        } else {
            $return = -1;
        }

        return $return;
    }


    public function updateperfil(int $iduser, int $ci, string $nombre, string $apellido, int $telefono)
    {

        $this->intidusuario = $iduser;
        $this->intci = $ci;
        $this->strnombre = $nombre;
        $this->strapellido = $apellido;

        $this->inttelefono = $telefono;


        $sql = "SELECT * FROM tusuarios WHERE Nombre='{$this->strnombre}' AND Apellido='{$this->strapellido}' AND IdUsuario != $this->intidusuario";
        $requestupdate = $this->selectall($sql);

        if (empty($requestupdate)) {



            $queryupdate = "UPDATE tusuarios SET ci=?,  Nombre=?,Apellido=? ,Telefono=? WHERE IdUsuario=$this->intidusuario";
            $arrdata = array($this->intci, $this->strnombre, $this->strapellido, $this->inttelefono);



            $requestupdate = $this->update($queryupdate, $arrdata);
            $return = $requestupdate;
        } else {
            $return = -1;
        }

        return $return;
    }

    public function updatedatostr(int $iduser, int $nit, string $nombretr, string $direccion)
    {

        $this->intidusuario = $iduser;
        $this->intnit = $nit;
        $this->strnombretr = $nombretr;
        $this->strdireccion = $direccion;




        $sql = "SELECT * FROM tusuarios WHERE Nit='{$this->intnit}'AND IdUsuario != $this->intidusuario";
        $requestupdate = $this->selectall($sql);

        if (empty($requestupdate)) {

            $queryupdate = "UPDATE tusuarios SET Nit=?,  NombreFiscal=?,Direccion=? WHERE IdUsuario=$this->intidusuario";
            $arrdata = array($this->intnit, $this->strnombretr, $this->strdireccion);



            $requestupdate = $this->update($queryupdate, $arrdata);
            $return = $requestupdate;
        } else {
            $return = -1;
        }

        return $return;
    }


    /////////////////////////////////////////
    public function deleteusaurio(int $idusuarios)
    {

        $this->intidusuario = $idusuarios;

        $querydelete = "UPDATE tusuarios SET Estado=? WHERE IdUsuario = $this->intidusuario";
        $arrdata = array(0);
        $requestdelete = $this->update($querydelete, $arrdata);

        if ($requestdelete) {
            $requestdelete = 'ok';
            $return = $requestdelete;
        } else {
            $request = 'error';
            $return = $request;
        }
        return $return;
    }
    //
    public function deleterol(int $idrol)
    {

        $this->intidrol = $idrol;


        $sql = "SELECT * FROM tusuarios WHERE IdRoles=$this->intidrol";
        $requestdelete = $this->selectall($sql);

        if (empty($requestdelete)) {
            $querydelete = "UPDATE troles SET Estado=? WHERE IdRoles = $this->intidrol";
            $arrdata = array(0);
            $requestdelete = $this->update($querydelete, $arrdata);

            //$querydelete="DELETE FROM rol  WHERE idrol = $this->intidrol";
            //$arrdata = array(0);
            //$requestdelete= $this->delete($querydelete,$arrdata);

            if ($requestdelete) {
                $requestdelete = 'ok';
                $return = $requestdelete;
            } else {
                $request = 'error';
                $return = $request;
            }
        } else {
            $return = 'existe';
        }

        return $return;
    }

    public function selectusuario(int $iduser)
    {
        $this->intiduser = $iduser;
        $sql = "SELECT tu.IdUsuario, tu.IdRoles, tu.Nombre, tu.Apellido, tu.Correo, tu.Contrasenia, tu.Estado, tr.Tipo 
            FROM tusuarios tu, troles tr WHERE tu.IdRoles = tr.IdRoles AND tu.IdUsuario = $this->intiduser";
        $request = $this->select($sql);
        return $request;
    }

    public function selectroles()
    {

        $sql = "SELECT * FROM troles WHERE Estado != 0";
        $request = $this->selectall($sql);
        return $request;
    }
}
