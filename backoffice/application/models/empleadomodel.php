<?php
class EmpleadoModel extends CI_Model{
    public function getAll($l = 10, $p = 0){
        return RestApi::call(
            RestApiMethod::GET,
            "empleado/listar/$l/$p"
        );
    }

    public function obtener($id){
        return RestApi::call(
            RestApiMethod::GET,
            "empleado/obtener/$id"
        );
    }
    
    public function registrar($data){
        return RestApi::call(
            RestApiMethod::POST,
            'test/empleado/registrar',
            $data
        );
    }

    public function actualizar($data, $id){
        return RestApi::call(
            RestApiMethod::PUT,
            "empleado/listar/$id" , $data
        );
    }

     public function eliminar( $id){
        return RestApi::call(
            RestApiMethod::DELETE,
            "empleado/eliminar/$id"
        );
    }
}