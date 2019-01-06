<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Lib\Emaillib,
    App\Middleware\AuthMiddleware;

$app->group('/auth/', function () {

    /**
     * @api {post} auth/autenticar/ Autenticar el usuario
     * @apiName autenticar
     * @apiGroup auth
     *
     * @apiParam {String} Correo  Direccion de correo del Usuario.
     * @apiParam {String} Password    Password del Usuario.
     *
     * @apiSuccess {String} result datos de interes.
     * @apiSuccess {Boolean} response   resultado del llamado.
     * @apiSuccess {String} message     mesaje informativo.
     * @apiSuccess {String[]} errors   errores de validacion.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "result": token,
     *       "response": "true"
     *       "message": "Credenciales Validas"
     *       "errors": []
     *     }
     *
     */
    $this->post('autenticar', function ($req, $res, $args) {
        $parametros = $req->getParsedBody();

        //  var_dump($parametros);
        return $res->withHeader('Content-type', 'application/json')
                        ->withHeader('Access-Control-Allow-Origin', '*')
                        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                        ->write(
                                json_encode($this->model->auth->autenticar($parametros['Correo'], $parametros['Password']))
        );
    });
    $this->post('registrar', function ($req, $res, $args) {
        $parametros = $req->getParsedBody();

        //  var_dump($parametros);
        return $res->withHeader('Content-type', 'application/json')
                        ->withHeader('Access-Control-Allow-Origin', '*')
                        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                        ->write(
                                json_encode($this->model->auth->registrar($parametros))
        );
    });

    $this->get('recuperar/{l}', function ($req, $res, $args) {
        //  var_dump($parametros);
        return $res->withHeader('Content-type', 'application/json')
                        ->withHeader('Access-Control-Allow-Origin', '*')
                        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                        ->write(
                                json_encode($this->model->auth->recuperarPassword($args['l']))
        );
    });
});
