<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sucursal extends CI_Controller {

    private $user;

    public function __CONSTRUCT() {
        parent::__construct();

//        $this->user = ['user' => RestApi::getUserData()];
        // Valida que exista el usuario obtenido del token, del caso contrario lo regresa a la pagina de inicio que es nuestro controlador auth
//        if($this->user['user'] === null) redirect('');
//
        $this->load->model('SucursalModel', 'sm');
    }

    public function index($p = 0) {
        //header
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        //definimos variable para traer la data y mantner la logica de paginacion
        //inicializacion de paginacion


        $this->load->view('categoria/index.php');

        //footer
        $this->load->view('layout/footer');
    }

    public function get_sucursales($limite = 5, $p = 0) {

        $data = [];
        $total = 0;
        $limite = 10;
        $data = new stdClass();
        try {
            $result = $this->cm->getAll($limite, $p);

            $total = $result->total;
            $data->data = $result->data;
        } catch (Exception $e) {
            var_dump($e);
        }
        echo json_encode($data);
    }

      public function get_Diahorarios() {

       
    }
    public function get_sucursalById($idCategoria) {



        try {
            $result = $this->cm->obtener($idCategoria);
            $data = $result;
        } catch (Exception $e) {
            var_dump($e);
        }
        echo json_encode($data);
    }
    public function get_DiahorarioById() {

       
    }
    public function updsucursal() {

        $config = [
            "upload_path" => "./assets/imagenes/categoria",
            "allowed_types" => "png|jpg"
        ];
        $errors = array();

        $this->load->library("upload", $config);

        $id = $this->input->post('cat_id');



        if ($this->upload->do_upload('cat_imagen')) {
            $archivo = array("upload_data" => $this->upload->data());
            $imagen = $archivo['upload_data']['full_path'];
        } else {
            //echo  json_encode($this->upload->display_errors());
            $imagen = $this->cm->obtener($id)->cat_imagen;
        }

        $data = [
            'cat_nombre' => $this->input->post('cat_nombre'),
            'cat_descripcion' => $this->input->post('cat_descripcion'),
            'cat_idEstado' => $this->input->post('cat_idEstado'),
            'cat_Imagen' => $imagen
        ];
        try {

            if (empty($id)) {
                $this->cm->registrar($data);
            } else {
                $this->cm->actualizar($data, $id);
            }
        } catch (Exception $e) {
            if ($e->getMessage() === RestApiErrorCode::UNPROCESSABLE_ENTITY) {
                $errors = RestApi::getEntityValidationFieldsError();
            }
        }

        echo json_encode($errors);
    }

   

    public function updateDh() {
        
    }

    public function eliminar($id) {
        
    }

}
