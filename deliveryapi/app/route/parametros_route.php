<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\ParametrosValidation,
    App\Middleware\AuthMiddleware;

$app->group('/parametros/', function () {
    $this->get('listar/{idSucursa}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->parametros->getAll($args['idSucursa']))
                   );
    });
    
    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->parametros->get($args['id']))
                   );
    });
    
    $this->post('insertar', function ($req, $res, $args) {
       $r = ParametrosValidation::validate($req->getParsedBody());
        
        if(!$r->response){
            return $res->withHeader('Content-type', 'application/json')
                       ->withStatus(422)
                       ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->parametros->insert($req->getParsedBody()))
                   ); 
    });
    
    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = ParametrosValidation::validate($req->getParsedBody());
        
        if(!$r->response){
            return $res->withHeader('Content-type', 'application/json')
                       ->withStatus(422)
                       ->write(json_encode($r->errors));
        }
   
//        
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->parametros->update($req->getParsedBody(), $args['id']))
                   );   
    });
    
    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->parametros->delete($args['id']))
                   );   
    });
});
        //->add(new AuthMiddleware($app));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



