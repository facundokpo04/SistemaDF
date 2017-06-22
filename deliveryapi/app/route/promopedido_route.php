<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\PromoPedidoValidation,
    App\Middleware\AuthMiddleware;

$app->group('/promopedido/', function () {

    $this->get('listar', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->promopedido->getAll())
        );
    });

    $this->get('listarPed/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->promopedido->getAllped($args['id']))
        );
    });
      /**
 * @api {get} promopedido/listarprod/{idPromoPedido} Listar los productos de una promopedido
 * @apiName Listar ProductosP PromoPedido
 * @apiGroup Promo Pedido
 *
 * @apiParam {number} idPromoPedido id de la PromoPedido que se quiere listar los productos 
 *
 * @apiSuccess {Object[]} arrat lista de ProductosPedido de la PromoPedido
 *
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *      -0:{       
 *          "ppp_id": "1",
 *          "ppp_idProductoP": "5",
 *          "ppp_idPromoP": "1",
 *          "pp_id": "5",
 *          "pp_idVariedad": "3",
 *          "var_nombre": "Grande",
 *          "pp_aclaracion": "Alguna Aclaracion",
 *          "prod_id": "1",
 *          "prod_nombre": "Napolitana",
 *          "prod_descripcionProducto": "Muzzarela, salsa ajo y rodajas de tomate",
 *          "prod_precioBase": "120",
 *          "prod_idCategoria": "3"
 *          }
 *        
 *
 */ 
    $this->get('listarprod/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->promopedido->getAllProd($args['id']))
        );
    });

    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->promopedido->get($args['id']))
        );
    });

         /**
 * @api {post} promopedido/insertar Insertar una Promo Pedido
 * @apiName Insertar Promo Pedido
 * @apiGroup Promo Pedido
 *
 * @apiParam {string} ppro_nombre  nombre de la promo elegida 
 * @apiParam {number} ppro_precioUnitario  precio unitario de la promo
 * @apiParam {number} ppro_cantidad  cantidad de la promo elegida
 * @apiParam {float}  ppro_idPromo     id de la promo elegida
 * @apiParam {string} ppro_idPedidoEncabezado  id del pedido encabezado
 * @apiParam {string} ppro_detallePp  detalle de lo elegido por producto de promo algo descriptivo
 * @apiParam {string} ppro_total  precio total de la promo
 * @apiParam {string} ppro_precioBase  precio base de los productos de la promo
 * @apiParam {string} ppro_aclaracion  aclaracion sobre la promo elegida
 * 
 * @apiSuccess {String} result id de la Promo Pedido.
 * @apiSuccess {Boolean} response   resultado del llamado.
 * @apiSuccess {String} message     mesaje informativo.
 * @apiSuccess {String[]} errors   errores de validacion.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       "result": 1
 *       "response": "true"
 *       "message": "Exito"
 *       "errors": []
 *     }
 *
 */  
    $this->post('insertar', function ($req, $res, $args) {


        $r = PromoPedidoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->promopedido->insert($req->getParsedBody()))
        );
    });

    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = PromoPedidoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->promopedido->update($req->getParsedBody(), $args['id']))
        );
    });

    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->promopedido->delete($args['id']))
        );
    });
    
    
        /**
 * @api {post} promopedido/insertarprodp Insertar ProductoPedio a una PromoPedido
 * @apiName Insertar ProductoPedio a PromoPedido
 * @apiGroup Promo Pedido
 *
 * @apiParam {number} ppp_idProductoP  id  del ProductoP elegido 
 * @apiParam {number} ppp_idPromoP  id de la PromoP elegida
 * 
 * @apiSuccess {String} result id del  ProductoPromoPedido.
 * @apiSuccess {Boolean} response   resultado del llamado.
 * @apiSuccess {String} message     mesaje informativo.
 * @apiSuccess {String[]} errors   errores de validacion.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       "result": 1
 *       "response": "true"
 *       "message": "Exito"
 *       "errors": []
 *     }
 *
 */  
    $this->post('insertarprodp', function ($req, $res, $args) {
        $r = PromoPedidoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->promopedido->insertProdP($req->getParsedBody()))
        );
    });

    $this->delete('eliminarprodp/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->promopedido->deleteProdPId($args['id']))
        );
    });
});
