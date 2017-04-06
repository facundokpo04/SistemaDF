<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\DiahorarioValidation,
    App\Middleware\AuthMiddleware;

$app->group('/diahorario/', function () {
    
 /**
 * @api {get} sucursal/obtener/{idSucursal} Obtener Horarios
 * @apiName Obtener Horarios
 * @apiGroup Sucursal
 *
 * @apiParam {number} idSucursal  Id de la sucursal 
 *
 * @apiSuccess {Object[]} data registros consultados.
 * @apiSuccess {number} total cantidad de registros.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *      "data": [
 *       -0:{
 *              "dh_id": "1",
 *              "dh_diaSemana": "1",
 *              "dh_horaApertura": "11:00",
 *              "dh_horaCierre": "21:00",
 *              "dh_idSucursal": "4"
 *          },
 *       -1:{
 *              "dh_id": "3",
 *              "dh_diaSemana": "2",
 *              "dh_horaApertura": "10:00",
 *              "dh_horaCierre": "21:00",
 *              "dh_idSucursal": "4"
 *           }
 *               ],
 *      "total": "7"
 *         }
 *
 *
 */  
    $this->get('listar/{idSucursal}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->diahorario->getAll($args['idSucursal']))
                   );
    });
    
    /**
 * @api {get} diahorario/obtener/{id} Obtener DiaHorario
 * @apiName Obtener DiaHorario
 * @apiGroup Sucursal
 *
 * @apiParam {number} id  Id del diahorario
 * 
 *
 * @apiSuccess {number} dh_id id del DH.
 * @apiSuccess {number} dh_diaSemana dia de la semana 1-lunes.
 * @apiSuccess {String} dh_horaApertura hora de apertura del delivery.
 * @apiSuccess {String} dh_horaCierre hora del cierre del delivery.
 * @apiSuccess {number} dh_idSucursal id de la sucursal.
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *         "dh_id": "1",
 *         "dh_diaSemana": "1",
 *         "dh_horaApertura": "11:00",
 *         "dh_horaCierre": "21:00",
 *         "dh_idSucursal": "4"
 *           
 *        }
 *
 */  
    
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

