<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\ProductoValidation,
    App\Middleware\AuthMiddleware;

$app->group('/producto/', function () {

 /**
 * @api {get} producto/url/ Obtener Url
 * @apiName Obtener Url
 * @apiGroup Producto
 *
 *
 * @apiSuccess {String} data url de la ubicacion de las imagenes de los productos.
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
 * @api {get} producto/listar Listar Productos
 * @apiName Listar Productos
 * @apiGroup Producto
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
 *               "prod_id": "10",
 *               "prod_idCategoria": "2",
 *               "prod_nombre": "Pollo",
 *               "prod_codigoProducto": "01256",
 *               "prod_descripcionProducto": "Pollo",
 *               "prod_precioBase": "12.5",
 *               "prod_maxComponente": "0",
 *               "prod_minComponente": "0",
 *               "prod_idEstado": "1",
 *               "prod_idEstadoVisible": "1",
 *               "prod_idSucursal": "4",
 *               "prod_imagen": "empanadapollo.jpg"
 *            }
 *           ],
 *           "total": "10"
 *        }
 *
 */  

    $this->get('listar', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->getAll())
        );
    });
 /**
 * @api {get} producto/listarCat/{idCategoria} Listar Productos por Categoria
 * @apiName Listar Productos por Categoria
 * @apiGroup Producto
 *
 * @apiParam {number} idCategoria  id de la categoria en la cual se quiere recuperar los productos
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
 *               "prod_id": "10",
 *               "prod_idCategoria": "2",
 *               "prod_nombre": "Pollo",
 *               "prod_codigoProducto": "01256",
 *               "prod_descripcionProducto": "Pollo",
 *               "prod_precioBase": "12.5",
 *               "prod_maxComponente": "0",
 *               "prod_minComponente": "0",
 *               "prod_idEstado": "1",
 *               "prod_idEstadoVisible": "1",
 *               "prod_idSucursal": "4",
 *               "prod_imagen": "empanadapollo.jpg"
 *               },
 *           ],
 *           "total": "5"
 *        }
 *
 */    

    $this->get('listarCat/{idCategoria}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->getAllCat($args['idCategoria']))
        );
    });
   /**
 * @api {get} producto/listarComp/{idProducto} Listar Componentes por Producto
 * @apiName Listar Componentes por Producto
 * @apiGroup Producto
 *
 * @apiParam {number} idProducto  id del producto del cual se quiere recuperar los componentes
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
 *              "com_id": "4",
 *              "com_precio": "10",
 *              "com_idEstado": "1",
 *              "com_nombre": "Huevo",
 *              "com_descripcion": "ensaladas",
 *              "com_imagen": null
 *             },
 *           ],
 *           "total": "5"
 *        }
 *
 */     
    $this->get('listarComp/{idProducto}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->getAllComp($args['idProducto']))
        );
    });
      /**
 * @api {get} producto/listarCate  Listar todas las Categorias 
 * @apiName Listar Categorias
 * @apiGroup Producto
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
 *                      "cat_id": "5",
 *                      "cat_nombre": "Calzones",
 *                      "cat_descripcion": "calzones",
 *                      "cat_idEstado": "1",
 *                      "cat_imagen": "calzones.png"
 *              },
 *        }
 *
 */   
    $this->get('listarCate', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->getAllCate())
        );
    });
    $this->get('listarNotComp/{idProducto}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->getAllNotComp($args['idProducto']))
        );
    });
     /**
 * @api {get} producto/listarVar/{idProducto}  Listar Variedades del Producto 
 * @apiName Listar Variedades por Producto
 * @apiGroup Producto
 *
 *
 * @apiParam {number} idProducto  id del producto del cual se quiere recuperar las Variedades
 *
 * @apiSuccess {Object[]} array registros consultados.
 *
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *         -0:{ "var_id": "3",
 *              "var_idProducto": "1",
 *              "var_nombre": "Grande",
 *              "var_descripcion": "",
 *              "var_tipo": "Tamaño",
 *              "var_precio": "135"
 *             }
 *        },
 *
 */   
    $this->get('listarVar/{idProducto}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->getAllVar($args['idProducto']))
        );
    });
 /**
 * @api {get} producto/listarSuc/{idSucursal} Listar Productos por Sucursal
 * @apiName Listar Productos por Sucursal
 * @apiGroup Producto
 *
 * @apiParam {number} idSucursal  id de la sucursal en la cual se quiere recuperar los productos
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
 *               "prod_id": "10",
 *               "prod_idCategoria": "2",
 *               "prod_nombre": "Pollo",
 *               "prod_codigoProducto": "01256",
 *               "prod_descripcionProducto": "Pollo",
 *               "prod_precioBase": "12.5",
 *               "prod_maxComponente": "0",
 *               "prod_minComponente": "0",
 *               "prod_idEstado": "1",
 *               "prod_idEstadoVisible": "1",
 *               "prod_idSucursal": "4",
 *               "prod_imagen": "empanadapollo.jpg"
 *               },
 *           ],
 *           "total": "5"
 *        }
 *
 */    
    $this->get('listarSuc/{idSucursal}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->getAllSuc($args['idSucursal']))
        );
    });
 /**
 * @api {get} producto/obtener/{idProducto} Obtener Producto
 * @apiName Obtener Producto
 * @apiGroup Producto
 *
 * @apiParam {number} idProducto  id del producto que se quiere obtener 
 *
 * @apiSuccess {Object[]} data registro consultado.
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *          
 *               "prod_id": "10",
 *               "prod_idCategoria": "2",
 *               "prod_nombre": "Pollo",
 *               "prod_codigoProducto": "01256",
 *               "prod_descripcionProducto": "Pollo",
 *               "prod_precioBase": "12.5",
 *               "prod_maxComponente": "0",
 *               "prod_minComponente": "0",
 *               "prod_idEstado": "1",
 *               "prod_idEstadoVisible": "1",
 *               "prod_idSucursal": "4",
 *               "prod_imagen": "empanadapollo.jpg"
 *        
 *        }
 *
 */    
    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->get($args['id']))
        );
    });

    $this->post('insertar', function ($req, $res, $args) {
        $r = ProductoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->insert($req->getParsedBody()))
        );
    });

    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = ProductoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }

//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->update($req->getParsedBody(), $args['id']))
        );
    });

    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->delete($args['id']))
        );
    });

    $this->post('insertarcomp', function ($req, $res, $args) {
        $r = ProductoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->insertComp($req->getParsedBody()))
        );
    });
    
    $this->delete('eliminarcomp/{idProd}/{idComp}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->deleteComp($args['idProd'], $args['idComp']))
        );
    });
});
//->add(new AuthMiddleware($app));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

