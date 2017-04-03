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
