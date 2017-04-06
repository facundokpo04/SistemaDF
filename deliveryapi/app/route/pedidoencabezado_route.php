<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\PedidoEncabezadoValidation,
    App\Middleware\AuthMiddleware;

$app->group('/pedidoencabezado/', function () {

  
    $this->get('listar', function ($req, $res, $args) {
        return $res->withHeader('Content-type','application/json')
                        ->write(
                                json_encode($this->model->pedidoencabezado->getAll())
        );
    });
 /**
 * @api {get} pedidoencabezado/obtener/{id} Obtener el Encabezado del Pedido
 * @apiName Obtener Pedido Encabezado
 * @apiGroup Pedido
 *
 * @apiParam {number} id id del Pedido Encabezado que se desea Obtener 
 *
 * @apiSuccess {Object} data registro consultado.
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *          
 *              "pe_id": "13",
*               "pe_idCliente": "8",
*               "pe_idEmpleado": 12,
*               "pe_aclaraciones": "Facturar a nombre de .. ",
*               "pe_comentarios": "Exelente llego muy rapido ",
*               "pe_idEstado": "1",
*               "pe_Total": 250,
*               "pe_idPersona": "8",
*               "pe_cli_tel": "3758483058",
*               "pe_idDireccion": "3",
*               "pe_medioPago": "Tarjeta Debito",
*               "pe_fechaPedido": 12/04/17,
*               "per_nombre": "facundo Andres Dominguez",
*               "per_documento": 34060319,
*               "dir_telefonoFijo": "420769",
*               "dir_direccion": "jj valle 167",
*               "relacion": "pedidoestado",
*               "descripcion": "Pendiente"
 *        
 *        }
 *
 */  
    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->pedidoencabezado->get($args['id']))
        );
    });
    
    
 /**
 * @api {get} pedidoencabezado/obtenercli/{id} Obtener el Cliente del Pedido
 * @apiName Obtener Cliente Pedido
 * @apiGroup Pedido
 *
 * @apiParam {number} id id del Pedido 
 *
 * @apiSuccess {Object} data registro consultado.
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *          
 *              "per_id": "8",
 *              "per_nombre": "facundo Andres Dominguez",
 *              "per_email": "facundokpo04@gmail.com",
 *              "per_documento": 34060319,
 *              "per_password": "b9249ee15900c72b3938d6b8e3909103",
 *              "per_nacionalidad": "Argentino",
 *              "per_celular": "3758483058",
 *              "per_perfilUsuario": "Cliente",
 *              "dir_direccion": "jj valle 167",
 *              "dir_telefonoFijo": "420769"
 *        
 *        }
 *
 */  
    
    $this->get('obtenercli/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->pedidoencabezado->getCliente($args['id']))
        );
    });
    
 /**
 * @api {post} pedidoencabezado/insertar Insertar un Pedido Encabezado
 * @apiName Insertar Pedido Encabezado
 * @apiGroup Pedido
 *
 * @apiParam {number} pe_idCliente  id del cliente
 * @apiParam {number} pe_idEmpleado  id del empleado
 * @apiParam {string} pe_aclaraciones  aclaraciones del pedido
 * @apiParam {string} pe_comentarios  comentario sobre el pedido
 * @apiParam {number} pe_idEstado  Estado del pedido 1 pendiente 2 preparado 3 en camino
 * @apiParam {number} pe_Total  total del pedido
 * @apiParam {number} pe_idPersona  id de la persona
 * @apiParam {string} pe_cli_tel  tel del cliente
 * @apiParam {string} pe_idDireccion  direccion del cliente
 * @apiParam {string} pe_medioPago  Medio de pago del cliente
 * @apiParam {date} pe_fechaPedido  fecha y hora que se creo el pedido
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
      
        $r = PedidoEncabezadoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->pedidoencabezado->insert($req->getParsedBody()))
        );
    });

    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = PedidoEncabezadoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }

//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->pedidoencabezado->update($req->getParsedBody(), $args['id']))
        );
    });

    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->pedidoencabezado->delete($args['id']))
        );
    });
});
//->add(new AuthMiddleware($app));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

