<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estadistica extends CI_Controller {

    private $user;
    

    public function __CONSTRUCT() {
        parent::__construct();

        $this->user = ['user' => RestApi::getUserData()];
        // Valida que exista el usuario obtenido del token, del caso contrario lo regresa a la pagina de inicio que es nuestro controlador auth
        if($this->user['user'] === null) redirect('');
     
//        $this->load->model('AderezoModel', 'am');
    }

    public function index($p = 0) {
        //header
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        //definimos variable para traer la data y mantner la logica de paginacion
        //inicializacion de paginacion


        $this->load->view('estadistica/index.php');

        //footer
        $this->load->view('layout/footer');
    }

}
