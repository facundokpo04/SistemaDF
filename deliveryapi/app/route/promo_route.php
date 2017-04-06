<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\PromoValidation,
    App\Middleware\AuthMiddleware;

$app->group('/promo/', function () {
    
 /**
 * @api {get} promo/url/ Obtener Url
 * @apiName Obtener Url
 * @apiGroup Promo
 *
 *
 * @apiSuccess {String} data url de la ubicacion de las imagenes de las promos.
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *           "http%3A%2F%2F35.184.187.29%2FdelBo%2Fassets%2Fimagenes%2Fproducto"
 *        }
 *
 */    

    $this->get('url', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->getUrl())
        );
    });
    /**
 * @api {get} promos/listar Listar Promos
 * @apiName Listar Promos
 * @apiGroup Promo
 *
 *
 * @apiSuccess {Object[]} data registros consultados.
 * @apiSuccess {number} total cantidad de registros.
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *           "data": [
 *            {
 *             "pro_id": "3",
 *             "pro_nombre": "Promo3",
 *             "pro_descripcion": "2 pizzas + 1 gaseosa",
 *             "pro_precio": 250,
 *             "pro_descuento": 40,
 *             "pro_FechaInicio": "23/02/2017",
 *             "pro_FechaFin": "23/02/2017",
 *             "pro_imagen": "promo3.jpg",
 *             "pro_idEstado": 1
 *            }
 *           ],
 *           "total": "10"
 *        }
 *
 */  
    $this->get('listar', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->promo->getAll())
                   );
    });
 /**
 * @api {get} promo/listarprod/{id}  Listar todas los Productos de una promo
 * @apiName Listar Productos Promo
 * @apiGroup Promo
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
 *                    "ppro_id": "1",
 *                    "ppro_idPromo": "1",
 *                    "ppro_idProducto": "7",
 *                    "prod_id": "7",
 *                    "prod_nombre": "Arabe",
 *                    "prod_descripcionProducto": "Muzzarela, salsa y aceitunas",
 *                    "prod_precioBase": "12.5",
 *                    "prod_imagen": "pizzanapolitana.jpg"
 *              },
 *        }
 *
 */   
    
    
    $this->get('listarprod/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->promo->getAllProd($args['id']))
                   );
    });
    /**
 * @api {get} promo/obtener/{idPromo} Obtener Promo
 * @apiName Obtener Promo
 * @apiGroup Promo
 *
 * @apiParam {number} idPromo  id de la promo que se quiere obtener 
 *
 * @apiSuccess {Object[]} data registro consultado.
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *          
 *               "pro_id": "1",
 *               "pro_nombre": "Promo1",
 *               "pro_descripcion": "",
 *               "pro_precio": "0",
 *               "pro_descuento": "0",
 *               "pro_FechaInicio": "01/01/1970",
 *               "pro_FechaFin": "01/01/1970",
 *               "pro_imagen": "promo1.jpg",
 *               "pro_idEstado": 1
 *        
 *        }
 *
 */   
    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->promo->get($args['id']))
                   );
    });
    
    $this->post('insertar', function ($req, $res, $args) {
       $r = PromoValidation::validate($req->getParsedBody());
        
        if(!$r->response){
            return $res->withHeader('Content-type', 'application/json')
                       ->withStatus(422)
                       ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->promo->insert($req->getParsedBody()))
                   ); 
    });
    
    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = PromoValidation::validate($req->getParsedBody());
        
        if(!$r->response){
            return $res->withHeader('Content-type', 'application/json')
                       ->withStatus(422)
                       ->write(json_encode($r->errors));
        }
   
//        
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->promo->update($req->getParsedBody(), $args['id']))
                   );   
    });
    
    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->promo->delete($args['id']))
                   );   
    });
    
    $this->post('insertarprod', function ($req, $res, $args) {
        $r = PromoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->promo->insertProd($req->getParsedBody()))
        );
    });
    
    $this->delete('eliminarprod/{idPromo}/{idProducto}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->promo->deleteProd($args['idPromo'], $args['idProducto']))
        );
    });
      $this->delete('eliminarprodid/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->promo->deleteProdId($args['id']))
        );
    });
});
        //->add(new AuthMiddleware($app));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

