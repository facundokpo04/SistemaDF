<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\DiahorarioValidation,
    App\Middleware\AuthMiddleware;

$app->group('/diahorario/', function () {
    $this->get('listar/{idSucursal}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->diahorario->getAll($args['idSucursal']))
                   );
    });
    
    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->diahorario->get($args['id']))
                   );
    });
    
    $this->post('insertar', function ($req, $res, $args) {
       $r = DiahorarioValidation::validate($req->getParsedBody());
        
        if(!$r->response){
            return $res->withHeader('Content-type', 'application/json')
                       ->withStatus(422)
                       ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->diahorario->insert($req->getParsedBody()))
                   ); 
    });
    
    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = DiahorarioValidation::validate($req->getParsedBody());
        
        if(!$r->response){
            return $res->withHeader('Content-type', 'application/json')
                       ->withStatus(422)
                       ->write(json_encode($r->errors));
        }
   
//        
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->diahorario->update($req->getParsedBody(), $args['id']))
                   );   
    });
    
    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->diahorario->delete($args['id']))
                   );   
    });
});
        //->add(new AuthMiddleware($app));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

