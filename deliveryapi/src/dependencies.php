<?php

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};

// Database
$container['db'] = function($c) {
    $connectionString = $c->get('settings')['connectionString'];

    $pdo = new PDO($connectionString['dns'], $connectionString['user'], $connectionString['pass']);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return new FluentPDO($pdo);
};

// Models
$container['model'] = function($c) {
    return (object) [
                'test' => new App\Model\TestModel($c->db),
                'auth' => new App\Model\AuthModel($c->db),
                'categoria' => new App\Model\CategoriaModel($c->db),
                'persona' => new App\Model\PersonaModel($c->db),
                'empresa' => new App\Model\EmpresaModel($c->db),
                'sucursal' => new App\Model\SucursalModel($c->db),
                'diahorario' => new App\Model\DiahorarioModel($c->db),
                'empleado' => new App\Model\EmpleadoModel($c->db),
                'parametros' => new App\Model\ParametrosModel($c->db),
                'componente' => new App\Model\ComponenteModel($c->db),
                'producto' => new App\Model\ProductoModel($c->db),
                'promo' => new App\Model\PromoModel($c->db),
                'variedad' => new App\Model\VariedadModel($c->db),
                'componenteppedido' => new App\Model\ComponentePPedidoModel($c->db),
                'listaproductopromopedido' => new App\Model\ListaProductoPromoPedidoModel($c->db),
                'productopedido' => new App\Model\ProductoPedidoModel($c->db),
                'pedidoencabezado' => new App\Model\PedidoEncabezadoModel($c->db),
                'productopromo' => new App\Model\ProductoPromoModel($c->db),
                'direccion' => new App\Model\DireccionModel($c->db),
                'detallepedido' => new App\Model\DetallePedidoModel($c->db)
    ];
};
