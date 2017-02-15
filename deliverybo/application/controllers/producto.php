<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

    private $user;

    public function __CONSTRUCT() {
        parent::__construct();

//        $this->user = ['user' => RestApi::getUserData()];
        // Valida que exista el usuario obtenido del token, del caso contrario lo regresa a la pagina de inicio que es nuestro controlador auth
//        if($this->user['user'] === null) redirect('');
//
        $this->load->model('ProductoModel', 'pm');
     
    }

    public function index($p = 0) {
        //header
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('producto/index.php');
        //footer
        $this->load->view('layout/footer');
    }

    public function get_Productos($idSucursal = 4) {

        $data = [];
        $data = new stdClass();
        try {
            $result = $this->pm->getAllSuc($idSucursal);
            $total = $result->total;
            $data->data = $result->data;
        } catch (Exception $e) {
            var_dump($e);
        }
        echo json_encode($data);
    }

    

    public function get_productoById($idProducto) {

        try {
            $result = $this->pm->obtener($idProducto);
            $data = $result;
        } catch (Exception $e) {
            var_dump($e);
        }
        echo json_encode($data);
    }

    public function get_ComponentesById($idProducto) {

        try {
            $result = $this->pm->getAllComp($idProducto);
            $data = $result;
        } catch (Exception $e) {
            var_dump($e);
        }
        echo json_encode($data);
    }

        public function get_NotComponentesById($idProducto) {

        try {
            $result = $this->pm->getAllNotComp($idProducto);
            $data = $result;
        } catch (Exception $e) {
            var_dump($e);
        }
        echo json_encode($data);
    }
