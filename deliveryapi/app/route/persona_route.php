<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\PersonaValidation,
    App\Middleware\AuthMiddleware;

$app->group('/persona/', function () {
    
  /**
 * @api {get} persona/listar/{l}/{p} Listar Personas
 * @apiName Listar Personas
 * @apiGroup Persona
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
 *              "per_id": "9",
 *              "per_nombre": "facundo Andres Dominguez",
 *              "per_email": "admin@admin.com",
 *              "per_documento": null,
 *              "per_password": "b9249ee15900c72b3938d6b8e3909103",
 *              "per_nacionalidad": null,
 *              "per_celular": "3758483058",
 *              "per_perfilUsuario": "Admin"
 *            }
 *           ],
 *           "total": "5"
 *        }
 *
 */   
    $this->get('listar/{l}/{p}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->persona->getAll($args['l'], $args['p']))
                   );
    });
    
 /**
 * @api {get} persona/listardir/{id}  Listar todas las direcciones por persona 
 * @apiName Listar Direcciones por Persona
 * @apiGroup Persona
 *
 *
 * @apiSuccess {Object[]} array registros consultados.
 *
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *             -0: {
 *                      "dir_id": "3",
 *                      "dir_nombre": "Casa",
 *                      "dir_telefonoFijo": "420769",
 *                      "dir_latitud": "13254",
 *                      "dir_longitud": "45645",
 *                      "dir_idPersona": "8",
 *                      "dir_direccion": "jj valle 167",
 *                      "dir_aclaracion": null
 *                },
 *        }
 *
 */   
    $this->get('listardir/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->persona->getAlldir($args['id']))
                   );
    });
    
    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->persona->get($args['id']))
                   );
    });
    
    $this->post('insertar', function ($req, $res, $args) {
       $r = PersonaValidation::validate($req->getParsedBody());
        
        if(!$r->response){
            return $res->withHeader('Content-type', 'application/json')
                       ->withStatus(422)
                       ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->persona->insert($req->getParsedBody()))
                   ); 
    });
    
    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = PersonaValidation::validate($req->getParsedBody());
        
        if(!$r->response){
            return $res->withHeader('Content-type', 'application/json')
                       ->withStatus(422)
                       ->write(json_encode($r->errors));
        }
   
//        
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->persona->update($req->getParsedBody(), $args['id']))
                   );   
    });
    
    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->persona->delete($args['id']))
                   );   
    });
});
        //->add(new AuthMiddleware($app));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

