<?php
//Moises
class RegistrarseModel extends Mysql
{
    public $intidusuario;
    public $intci;
    public $strnombre;
    public $strapellido;
    public $strcorreo;
    public $strdireccion;
    public $inttelefono;
    public $strcontrasenia;
    public $intstatus;
    public $intidrol;
    public $intnit;
    public $strnombretr;

    public function __construct()
    {
        parent::__construct();
    }

    public function registrarCliente(int $ci,string $nombre,string $apellido,string $email,string $direccion,int $telefono,string $password) {
        $return = 0;
        $this->intci = $ci;
        $this->strnombre = $nombre;
        $this->strapellido = $apellido;
        $this->strcorreo = $email;
        $this->strdireccion = $direccion;
        $this->inttelefono = $telefono;
        $this->strcontrasenia = $password;
        $this->intstatus = 1;
        $this->intidrol = 2;

        $sql = "SELECT * FROM tusuarios WHERE Correo = '{$this->strcorreo}' or ci = '{$this->intci}' ";
        $request = $this->selectall($sql);

        if (empty($request)) {
            $query  = "INSERT INTO tusuarios(IdRoles,ci,Nit,Nombre,NombreFiscal,Apellido,Telefono,Correo,Direccion,Contrasenia,Estado, Token) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
            $arrdata = array(
                $this->intidrol,
                $this->intci,
                $this->intci,
                $this->strnombre,
                $this->strapellido,
                $this->strapellido,
                $this->inttelefono,
                $this->strcorreo,
                $this->strdireccion,
                $this->strcontrasenia,
                $this->intstatus,
                null
            );
            $request = $this->insert($query, $arrdata);
            $return = $request;
        } else {
            $return = -1;
        }
        return $return;
    }
}
