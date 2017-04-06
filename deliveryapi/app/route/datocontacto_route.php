<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\DatoContactoValidation,
    App\Middleware\AuthMiddleware;

$app->group('/datocontacto/', function () {

 /**
 * @api {get} datocontacto/listartelsuc/{idSucursal} Obtener Telefonos Sucursal
 * @apiName Obtener Telefonos Sucursal
 * @apiGroup Sucursal
 *
 * @apiParam {number} idSucursal  Id de la sucursal 
 *
 * @apiSuccess {[]Object} lista de telefonos de la sucursal.
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *          -0:{
 *              "tcon_id": "2",
 *              "tcon_numero": "3757589635",
 *              "tcon_descripcion": "WattApp",
 *              "tcon_tipo": "1",
 *              "tcon_idDatoContacto": "3",
 *              "dcon_idSucursal": "4"
 *             },
 *          -1:{
 *              "tcon_id": "3",
 *              "tcon_numero": "3757589636",
 *              "tcon_descripcion": "WattApp",
 *              "tcon_tipo": "1",
 *              "tcon_idDatoContacto": "3",
 *              "dcon_idSucursal": "4"
 *            }
 *        }
 *
 */  

    $this->get('listartelsuc/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->getAllTelCon($args['id']))
        );
    });

    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->get($args['id']))
        );
    });
 /**
 * @api {get} datocontacto/obtenersuc/{idSuc} Obtener DatoContacto Sucursal
 * @apiName Obtener DatoContacto
 * @apiGroup Sucursal
 *
 * @apiParam {number} id  Id de la Categoria
 * 
 *
 * @apiSuccess {number} dcon_id id del datocontacto.
 * @apiSuccess {String} dcon_facebook facebook de la sucursal.
 * @apiSuccess {String} dcon_website website de la sucursal.
 * @apiSuccess {String} dcon_twitter twitter de la sucursal.
 * @apiSuccess {String} dcon_direccion direccion de la sucursal.
 * @apiSuccess {number} dcon_idSucursal id de la sucursal.
 * @apiSuccess {String} dcon_email email de la sucursal.
 * 
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *          "dcon_id": "3",
 *          "dcon_facebook": "facebook.com/pizzacolordelivery",
 *          "dcon_website": "www.pizzacolordelivery.com",
 *          "dcon_twitter": "",
 *          "dcon_direccion": "Cordoba 255 ",
 *          "dcon_idSucursal": "4",
 *          "dcon_email": "delivey@gmail.com"
 *           
 *        }
 *
 */  
    $this->get('obtenersuc/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->getDcSuc($args['id']))
        );
    });

    $this->post('insertar', function ($req, $res, $args) {
        $r = DatoContactoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->insert($req->getParsedBody()))
        );
    });
    $this->post('insertartel', function ($req, $res, $args) {
        $r = DatoContactoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->insertTelCon($req->getParsedBody()))
        );
    });

    $this->put('actualizartel/{id}', function ($req, $res, $args) {
        $r = DatoContactoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }

//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->updateTelCon($req->getParsedBody(), $args['id']))
        );
    });

    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = DatoContactoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }

//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->update($req->getParsedBody(), $args['id']))
        );
    });

    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->delete($args['id']))
        );
    });

    $this->delete('eliminartel/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->deleteTelCon($args['id']))
        );
    });
});
