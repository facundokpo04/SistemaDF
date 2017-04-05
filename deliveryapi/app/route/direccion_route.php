<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\DireccionValidation,
    App\Middleware\AuthMiddleware;

$app->group('/direccion/', function () {

    
    $this->get('listar', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->direccion->getAll())
        );
    });

    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->direccion->get($args['id']))
        );
    });
    
    /**
 * @api {post} direccion/insertar Insertar una  Direccion
 * @apiName Insertar Direccion
 * @apiGroup Direccion
 * 
 * @apiParam {number} dir_nombre  Nombre del Lugar
 * @apiParam {number} dir_telefonoFijo  Telefono fijo de la direccion
 * @apiParam {number} dir_latitud  Latitud
 * @apiParam {number} dir_longitud  Longitud
 * @apiParam {number} dir_idPersona  id de la Persona
 * @apiParam {number} dir_direccion  Direccion del Lugar
 * @apiParam {number} dir_aclaracion  Aclaraciones sobre la direccion
 * 
 *
 * @apiSuccess {String} result id de la direccion.
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
        $r = DireccionValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->direccion->insert($req->getParsedBody()))
        );
    });
    /**
 * @api {put} direccion/actualizar/{id} Actualizar una  Direccion
 * @apiName Actualizar Direccion
 * @apiGroup Direccion
 * 
 * @apiParam {number} id id de la direccion para actualizar
 * 
 * @apiParam {number} [dir_nombre]  Nombre del Lugar
 * @apiParam {number} [dir_telefonoFijo]  Telefono fijo de la direccion
 * @apiParam {number} [dir_latitud]  Latitud
 * @apiParam {number} [dir_longitud]  Longitud
 * @apiParam {number} [dir_idPersona]  id de la Persona
 * @apiParam {number} [dir_direccion]  Direccion del Lugar
 * @apiParam {number} [dir_aclaracion]  Aclaraciones sobre la direccion
 * 
 *
 * @apiSuccess {String} result id de la direccion.
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
        $r = DireccionValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }

//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->direccion->update($req->getParsedBody(), $args['id']))
        );
    });
   /**
 * @api {delete} direccion/eliminar/{id} Eliminar una  Direccion
 * @apiName Eliminar Direccion
 * @apiGroup Direccion
 * 
 * @apiParam {number} id id de la direccion para eliminar
 * 
 *
 * @apiSuccess {String} result id de la direccion.
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
    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->direccion->delete($args['id']))
        );
    });
});
