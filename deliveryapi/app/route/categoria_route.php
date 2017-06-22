<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\CategoriaValidation,
    App\Middleware\AuthMiddleware;

$app->group('/categoria/', function () {

    $this->get('url', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->categoria->getUrl())
        );
    });

 /**
 * @api {get} categoria/listar/{l}/{p} Listar Categorias
 * @apiName Listar Categorias
 * @apiGroup Categoria
 *
 * @apiParam {number} l  Cantidad de registros a listar
 * @apiParam {number} p  Indice para listar
 *
 * @apiSuccess {Object[]} data objectos consultados.
 * @apiSuccess {number} total cantidad de registros.
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *           "data": [
 *            {
 *              "cat_id": "5",
 *              "cat_nombre": "Calzones",
 *              "cat_descripcion": "calzones",
 *              "cat_idEstado": "1",
 *              "cat_imagen": "calzones.png"
 *            }
 *           ],
 *           "total": "5"
 *        }
 *
 */    
    $this->get('listar/{l}/{p}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->categoria->getAll($args['l'], $args['p']))
        );
    });
 /**
 * @api {get} categoria/obtener/{id} Obtener Categoria
 * @apiName Obtener Categoria
 * @apiGroup Categoria
 *
 * @apiParam {number} id  Id de la Categoria
 * 
 *
 * @apiSuccess {number} cat_id id de la categoria.
 * @apiSuccess {String} cat_nombre nombre de la categoria.
 * @apiSuccess {String} cat_descripcion descripcion de la categoria.
 * @apiSuccess {number} cat_estado estado de la categoria 1 habilitado 2 deshabilitado.
 * @apiSuccess {String} cat_imagen nombre de la imagen.
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *         "cat_id": "1",
 *         "cat_nombre": "Hamburguesas",
 *         "cat_descripcion": "hamburguesas",
 *         "cat_idEstado": "1",
 *         "cat_imagen": "hamburgesas.png"
 *           
 *        }
 *
 */  
    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->categoria->get($args['id']))
        );
    });
 /**
 * @api {post} categoria/insertar Insertar una  Categoria
 * @apiName Insertar Categoria
 * @apiGroup Categoria
 *
 * @apiParam {number} cat_nombre  Nombre de la categoria
 * @apiParam {number} cat_descripcion  Breve descripcion de la categoria
 * @apiParam {number} cat_idEstado  id del estado de la categoria 1 habilitada 2 deshabilitada
 * @apiParam {number} cat_imagen  nombre de la imagen de la categoria con su extension
 * 
 *
 * @apiSuccess {String} result id de la categoria.
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
        $r = CategoriaValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->categoria->insert($req->getParsedBody()))
        );
    });

    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = CategoriaValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }

//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->categoria->update($req->getParsedBody(), $args['id']))
        );
    });

    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->categoria->delete($args['id']))
        );
    });
});
//->add(new AuthMiddleware($app));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

