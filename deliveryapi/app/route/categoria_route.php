<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\CategoriaValidation,
    App\Middleware\AuthMiddleware;

$app->group('/categoria/', function () {
    $this->get('listar/{l}/{p}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->categoria->listar($args['l'], $args['p']))
                   );
    });
    
    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->categoria->obtener($args['id']))
                   );
    });
    
    $this->post('insertar', function ($req, $res, $args) {
        $r = EmpleadoValidation::validate($req->getParsedBody());
        
        if(!$r->response){
            return $res->withHeader('Content-type', 'application/json')
                       ->withStatus(422)
                       ->write(json_encode($r->errors));
        }
        
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->categoria->registrar($req->getParsedBody()))
                   ); 
    });
    
    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = EmpleadoValidation::validate($req->getParsedBody(), true);
        
        if(!$r->response){
            return $res->withHeader('Content-type', 'application/json')
                       ->withStatus(422)
                       ->write(json_encode($r->errors));            
        }
        
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->categoria->actualizar($req->getParsedBody(), $args['id']))
                   );   
    });
    
    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->categoria->eliminar($args['id']))
                   );   
    });
});
        //->add(new AuthMiddleware($app));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

