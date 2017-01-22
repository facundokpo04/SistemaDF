<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

    private $user;

    public function __CONSTRUCT() {
        parent::__construct();

//        $this->user = ['user' => RestApi::getUserData()];
        // Valida que exista el usuario obtenido del token, del caso contrario lo regresa a la pagina de inicio que es nuestro controlador auth
//        if($this->user['user'] === null) redirect('');
//
        $this->load->model('EmpresaModel', 'em');
    }

    public function index($p = 0) {
        //header
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        //definimos variable para traer la data y mantner la logica de paginacion
        //inicializacion de paginacion


        $this->load->view('Empresa/index.php');

        //footer
        $this->load->view('layout/footer');
    }

    

    public function get_EmpresaById($idEmpresa) {



        try {
            $result = $this->em->obtener($idEmpresa);
            $data = $result;
        } catch (Exception $e) {
            var_dump($e);
        }
        echo json_encode($data);
    }

    public function updEmpresa() {

        $config = [
            "upload_path" => "./assets/imagenes/categoria",
            "allowed_types" => "png|jpg"
        ];
        $errors = array();

        $this->load->library("upload", $config);

        $id = $this->input->post('cat_id');



        if ($this->upload->do_upload('logo')) {
            $archivo = array("upload_data" => $this->upload->data());
            $imagen = $archivo['upload_data']['full_path'];
        } else {
            //echo  json_encode($this->upload->display_errors());
            $imagen = $this->em->obtener($id)->logo;
          
        }

        $data = [
            'cuilt' => $this->input->post('cuilt'),
            'telefono' => $this->input->post('telefono'),
            'razonSocial' => $this->input->post('razonSocial'),
            'imagen' => $imagen
        ];
        try {

            if (empty($id)) {
                $this->em->registrar($data);
            } else {
                $this->em->actualizar($data, $id);
            }
        } catch (Exception $e) {
            if ($e->getMessage() === RestApiErrorCode::UNPROCESSABLE_ENTITY) {
                $errors = RestApi::getEntityValidationFieldsError();
            }
        }

        echo json_encode($errors);
    }

    public function guardar() {
        
    }

    public function eliminar($id) {
        
    }

}


