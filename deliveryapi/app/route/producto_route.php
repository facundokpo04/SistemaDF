<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\ProductoValidation,
    App\Middleware\AuthMiddleware;

$app->group('/producto/', function () {


    $this->get('listar', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->getAll())
        );
    });


    $this->get('listarCat/{idCategoria}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->getAllCat($args['idCategoria']))
        );
    });
    
    $this->get('listarComp/{idProducto}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->getAllComp($args['idProducto']))
        );
    });
    
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
    
     $this->get('listarVar/{idProducto}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->getAllVar($args['idProducto']))
        );
    });
    
     $this->get('listarSuc/{idSucursal}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->producto->getAllSuc($args['idSucursal']))
        );
    });

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
                                json_encode($this->model->producto->deleteComp($args['idProd'],$args['idComp']))
        );
    });
    
});
//->add(new AuthMiddleware($app));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

