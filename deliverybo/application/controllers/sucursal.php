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
        $this->load->view('sucursal/index.php');
        //footer
        $this->load->view('layout/footer');
    }

    public function get_sucursales($idEmpresa=1) {

        $data = [];
  
        $data = new stdClass();
        try {
            $result = $this->sm->getAll($idEmpresa);
            $total = $result->total;
            $data->data = $result->data;
            
        } catch (Exception $e) {
            var_dump($e);
        }
        echo json_encode($data);
    }

   public function get_Diahorarios() {

       
    }
    public function get_sucursalById($idSucursal) {



        try {
            $result = $this->sm->obtener($idSucursal);
            $data = $result;
        } catch (Exception $e) {
            var_dump($e);
        }
        echo json_encode($data);
    }
    public function get_DiahorarioById() {

       
    }
    public function updsucursal() {

   
    }

   

    public function updateDh() {
        
    }

    public function eliminar($id) {
        
    }

}
