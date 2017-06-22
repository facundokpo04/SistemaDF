<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\ProductoPedidoValidation,
    App\Middleware\AuthMiddleware;

$app->group('/productopedido/', function () {

    $this->get('url', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->productopedido->getUrl())
        );
    });

    $this->get('listar', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->productopedido->getAll())
        );
    });
 /**
 * @api {get} productopedido/obtener/{id} Obtener Producto Pedido
 * @apiName Obtener Producto Pedido
 * @apiGroup Detalle Pedido
 *
 * @apiParam {number} id  Id del Producto Pedido
 * 
 *
 * @apiSuccess {object} Producto Pedido.
 * 
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *          "pp_id": "5",
 *          "pp_precioBase": "120",
 *          "pp_idProducto": "1",
 *          "pp_idVariedad": "3",
 *          "pp_precioCalc": "255",
 *          "pp_aclaracion": "sin queso"  
 *        }
 *
 */  
    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->productopedido->get($args['id']))
        );
    });

    
       /**
 * @api {post} productopedido/insertar Insertar un Producto Pedido
 * @apiName Insertar Producto Pedido
 * @apiGroup Detalle Pedido
 *
 * @apiParam {float} pp_precioBase  precio del producto 
 * @apiParam {number} pp_idProducto  id del producto
 * @apiParam {number} pp_idVariedad  id de la variedad si es que tiene
 * @apiParam {float} pp_precioCalc   precio de la variedad + los componentes
 * @apiParam {string} pp_aclaracion  aclaracion del producto elegido
 * 
 * 
 *
 * @apiSuccess {String} result id del Producto Pedido.
 * @apiSuccess {Boolean} response   resultado del llamado.
 * @apiSuccess {String} message     mesaje informativo.
 * @apiSuccess {String[]} errors   errores de validacion.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       "result": 1
 *       "response": "true"
 *       "message": ""
 *       "errors": []
 *     }
 *
 */  
    $this->post('insertar', function ($req, $res, $args) {
        $r = ProductoPedidoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->productopedido->insert($req->getParsedBody()))
        );
    });



    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = ProductoPedidoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }

//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->productopedido->update($req->getParsedBody(), $args['id']))
        );
    });

    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->productopedido->delete($args['id']))
        );
    });
 
});
//->add(new AuthMiddleware($app));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

