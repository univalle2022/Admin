<?php
class Contratos extends Controllers
{

    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . "/login");
        }
        getpermisos(12);
    }

    public function contratos()
    {
        $data['page_id'] = 5;
        $data['page_tag'] = "Contratos";
        $data['page_title'] = "Contratos <small>Tienda Virtual</small>";
        $data['page_name'] = "ContratosAdmin";
        $data['page_js'] = "functionscontratos.js";
        $data['page_content'] = "Lorem Ipsum is simply dumamy text; aute irure dolor in reprehenderit.";
        $this->views->getview($this, "contratos", $data);
    }

    public function getcontratos()
    {
        $arrdata = $this->model->selectcontratos();
        for ($i = 0; $i < count($arrdata); $i++) {

            $btndownload = '';
            $btnedit = '';
            $btndelete = '';
            $script = '';

            $btndownload = '<a href="' . $arrdata[$i]['FileUrl'] . '" class="btn btn-sm btn-warning"><i class="fa-solid fa-download"></i></a>';

            if ($arrdata[$i]['Estado'] == 1) {
                $arrdata[$i]['Estado'] = '<span class="badge badge-pill badge-success">Activo</span>';
            } else {
                $arrdata[$i]['Estado'] = '<span class="badge badge-pill badge-danger">Inactivo</span>';
            }

            if ($_SESSION['permisosmod']['u']) {
                $btnedit = '<button class="btn btn-primary btn-sm btneditstyle btneditcontratos" rl="' . $arrdata[$i]['IdContrato'] . '" title="Editar" type="button"><i class="fas fa-pencil-alt"></i></button>';
            }
            if ($_SESSION['permisosmod']['d']) {
                $btndelete = '<button class="btn btn-danger btn-sm btndelstyle btndelcontratos" rl="' . $arrdata[$i]['IdContrato'] . '" title="Eliminar" type="button"><i class="fas fa-trash-alt"></i></button>';
            }

            if ($i == (count($arrdata) - 1)) {
                $script = '<script type="text/javascript"> fnteditcontrato();fntdelcontrato();</script>';
            }

            $arrdata[$i]['options'] = '<div class="text-center">' . $btndownload . ' ' . $btnedit . ' ' . $btndelete . ' ' . $script . ' </div>';

            // $arrdata[$i]['options'] = '
            // <div class="text-center">
            //     <button class="btn btn-danger btn-sm btndelstyle btndelcontratos" rl="' . $arrdata[$i]['IdContrato'] . '" title="Eliminar" type="button"><i class="fas fa-trash-alt"></i></button>
            //     <script type="text/javascript"> fntdelcontratos();</script>
            // </div>';
        }
        echo json_encode($arrdata, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getselectusuarios()
    {
        $htmloptions = "";
        $arrdata = $this->model->selectusuarios();
        if (count($arrdata) > 0) {
            for ($i = 0; $i < count($arrdata); $i++) {
                $htmloptions .= '<option value="' . $arrdata[$i]['IdUsuario'] . '">' . $arrdata[$i]['Nombre'] . '</option>';
            }
        }
        echo $htmloptions;
        die();

    }

    public function setcontratos()
    {
        //dep($_POST);
        $intidcontrato = intval($_POST['idcontrato']);
        $intidusuario = intval($_POST['idusuario']);
        $intidcliente = intval($_POST['idcliente']);
        $strdescripcion = strclean($_POST['txtdescripcion']);
        $datefecha = $_POST['txtfecha'];

        $filename = $_FILES['txtarchivo']['name'];
        $fileurl = './Assets/archivos/contratos/'.$filename;
        $filetamanio = $_FILES['txtarchivo']['size'];
        $strstate = intval($_POST['liststatus']);

        $temp = $_FILES['txtarchivo']['tmp_name'];

        if ($intidcontrato == 0) {
            $requestrol = $this->model->insertcontratos($intidusuario, $intidcliente, $strdescripcion,$datefecha, $filename, $fileurl, $filetamanio, $strstate);
            $option = 1;
        }
        if ($intidcontrato != 0) {

            $option = 2;
        }

        if (!file_exists('./Assets/archivos/contratos/' . $filename)) {
            move_uploaded_file($temp, './Assets/archivos/contratos/' . $filename);
        }

        if ($requestrol > 0) {

            if ($option == 1) {
                $arrresponse = array('status' => true, 'msg' => 'Datos Guardados Correctamente');
            }
            if ($option == 2) {
                $arrresponse = array('status' => true, 'msg' => 'Datos Repetidos');
            }

        } else {
            if ($requestrol == -1) {
                $arrresponse = array('status' => false, 'msg' => '!Atencion! Ya existe un contrato con este nombre');
            } else {
                $arrresponse = array('status' => true, 'msg' => 'No se almaceno los datos');
            }

        }

        echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);
        die();

    }

    public function delcontrato()
    {
        if ($_POST) {
            $intidcontrato = intval($_POST['idcontrato']);
            $requestdelete = $this->model->deletecontrato($intidcontrato);
            if ($requestdelete == 'ok') {
                $arrresponse = array('status' => true, 'msg' => 'Datos Eliminados Correctamente' . $requestdelete);

            } else {
                $arrresponse = array('status' => true, 'msg' => 'No se elimino los datos' . $requestdelete);
            }
            echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

}
