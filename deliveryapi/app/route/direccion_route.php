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

    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->direccion->delete($args['id']))
        );
    });
});
