<?php
use App\Lib\Auth,
    App\Lib\Response,
    App\Middleware\AuthMiddleware;

$app->group('/auth/', function () {
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
});