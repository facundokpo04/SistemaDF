<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\DatoContactoValidation,
    App\Middleware\AuthMiddleware;

$app->group('/datocontacto/', function () {

    // id de la sucursal

    $this->get('listartelsuc/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->getAll($args['id']))
        );
    });

    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->get($args['id']))
        );
    });

    $this->get('obtenersuc/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->getDcSuc($args['id']))
        );
    });

    $this->post('insertar', function ($req, $res, $args) {
        $r = DatoContactoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->insert($req->getParsedBody()))
        );
    });
    $this->post('insertartel', function ($req, $res, $args) {
        $r = DatoContactoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }
//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->insertTelCon($req->getParsedBody()))
        );
    });

    $this->put('actualizartel/{id}', function ($req, $res, $args) {
        $r = DatoContactoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }

//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->updateTelCon($req->getParsedBody(), $args['id']))
        );
    });

    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = DatoContactoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                            ->withStatus(422)
                            ->write(json_encode($r->errors));
        }

//        
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->update($req->getParsedBody(), $args['id']))
        );
    });

    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->delete($args['id']))
        );
    });

    $this->delete('eliminartel/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(
                                json_encode($this->model->datocontacto->deleteTelCon($args['id']))
        );
    });
});