public function get_Categorias() {

        try {
            $result = $this->pm->getAllCate();
            $data = $result;
        } catch (Exception $e) {
            var_dump($e);
        }
        echo json_encode($data);
    }
    
    
    public function get_VariedadesById($idProducto) {

        try {
            $result = $this->pm->getAllVar($idProducto);
            $data = $result;
        } catch (Exception $e) {
            var_dump($e);
        }
        echo json_encode($data);
    }

    public function updParametro($idSucursal) {
//        $errors = array();
//        $result = '';
//
//        $result = $this->sm->getPar($idSucursal);
//        
//        
//        $data = [
//            'par_zonaEntrega' => $this->input->post('par_zonaEntrega'),
//            'par_pedidoMinimo' => $this->input->post('par_pedidoMinimo'),
//            'par_tiempoEntrega' => $this->input->post('par_tiempoEntrega'),
//            'par_costoEnvio' => $this->input->post('par_costoEnvio'),
//            'par_idSucursal' => $this->input->post('par_idSucursal')
//        ];
//        try {
//            if ($result == 'false') {
//                $this->sm->registrarPar($data);
//                
//            } else {
//                $this->sm->actualizarPar($data, $idSucursal);
//            }
//        } catch (Exception $e) {
//
//            if ($e->getMessage() === RestApiErrorCode::UNPROCESSABLE_ENTITY) {
//                $errors = RestApi::getEntityValidationFieldsError();
//            }
//        }
//        if (count($errors) === 0)
//                 redirect('sucursal');
//
//        else {
//            $this->load->view('layout/header');
//            $this->load->view('layout/menu');
//            $this->load->view('sucursal/validation', [
//                'errors' => $errors
//            ]);
//            $this->load->view('layout/footer');
//        }
//    }
//
//    public function updsucursal() {
//
//        $errors = array();
//
//        $id = $this->input->post('suc_id');
//        $respuesta;
//
//
//
//        $data = [
//            'suc_nombre' => $this->input->post('suc_nombre'),
//            'suc_cuit' => $this->input->post('suc_cuit'),
//            'suc_razonSocial' => $this->input->post('suc_razonSocial'),
//            'suc_idEmpresa' => 1,
//            'suc_direccion' => $this->input->post('suc_direccion')
//        ];
//
//        try {
//            if (empty($id)) {
//                $response = $this->sm->registrar($data);
//
//                $respuesta = ($response->result);
//            } else {
//                $this->sm->actualizar($data, $id);
//                $respuesta = $id;
//            }
//        } catch (Exception $e) {
//            if ($e->getMessage() === RestApiErrorCode::UNPROCESSABLE_ENTITY) {
//                $errors = RestApi::getEntityValidationFieldsError();
//                var_dump($errors);
//            }
//        }
//
//
//        if (count($errors) === 0) //redirect('sucursal')
//            //
//         echo json_encode($respuesta);
//        else {
//            $this->load->view('layout/header');
//            $this->load->view('layout/menu');
//            $this->load->view('sucursal/validation', [
//                'errors' => $errors
//            ]);
//            $this->load->view('layout/footer');
//        }
    }

    public function updComponente() {
//        $errors = array();
//
//        $id = $this->input->post('dh_id');
//
//
//
//        $data = [
//            'dh_diaSemana' => $this->input->post('dh_diaSemana'),
//            'dh_horaApertura' => $this->input->post('dh_horaApertura'),
//            'dh_horaCierre' => $this->input->post('dh_horaCierre'),
//            'dh_idSucursal' => $this->input->post('dh_idSucursal')
//        ];
//
//       try {
//            if (empty($id)) {
//                $response = $this->sm->registrarDh($data);
//                $respuesta = ($response->result);
//            } else {
//                $this->sm->actualizarDh($data, $id);
//                $respuesta = $id;
//            }
//        } catch (Exception $e) {
//            if ($e->getMessage() === RestApiErrorCode::UNPROCESSABLE_ENTITY) {
//                $errors = RestApi::getEntityValidationFieldsError();
//             
//            }
//        }
       
    }
    public function updProducto() 
        
        {

        $errors = array();

        $id = $this->input->post('prod_id');
        $respuesta;



        $data = [
            'prod_nombre' => $this->input->post('prod_nombre'),
            'prod_descripcionProducto' => $this->input->post('prod_descripcionProducto'),
            'prod_codigoProducto' => $this->input->post('prod_codigoProducto'),
            'prod_precioBase' => $this->input->post('prod_precioBase'),
            'prod_maxComponente' => $this->input->post('prod_maxComponente'),
            'prod_minComponente' => $this->input->post('prod_minComponente'),
            'prod_idEstado' => $this->input->post('prod_idEstado'),
            'prod_idCategoria' => $this->input->post('prod_idCategoria'),
            'prod_idEstadoVisible' => $this->input->post('prod_idEstadoVisible'),
            'prod_idSucursal' => '4'
        ];
        
       

        try {
            if (empty($id)) {
                $response = $this->pm->registrar($data);

                $respuesta = ($response->result);
            } else {
                $this->pm->actualizar($data, $id);
                $respuesta = $id;
            }
        } catch (Exception $e) {
            if ($e->getMessage() === RestApiErrorCode::UNPROCESSABLE_ENTITY) {
                $errors = RestApi::getEntityValidationFieldsError();
                var_dump($errors);
            }
        }


        if (count($errors) === 0) //redirect('sucursal')
            //
         echo json_encode($respuesta);
        else {
            $this->load->view('layout/header');
            $this->load->view('layout/menu');
            $this->load->view('producto/validation', [
                'errors' => $errors
            ]);
            $this->load->view('layout/footer');
        }
    }
        
    
 

    public function eliminar($idProducto) {
        
        
            try {
               $respuesta =  $this->pm->eliminar($idProducto);
          
        } catch (Exception $e) {
            if ($e->getMessage() === RestApiErrorCode::UNPROCESSABLE_ENTITY) {
                $errors = RestApi::getEntityValidationFieldsError();
             
            }
        }
//           
         
           echo json_encode($respuesta);
        
        
    }

}
