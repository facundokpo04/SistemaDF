<?php
use App\Lib\Auth,
    App\Lib\Response,
    App\Middleware\AuthMiddleware;

$app->group('/auth/', function () {
    $this->post('autenticar', function ($req, $res, $args) {
        $parametros = $req->getParsedBody();        
      
      //  var_dump($parametros);
        return $res->withHeader('Content-type', 'application/json')
                   ->write(
                     json_encode($this->model->auth->autenticar($parametros['Correo'], $parametros['Password']))
                   );
    });
});