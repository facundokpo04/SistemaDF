<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Controller {

    private $user;

    public function __CONSTRUCT() {
        parent::__construct();

//        $this->user = ['user' => RestApi::getUserData()];
        // Valida que exista el usuario obtenido del token, del caso contrario lo regresa a la pagina de inicio que es nuestro controlador auth
//        if($this->user['user'] === null) redirect('');
//
        $this->load->model('EmpleadoModel', 'em');
        $this->load->model('SucursalModel', 'sm');
    }

    public function index($p = 0) {
        //header
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        //definimos variable para traer la data y mantner la logica de paginacion
        //inicializacion de paginacion


        $this->load->view('empleado/index.php');

        //footer
        $this->load->view('layout/footer');
    }

    public function get_empleados($limite = 5, $p = 0) {

        $data = [];
        $total = 0;
        $limite = 10;
        $data = new stdClass();
        try {
            $result = $this->em->getAll($limite, $p);

            $total = $result->total;
            $data->data = $result->data;
        } catch (Exception $e) {
            var_dump($e);
        }
        echo json_encode($data);
    }

    public function get_empleadoById($idEmpleado) {

      $data=new stdClass();

        try {
            $result = $this->em->obtener($idEmpleado);
            $data->empleados= $result;
            $result = $this->sm->getAll(1);//agrwgar empresa de manera dinamica
            $data->sucursales= $result;
        } catch (Exception $e) {
            var_dump($e);
        }
        echo json_encode($data);
    }

    public function updEmpleado() {

        $config = [
            "upload_path" => "./assets/imagenes/empleado",
            "allowed_types" => "png|jpg"
        ];
        $errors = array();

        $this->load->library("upload", $config);

        $id = $this->input->post('emp_id');



        if ($this->upload->do_upload('emp_imagen')) {
            $archivo = array("upload_data" => $this->upload->data());
            $imagen = $archivo['upload_data']['full_path'];
        } else {
            //echo  json_encode($this->upload->display_errors());
            $imagen = $this->em->obtener($id)->cat_imagen;
          
        }

        $data = [
            'emp_legajo' => $this->input->post('emp_legajo'),
            'emp_idPersona' => $this->input->post('emp_idPersona'),
            'emp_cargo' => $this->input->post('emp_cargo'),
            'emp_idSucursal' => $this->input->post('emp_idSucursal'),
            'cat_Imagen' => $imagen
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
