<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\SucursalValidation,
    App\Middleware\AuthMiddleware;

$app->group('/sucursal/', function () {
    $this->get('listar/{idEmpresa}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->sucursal->getAll($args['idEmpresa']))
                   );
    });
    /**
 * @api {get} sucursal/obtener/{idSucursal} Obtener Sucursal
 * @apiName Obtener Sucursal
 * @apiGroup Sucursal
 *
 * @apiParam {number} idSucursal  Id de la sucursal 
 *
 * @apiSuccess {Object} data objecto consultado.
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *          "suc_id": "4",
 *          "suc_nombre": "Centro Iguazu",
 *          "suc_cuit": "2035978",
 *          "suc_razonSocial": "Pizza Color Delivery",
 *          "suc_idEmpresa": "1",
 *          "suc_direccion": "jj valle 167"
 *        }
 *
 */  
    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->sucursal->get($args['id']))
                   );
    });
    
    
    
    $this->post('insertar', function ($req, $res, $args) {
       $r = SucursalValidation::validate($req->getParsedBody());
        
        if(!$r->response){
            return $res->withHeader('Content-type', 'application/json')
                       ->withStatus(422)
                       ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->sucursal->insert($req->getParsedBody()))
                   ); 
    });
    
    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = SucursalValidation::validate($req->getParsedBody());
        
        if(!$r->response){
            return $res->withHeader('Content-type', 'application/json')
                       ->withStatus(422)
                       ->write(json_encode($r->errors));
        }
   
//        
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->sucursal->update($req->getParsedBody(), $args['id']))
                   );   
    });
    
    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->sucursal->delete($args['id']))
                   );   
    });
});
        //->add(new AuthMiddleware($app));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

