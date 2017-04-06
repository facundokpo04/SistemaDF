<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\DetallePedidoValidation,
    App\Middleware\AuthMiddleware;

$app->group('/detallepedido/', function () {

    
    $this->get('listar', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->detallepedido->getAll())
        );
    });
    /**
 * @api {get} detallepedido/listarPed/{id} Listar los detalles de un pedido
 * @apiName Listar Detalle Pedido
 * @apiGroup Detalle Pedido
 *
 * @apiParam {number} id id del Pedido Encabezado que se desea listar el detalle 
 *
 * @apiSuccess {Object[]} data lista de detalles del pedido
 * @apiSuccess {Object}   data.producto producto del detalle.
 * @apiSuccess {Object[]} data.componentes componentes del detalle.
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *      -0:{
 *         "producto": {
 *              "dp_id": "4",
 *              "dp_Cantidad": "1",
 *              "dp_PrecioUnitario": "216",
 *              "dp_Total": null,
 *              "dp_idProductoPedido": "7",
 *              "dp_idPedidoEncabezado": "14",
 *              "prod_nombre": "Muzzarella",
 *              "prod_codigoProducto": "01256",
 *              "prod_precioBase": "98",
 *              "var_nombre": "Grande",
 *              "var_precio": "108"
 *             },
 *          "componentes": [
 *             - 0:{
 *                  "cpp_id": "3",
 *                  "cpp_idProductoPedido": "7",
 *                  "cpp_idComponente": "4",
 *                  "com_precio": "10",
 *                  "com_nombre": "Huevo"
 *              }
 *          ],
 *        }
 *
 */  
     $this->get('listarPed/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->detallepedido->getAllped($args['id']))
        );
    });
 /**
 * @api {get} detallepedido/obtener/{id} Obtener Detalle
 * @apiName Obtener Detalle
 * @apiGroup Detalle Pedido
 *
 * @apiParam {number} id  Id del detalle
 * 
 *
 * @apiSuccess {object} data detalle Pedido.
 * 
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *           "dp_id": "3",
 *           "dp_Cantidad": "1",
 *           "dp_PrecioUnitario": "50",
 *           "dp_Total": 250,
 *           "dp_idProductoPedido": "5",
 *           "dp_idPedidoEncabezado": "13"
 *        }
 *
 */  
    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->detallepedido->get($args['id']))
        );
    });

    
    
    /**
 * @api {post} pedidoencabezado/insertar Insertar un Detalle Pedido
 * @apiName Insertar Detalle Pedido
 * @apiGroup Detalle Pedido
 *
 * @apiParam {number} dp_Cantidad  cantidad de productos del detalle
 * @apiParam {number} dp_PrecioUnitario  precio unitario del producto
 * @apiParam {string} dp_Total  Precio unitario x cantidad
 * @apiParam {string} dp_idProductoPedido  id del producto pedido
 * @apiParam {number} dp_idPedidoEncabezado  id del encabezado del pedido
 * 
 * 
 *
 * @apiSuccess {String} result id del Pedido.
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
        
        
        $r = DetallePedidoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->detallepedido->insert($req->getParsedBody()))
        );
    });
 /**
 * @api {put} pedidoencabezado/actualizar Actualizar un detalle Pedido
 * @apiName Actualizar Detalle Pedido
 * @apiGroup Detalle Pedido
 *
 * @apiParam {number} dp_Cantidad  cantidad de productos del detalle
 * @apiParam {number} dp_PrecioUnitario  precio unitario del producto
 * @apiParam {string} dp_Total  Precio unitario x cantidad
 * @apiParam {string} dp_idProductoPedido  id del producto pedido
 * @apiParam {number} dp_idPedidoEncabezado  id del encabezado del pedido
 * 
 * 
 *
 * @apiSuccess {String} result id del Pedido.
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
    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = DetallePedidoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }

//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->detallepedido->update($req->getParsedBody(), $args['id']))
        );
    });

    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->detallepedido->delete($args['id']))
        );
    });
});
