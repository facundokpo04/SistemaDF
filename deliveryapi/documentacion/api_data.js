define({ "api": [
  {
    "type": "post",
    "url": "categoria/insertar",
    "title": "Insertar una  Categoria",
    "name": "Insertar_Categoria",
    "group": "Categoria",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "cat_nombre",
            "description": "<p>Nombre de la categoria</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "cat_descripcion",
            "description": "<p>Breve descripcion de la categoria</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "cat_idEstado",
            "description": "<p>id del estado de la categoria 1 habilitada 2 deshabilitada</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "cat_imagen",
            "description": "<p>nombre de la imagen de la categoria con su extension</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "result",
            "description": "<p>id de la categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "response",
            "description": "<p>resultado del llamado.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>mesaje informativo.</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "errors",
            "description": "<p>errores de validacion.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"result\": 1\n  \"response\": \"true\"\n  \"message\": \"\"\n  \"errors\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/categoria_route.php",
    "groupTitle": "Categoria"
  },
  {
    "type": "get",
    "url": "categoria/listar/{l}/{p}",
    "title": "Listar Categorias",
    "name": "Listar_Categorias",
    "group": "Categoria",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "l",
            "description": "<p>Cantidad de registros a listar</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "p",
            "description": "<p>Indice para listar</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>objectos consultados.</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "total",
            "description": "<p>cantidad de registros.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n      \"data\": [\n       {\n         \"cat_id\": \"5\",\n         \"cat_nombre\": \"Calzones\",\n         \"cat_descripcion\": \"calzones\",\n         \"cat_idEstado\": \"1\",\n         \"cat_imagen\": \"calzones.png\"\n       }\n      ],\n      \"total\": \"5\"\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/categoria_route.php",
    "groupTitle": "Categoria"
  },
  {
    "type": "get",
    "url": "categoria/obtener/{id}",
    "title": "Obtener Categoria",
    "name": "Obtener_Categoria",
    "group": "Categoria",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "id",
            "description": "<p>Id de la Categoria</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "cat_id",
            "description": "<p>id de la categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "cat_nombre",
            "description": "<p>nombre de la categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "cat_descripcion",
            "description": "<p>descripcion de la categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "cat_estado",
            "description": "<p>estado de la categoria 1 habilitado 2 deshabilitado.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "cat_imagen",
            "description": "<p>nombre de la imagen.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n    \"cat_id\": \"1\",\n    \"cat_nombre\": \"Hamburguesas\",\n    \"cat_descripcion\": \"hamburguesas\",\n    \"cat_idEstado\": \"1\",\n    \"cat_imagen\": \"hamburgesas.png\"\n      \n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/categoria_route.php",
    "groupTitle": "Categoria"
  },
  {
    "type": "put",
    "url": "pedidoencabezado/actualizar",
    "title": "Actualizar un detalle Pedido",
    "name": "Actualizar_Detalle_Pedido",
    "group": "Detalle_Pedido",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "dp_Cantidad",
            "description": "<p>cantidad de productos del detalle</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "dp_PrecioUnitario",
            "description": "<p>precio unitario del producto</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "dp_Total",
            "description": "<p>Precio unitario x cantidad</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "dp_idProductoPedido",
            "description": "<p>id del producto pedido</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "dp_idPedidoEncabezado",
            "description": "<p>id del encabezado del pedido</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "result",
            "description": "<p>id del Pedido.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "response",
            "description": "<p>resultado del llamado.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>mesaje informativo.</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "errors",
            "description": "<p>errores de validacion.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"result\": 1\n  \"response\": \"true\"\n  \"message\": \"\"\n  \"errors\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/detallepedido_route.php",
    "groupTitle": "Detalle_Pedido"
  },
  {
    "type": "post",
    "url": "pedidoencabezado/insertar",
    "title": "Insertar un Detalle Pedido",
    "name": "Insertar_Detalle_Pedido",
    "group": "Detalle_Pedido",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "dp_Cantidad",
            "description": "<p>cantidad de productos del detalle</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "dp_PrecioUnitario",
            "description": "<p>precio unitario del producto</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "dp_Total",
            "description": "<p>Precio unitario x cantidad</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "dp_idProductoPedido",
            "description": "<p>id del producto pedido</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "dp_idPedidoEncabezado",
            "description": "<p>id del encabezado del pedido</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "result",
            "description": "<p>id del Pedido.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "response",
            "description": "<p>resultado del llamado.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>mesaje informativo.</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "errors",
            "description": "<p>errores de validacion.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"result\": 1\n  \"response\": \"true\"\n  \"message\": \"\"\n  \"errors\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/detallepedido_route.php",
    "groupTitle": "Detalle_Pedido"
  },
  {
    "type": "post",
    "url": "productopedido/insertar",
    "title": "Insertar un Producto Pedido",
    "name": "Insertar_Producto_Pedido",
    "group": "Detalle_Pedido",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "float",
            "optional": false,
            "field": "pp_precioBase",
            "description": "<p>precio del producto</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "pp_idProducto",
            "description": "<p>id del producto</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "pp_idVariedad",
            "description": "<p>id de la variedad si es que tiene</p>"
          },
          {
            "group": "Parameter",
            "type": "float",
            "optional": false,
            "field": "pp_precioCalc",
            "description": "<p>precio de la variedad + los componentes</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "pp_aclaracion",
            "description": "<p>aclaracion del producto elegido</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "result",
            "description": "<p>id del Producto Pedido.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "response",
            "description": "<p>resultado del llamado.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>mesaje informativo.</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "errors",
            "description": "<p>errores de validacion.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"result\": 1\n  \"response\": \"true\"\n  \"message\": \"\"\n  \"errors\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/productopedido_route.php",
    "groupTitle": "Detalle_Pedido"
  },
  {
    "type": "get",
    "url": "detallepedido/listarPed/{id}",
    "title": "Listar los detalles de un pedido",
    "name": "Listar_Detalle_Pedido",
    "group": "Detalle_Pedido",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "id",
            "description": "<p>id del Pedido Encabezado que se desea listar el detalle</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>lista de detalles del pedido</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data.producto",
            "description": "<p>producto del detalle.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data.componentes",
            "description": "<p>componentes del detalle.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n -0:{\n    \"producto\": {\n         \"dp_id\": \"4\",\n         \"dp_Cantidad\": \"1\",\n         \"dp_PrecioUnitario\": \"216\",\n         \"dp_Total\": null,\n         \"dp_idProductoPedido\": \"7\",\n         \"dp_idPedidoEncabezado\": \"14\",\n         \"prod_nombre\": \"Muzzarella\",\n         \"prod_codigoProducto\": \"01256\",\n         \"prod_precioBase\": \"98\",\n         \"var_nombre\": \"Grande\",\n         \"var_precio\": \"108\"\n        },\n     \"componentes\": [\n        - 0:{\n             \"cpp_id\": \"3\",\n             \"cpp_idProductoPedido\": \"7\",\n             \"cpp_idComponente\": \"4\",\n             \"com_precio\": \"10\",\n             \"com_nombre\": \"Huevo\"\n         }\n     ],\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/detallepedido_route.php",
    "groupTitle": "Detalle_Pedido"
  },
  {
    "type": "get",
    "url": "detallepedido/obtener/{id}",
    "title": "Obtener Detalle",
    "name": "Obtener_Detalle",
    "group": "Detalle_Pedido",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "id",
            "description": "<p>Id del detalle</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "object",
            "optional": false,
            "field": "data",
            "description": "<p>detalle Pedido.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n      \"dp_id\": \"3\",\n      \"dp_Cantidad\": \"1\",\n      \"dp_PrecioUnitario\": \"50\",\n      \"dp_Total\": 250,\n      \"dp_idProductoPedido\": \"5\",\n      \"dp_idPedidoEncabezado\": \"13\"\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/detallepedido_route.php",
    "groupTitle": "Detalle_Pedido"
  },
  {
    "type": "get",
    "url": "productopedido/obtener/{id}",
    "title": "Obtener Producto Pedido",
    "name": "Obtener_Producto_Pedido",
    "group": "Detalle_Pedido",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "id",
            "description": "<p>Id del Producto Pedido</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "object",
            "optional": false,
            "field": "Producto",
            "description": "<p>Pedido.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n     \"pp_id\": \"5\",\n     \"pp_precioBase\": \"120\",\n     \"pp_idProducto\": \"1\",\n     \"pp_idVariedad\": \"3\",\n     \"pp_precioCalc\": \"255\",\n     \"pp_aclaracion\": \"sin queso\"  \n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/productopedido_route.php",
    "groupTitle": "Detalle_Pedido"
  },
  {
    "type": "put",
    "url": "direccion/actualizar/{id}",
    "title": "Actualizar una  Direccion",
    "name": "Actualizar_Direccion",
    "group": "Direccion",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "id",
            "description": "<p>id de la direccion para actualizar</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": true,
            "field": "dir_nombre",
            "description": "<p>Nombre del Lugar</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": true,
            "field": "dir_telefonoFijo",
            "description": "<p>Telefono fijo de la direccion</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": true,
            "field": "dir_latitud",
            "description": "<p>Latitud</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": true,
            "field": "dir_longitud",
            "description": "<p>Longitud</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": true,
            "field": "dir_idPersona",
            "description": "<p>id de la Persona</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": true,
            "field": "dir_direccion",
            "description": "<p>Direccion del Lugar</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": true,
            "field": "dir_aclaracion",
            "description": "<p>Aclaraciones sobre la direccion</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "result",
            "description": "<p>id de la direccion.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "response",
            "description": "<p>resultado del llamado.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>mesaje informativo.</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "errors",
            "description": "<p>errores de validacion.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"result\": 1\n  \"response\": \"true\"\n  \"message\": \"\"\n  \"errors\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/direccion_route.php",
    "groupTitle": "Direccion"
  },
  {
    "type": "delete",
    "url": "direccion/eliminar/{id}",
    "title": "Eliminar una  Direccion",
    "name": "Eliminar_Direccion",
    "group": "Direccion",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "id",
            "description": "<p>id de la direccion para eliminar</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "result",
            "description": "<p>id de la direccion.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "response",
            "description": "<p>resultado del llamado.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>mesaje informativo.</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "errors",
            "description": "<p>errores de validacion.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"result\": 1\n  \"response\": \"true\"\n  \"message\": \"\"\n  \"errors\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/direccion_route.php",
    "groupTitle": "Direccion"
  },
  {
    "type": "post",
    "url": "direccion/insertar",
    "title": "Insertar una  Direccion",
    "name": "Insertar_Direccion",
    "group": "Direccion",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "dir_nombre",
            "description": "<p>Nombre del Lugar</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "dir_telefonoFijo",
            "description": "<p>Telefono fijo de la direccion</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "dir_latitud",
            "description": "<p>Latitud</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "dir_longitud",
            "description": "<p>Longitud</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "dir_idPersona",
            "description": "<p>id de la Persona</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "dir_direccion",
            "description": "<p>Direccion del Lugar</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "dir_aclaracion",
            "description": "<p>Aclaraciones sobre la direccion</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "result",
            "description": "<p>id de la direccion.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "response",
            "description": "<p>resultado del llamado.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>mesaje informativo.</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "errors",
            "description": "<p>errores de validacion.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"result\": 1\n  \"response\": \"true\"\n  \"message\": \"\"\n  \"errors\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/direccion_route.php",
    "groupTitle": "Direccion"
  },
  {
    "type": "post",
    "url": "pedidoencabezado/insertar",
    "title": "Insertar un Pedido Encabezado",
    "name": "Insertar_Pedido_Encabezado",
    "group": "Pedido",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "pe_idCliente",
            "description": "<p>id del cliente</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "pe_idEmpleado",
            "description": "<p>id del empleado</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "pe_aclaraciones",
            "description": "<p>aclaraciones del pedido</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "pe_comentarios",
            "description": "<p>comentario sobre el pedido</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "pe_idEstado",
            "description": "<p>Estado del pedido 1 pendiente 2 preparado 3 en camino</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "pe_Total",
            "description": "<p>total del pedido</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "pe_idPersona",
            "description": "<p>id de la persona</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "pe_cli_tel",
            "description": "<p>tel del cliente</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "pe_idDireccion",
            "description": "<p>direccion del cliente</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "pe_medioPago",
            "description": "<p>Medio de pago del cliente</p>"
          },
          {
            "group": "Parameter",
            "type": "date",
            "optional": false,
            "field": "pe_fechaPedido",
            "description": "<p>fecha y hora que se creo el pedido</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "result",
            "description": "<p>id del Pedido.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "response",
            "description": "<p>resultado del llamado.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>mesaje informativo.</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "errors",
            "description": "<p>errores de validacion.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"result\": 1\n  \"response\": \"true\"\n  \"message\": \"\"\n  \"errors\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/pedidoencabezado_route.php",
    "groupTitle": "Pedido"
  },
  {
    "type": "get",
    "url": "pedidoencabezado/obtenercli/{id}",
    "title": "Obtener el Cliente del Pedido",
    "name": "Obtener_Cliente_Pedido",
    "group": "Pedido",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "id",
            "description": "<p>id del Pedido</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>registro consultado.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n     \n         \"per_id\": \"8\",\n         \"per_nombre\": \"facundo Andres Dominguez\",\n         \"per_email\": \"facundokpo04@gmail.com\",\n         \"per_documento\": 34060319,\n         \"per_password\": \"b9249ee15900c72b3938d6b8e3909103\",\n         \"per_nacionalidad\": \"Argentino\",\n         \"per_celular\": \"3758483058\",\n         \"per_perfilUsuario\": \"Cliente\",\n         \"dir_direccion\": \"jj valle 167\",\n         \"dir_telefonoFijo\": \"420769\"\n   \n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/pedidoencabezado_route.php",
    "groupTitle": "Pedido"
  },
  {
    "type": "get",
    "url": "pedidoencabezado/obtener/{id}",
    "title": "Obtener el Encabezado del Pedido",
    "name": "Obtener_Pedido_Encabezado",
    "group": "Pedido",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "id",
            "description": "<p>id del Pedido Encabezado que se desea Obtener</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>registro consultado.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n     \n         \"pe_id\": \"13\",\n          \"pe_idCliente\": \"8\",\n          \"pe_idEmpleado\": 12,\n          \"pe_aclaraciones\": \"Facturar a nombre de .. \",\n          \"pe_comentarios\": \"Exelente llego muy rapido \",\n          \"pe_idEstado\": \"1\",\n          \"pe_Total\": 250,\n          \"pe_idPersona\": \"8\",\n          \"pe_cli_tel\": \"3758483058\",\n          \"pe_idDireccion\": \"3\",\n          \"pe_medioPago\": \"Tarjeta Debito\",\n          \"pe_fechaPedido\": 12/04/17,\n          \"per_nombre\": \"facundo Andres Dominguez\",\n          \"per_documento\": 34060319,\n          \"dir_telefonoFijo\": \"420769\",\n          \"dir_direccion\": \"jj valle 167\",\n          \"relacion\": \"pedidoestado\",\n          \"descripcion\": \"Pendiente\"\n   \n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/pedidoencabezado_route.php",
    "groupTitle": "Pedido"
  },
  {
    "type": "get",
    "url": "persona/listardir/{id}",
    "title": "Listar todas las direcciones por persona",
    "name": "Listar_Direcciones_por_Persona",
    "group": "Persona",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "array",
            "description": "<p>registros consultados.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n        -0: {\n                 \"dir_id\": \"3\",\n                 \"dir_nombre\": \"Casa\",\n                 \"dir_telefonoFijo\": \"420769\",\n                 \"dir_latitud\": \"13254\",\n                 \"dir_longitud\": \"45645\",\n                 \"dir_idPersona\": \"8\",\n                 \"dir_direccion\": \"jj valle 167\",\n                 \"dir_aclaracion\": null\n           },\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/persona_route.php",
    "groupTitle": "Persona"
  },
  {
    "type": "get",
    "url": "persona/listar/{l}/{p}",
    "title": "Listar Personas",
    "name": "Listar_Personas",
    "group": "Persona",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "l",
            "description": "<p>Cantidad de registros a listar</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "p",
            "description": "<p>Indice para listar</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>objectos consultados.</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "total",
            "description": "<p>cantidad de registros.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n      \"data\": [\n       {\n         \"per_id\": \"9\",\n         \"per_nombre\": \"facundo Andres Dominguez\",\n         \"per_email\": \"admin@admin.com\",\n         \"per_documento\": null,\n         \"per_password\": \"b9249ee15900c72b3938d6b8e3909103\",\n         \"per_nacionalidad\": null,\n         \"per_celular\": \"3758483058\",\n         \"per_perfilUsuario\": \"Admin\"\n       }\n      ],\n      \"total\": \"5\"\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/persona_route.php",
    "groupTitle": "Persona"
  },
  {
    "type": "get",
    "url": "producto/listarCate",
    "title": "Listar todas las Categorias",
    "name": "Listar_Categorias",
    "group": "Producto",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "array",
            "description": "<p>registros consultados.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n        -0: {\n                 \"cat_id\": \"5\",\n                 \"cat_nombre\": \"Calzones\",\n                 \"cat_descripcion\": \"calzones\",\n                 \"cat_idEstado\": \"1\",\n                 \"cat_imagen\": \"calzones.png\"\n         },\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/producto_route.php",
    "groupTitle": "Producto"
  },
  {
    "type": "get",
    "url": "producto/listarComp/{idProducto}",
    "title": "Listar Componentes por Producto",
    "name": "Listar_Componentes_por_Producto",
    "group": "Producto",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "idProducto",
            "description": "<p>id del producto del cual se quiere recuperar los componentes</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>registros consultados.</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "total",
            "description": "<p>cantidad de registros.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n      \"data\": [\n       {\n         \"com_id\": \"4\",\n         \"com_precio\": \"10\",\n         \"com_idEstado\": \"1\",\n         \"com_nombre\": \"Huevo\",\n         \"com_descripcion\": \"ensaladas\",\n         \"com_imagen\": null\n        },\n      ],\n      \"total\": \"5\"\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/producto_route.php",
    "groupTitle": "Producto"
  },
  {
    "type": "get",
    "url": "producto/listar",
    "title": "Listar Productos",
    "name": "Listar_Productos",
    "group": "Producto",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>registros consultados.</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "total",
            "description": "<p>cantidad de registros.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n      \"data\": [\n       {\n          \"prod_id\": \"10\",\n          \"prod_idCategoria\": \"2\",\n          \"prod_nombre\": \"Pollo\",\n          \"prod_codigoProducto\": \"01256\",\n          \"prod_descripcionProducto\": \"Pollo\",\n          \"prod_precioBase\": \"12.5\",\n          \"prod_maxComponente\": \"0\",\n          \"prod_minComponente\": \"0\",\n          \"prod_idEstado\": \"1\",\n          \"prod_idEstadoVisible\": \"1\",\n          \"prod_idSucursal\": \"4\",\n          \"prod_imagen\": \"empanadapollo.jpg\"\n       }\n      ],\n      \"total\": \"10\"\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/producto_route.php",
    "groupTitle": "Producto"
  },
  {
    "type": "get",
    "url": "producto/listarCat/{idCategoria}",
    "title": "Listar Productos por Categoria",
    "name": "Listar_Productos_por_Categoria",
    "group": "Producto",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "idCategoria",
            "description": "<p>id de la categoria en la cual se quiere recuperar los productos</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>registros consultados.</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "total",
            "description": "<p>cantidad de registros.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n      \"data\": [\n       {\n          \"prod_id\": \"10\",\n          \"prod_idCategoria\": \"2\",\n          \"prod_nombre\": \"Pollo\",\n          \"prod_codigoProducto\": \"01256\",\n          \"prod_descripcionProducto\": \"Pollo\",\n          \"prod_precioBase\": \"12.5\",\n          \"prod_maxComponente\": \"0\",\n          \"prod_minComponente\": \"0\",\n          \"prod_idEstado\": \"1\",\n          \"prod_idEstadoVisible\": \"1\",\n          \"prod_idSucursal\": \"4\",\n          \"prod_imagen\": \"empanadapollo.jpg\"\n          },\n      ],\n      \"total\": \"5\"\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/producto_route.php",
    "groupTitle": "Producto"
  },
  {
    "type": "get",
    "url": "producto/listarSuc/{idSucursal}",
    "title": "Listar Productos por Sucursal",
    "name": "Listar_Productos_por_Sucursal",
    "group": "Producto",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "idSucursal",
            "description": "<p>id de la sucursal en la cual se quiere recuperar los productos</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>registros consultados.</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "total",
            "description": "<p>cantidad de registros.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n      \"data\": [\n       {\n          \"prod_id\": \"10\",\n          \"prod_idCategoria\": \"2\",\n          \"prod_nombre\": \"Pollo\",\n          \"prod_codigoProducto\": \"01256\",\n          \"prod_descripcionProducto\": \"Pollo\",\n          \"prod_precioBase\": \"12.5\",\n          \"prod_maxComponente\": \"0\",\n          \"prod_minComponente\": \"0\",\n          \"prod_idEstado\": \"1\",\n          \"prod_idEstadoVisible\": \"1\",\n          \"prod_idSucursal\": \"4\",\n          \"prod_imagen\": \"empanadapollo.jpg\"\n          },\n      ],\n      \"total\": \"5\"\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/producto_route.php",
    "groupTitle": "Producto"
  },
  {
    "type": "get",
    "url": "producto/listarVar/{idProducto}",
    "title": "Listar Variedades del Producto",
    "name": "Listar_Variedades_por_Producto",
    "group": "Producto",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "idProducto",
            "description": "<p>id del producto del cual se quiere recuperar las Variedades</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "array",
            "description": "<p>registros consultados.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n    -0:{ \"var_id\": \"3\",\n         \"var_idProducto\": \"1\",\n         \"var_nombre\": \"Grande\",\n         \"var_descripcion\": \"\",\n         \"var_tipo\": \"Tamaño\",\n         \"var_precio\": \"135\"\n        }\n   },",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/producto_route.php",
    "groupTitle": "Producto"
  },
  {
    "type": "get",
    "url": "producto/obtener/{idProducto}",
    "title": "Obtener Producto",
    "name": "Obtener_Producto",
    "group": "Producto",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "idProducto",
            "description": "<p>id del producto que se quiere obtener</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>registro consultado.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n     \n          \"prod_id\": \"10\",\n          \"prod_idCategoria\": \"2\",\n          \"prod_nombre\": \"Pollo\",\n          \"prod_codigoProducto\": \"01256\",\n          \"prod_descripcionProducto\": \"Pollo\",\n          \"prod_precioBase\": \"12.5\",\n          \"prod_maxComponente\": \"0\",\n          \"prod_minComponente\": \"0\",\n          \"prod_idEstado\": \"1\",\n          \"prod_idEstadoVisible\": \"1\",\n          \"prod_idSucursal\": \"4\",\n          \"prod_imagen\": \"empanadapollo.jpg\"\n   \n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/producto_route.php",
    "groupTitle": "Producto"
  },
  {
    "type": "get",
    "url": "producto/url/",
    "title": "Obtener Url",
    "name": "Obtener_Url",
    "group": "Producto",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data",
            "description": "<p>url de la ubicacion de las imagenes de los productos.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n      \"http%3A%2F%2F35.184.187.29%2FdelBo%2Fassets%2Fimagenes%2Fproducto\"\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/producto_route.php",
    "groupTitle": "Producto"
  },
  {
    "type": "get",
    "url": "promo/listarprod/{id}",
    "title": "Listar todas los Productos de una promo",
    "name": "Listar_Productos_Promo",
    "group": "Promo",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "array",
            "description": "<p>registros consultados.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n        -0: {\n               \"ppro_id\": \"1\",\n               \"ppro_idPromo\": \"1\",\n               \"ppro_idProducto\": \"7\",\n               \"prod_id\": \"7\",\n               \"prod_nombre\": \"Arabe\",\n               \"prod_descripcionProducto\": \"Muzzarela, salsa y aceitunas\",\n               \"prod_precioBase\": \"12.5\",\n               \"prod_imagen\": \"pizzanapolitana.jpg\"\n         },\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/promo_route.php",
    "groupTitle": "Promo"
  },
  {
    "type": "get",
    "url": "promos/listar",
    "title": "Listar Promos",
    "name": "Listar_Promos",
    "group": "Promo",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>registros consultados.</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "total",
            "description": "<p>cantidad de registros.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n      \"data\": [\n       {\n        \"pro_id\": \"3\",\n        \"pro_nombre\": \"Promo3\",\n        \"pro_descripcion\": \"2 pizzas + 1 gaseosa\",\n        \"pro_precio\": 250,\n        \"pro_descuento\": 40,\n        \"pro_FechaInicio\": \"23/02/2017\",\n        \"pro_FechaFin\": \"23/02/2017\",\n        \"pro_imagen\": \"promo3.jpg\",\n        \"pro_idEstado\": 1\n       }\n      ],\n      \"total\": \"10\"\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/promo_route.php",
    "groupTitle": "Promo"
  },
  {
    "type": "get",
    "url": "promo/obtener/{idPromo}",
    "title": "Obtener Promo",
    "name": "Obtener_Promo",
    "group": "Promo",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "idPromo",
            "description": "<p>id de la promo que se quiere obtener</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>registro consultado.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n     \n          \"pro_id\": \"1\",\n          \"pro_nombre\": \"Promo1\",\n          \"pro_descripcion\": \"\",\n          \"pro_precio\": \"0\",\n          \"pro_descuento\": \"0\",\n          \"pro_FechaInicio\": \"01/01/1970\",\n          \"pro_FechaFin\": \"01/01/1970\",\n          \"pro_imagen\": \"promo1.jpg\",\n          \"pro_idEstado\": 1\n   \n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/promo_route.php",
    "groupTitle": "Promo"
  },
  {
    "type": "get",
    "url": "promo/url/",
    "title": "Obtener Url",
    "name": "Obtener_Url",
    "group": "Promo",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data",
            "description": "<p>url de la ubicacion de las imagenes de las promos.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n      \"http%3A%2F%2F35.184.187.29%2FdelBo%2Fassets%2Fimagenes%2Fproducto\"\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/promo_route.php",
    "groupTitle": "Promo"
  },
  {
    "type": "post",
    "url": "promopedido/insertarprodp",
    "title": "Insertar ProductoPedio a una PromoPedido",
    "name": "Insertar_ProductoPedio_a_PromoPedido",
    "group": "Promo_Pedido",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "ppp_idProductoP",
            "description": "<p>id  del ProductoP elegido</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "ppp_idPromoP",
            "description": "<p>id de la PromoP elegida</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "result",
            "description": "<p>id del  ProductoPromoPedido.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "response",
            "description": "<p>resultado del llamado.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>mesaje informativo.</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "errors",
            "description": "<p>errores de validacion.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"result\": 1\n  \"response\": \"true\"\n  \"message\": \"Exito\"\n  \"errors\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/promopedido_route.php",
    "groupTitle": "Promo_Pedido"
  },
  {
    "type": "post",
    "url": "promopedido/insertar",
    "title": "Insertar una Promo Pedido",
    "name": "Insertar_Promo_Pedido",
    "group": "Promo_Pedido",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "ppro_nombre",
            "description": "<p>nombre de la promo elegida</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "ppro_precioUnitario",
            "description": "<p>precio unitario de la promo</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "ppro_cantidad",
            "description": "<p>cantidad de la promo elegida</p>"
          },
          {
            "group": "Parameter",
            "type": "float",
            "optional": false,
            "field": "ppro_idPromo",
            "description": "<p>id de la promo elegida</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "ppro_idPedidoEncabezado",
            "description": "<p>id del pedido encabezado</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "ppro_detallePp",
            "description": "<p>detalle de lo elegido por producto de promo algo descriptivo</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "ppro_total",
            "description": "<p>precio total de la promo</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "ppro_precioBase",
            "description": "<p>precio base de los productos de la promo</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "ppro_aclaracion",
            "description": "<p>aclaracion sobre la promo elegida</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "result",
            "description": "<p>id de la Promo Pedido.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "response",
            "description": "<p>resultado del llamado.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>mesaje informativo.</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "errors",
            "description": "<p>errores de validacion.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"result\": 1\n  \"response\": \"true\"\n  \"message\": \"Exito\"\n  \"errors\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/promopedido_route.php",
    "groupTitle": "Promo_Pedido"
  },
  {
    "type": "get",
    "url": "promopedido/listarprod/{idPromoPedido}",
    "title": "Listar los productos de una promopedido",
    "name": "Listar_ProductosP_PromoPedido",
    "group": "Promo_Pedido",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "idPromoPedido",
            "description": "<p>id de la PromoPedido que se quiere listar los productos</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "arrat",
            "description": "<p>lista de ProductosPedido de la PromoPedido</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n -0:{       \n     \"ppp_id\": \"1\",\n     \"ppp_idProductoP\": \"5\",\n     \"ppp_idPromoP\": \"1\",\n     \"pp_id\": \"5\",\n     \"pp_idVariedad\": \"3\",\n     \"var_nombre\": \"Grande\",\n     \"pp_aclaracion\": \"Alguna Aclaracion\",\n     \"prod_id\": \"1\",\n     \"prod_nombre\": \"Napolitana\",\n     \"prod_descripcionProducto\": \"Muzzarela, salsa ajo y rodajas de tomate\",\n     \"prod_precioBase\": \"120\",\n     \"prod_idCategoria\": \"3\"\n     }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/promopedido_route.php",
    "groupTitle": "Promo_Pedido"
  },
  {
    "type": "get",
    "url": "diahorario/obtener/{id}",
    "title": "Obtener DiaHorario",
    "name": "Obtener_DiaHorario",
    "group": "Sucursal",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "id",
            "description": "<p>Id del diahorario</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "dh_id",
            "description": "<p>id del DH.</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "dh_diaSemana",
            "description": "<p>dia de la semana 1-lunes.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "dh_horaApertura",
            "description": "<p>hora de apertura del delivery.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "dh_horaCierre",
            "description": "<p>hora del cierre del delivery.</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "dh_idSucursal",
            "description": "<p>id de la sucursal.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n    \"dh_id\": \"1\",\n    \"dh_diaSemana\": \"1\",\n    \"dh_horaApertura\": \"11:00\",\n    \"dh_horaCierre\": \"21:00\",\n    \"dh_idSucursal\": \"4\"\n      \n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/diahorario_route.php",
    "groupTitle": "Sucursal"
  },
  {
    "type": "get",
    "url": "sucursal/obtener/{idSucursal}",
    "title": "Obtener Horarios",
    "name": "Obtener_Horarios",
    "group": "Sucursal",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "idSucursal",
            "description": "<p>Id de la sucursal</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>registros consultados.</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "total",
            "description": "<p>cantidad de registros.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n \"data\": [\n  -0:{\n         \"dh_id\": \"1\",\n         \"dh_diaSemana\": \"1\",\n         \"dh_horaApertura\": \"11:00\",\n         \"dh_horaCierre\": \"21:00\",\n         \"dh_idSucursal\": \"4\"\n     },\n  -1:{\n         \"dh_id\": \"3\",\n         \"dh_diaSemana\": \"2\",\n         \"dh_horaApertura\": \"10:00\",\n         \"dh_horaCierre\": \"21:00\",\n         \"dh_idSucursal\": \"4\"\n      }\n          ],\n \"total\": \"7\"\n    }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/diahorario_route.php",
    "groupTitle": "Sucursal"
  },
  {
    "type": "get",
    "url": "sucursal/obtener/{idSucursal}",
    "title": "Obtener Sucursal",
    "name": "Obtener_Sucursal",
    "group": "Sucursal",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "idSucursal",
            "description": "<p>Id de la sucursal</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>objecto consultado.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n     \"suc_id\": \"4\",\n     \"suc_nombre\": \"Centro Iguazu\",\n     \"suc_cuit\": \"2035978\",\n     \"suc_razonSocial\": \"Pizza Color Delivery\",\n     \"suc_idEmpresa\": \"1\",\n     \"suc_direccion\": \"jj valle 167\"\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/sucursal_route.php",
    "groupTitle": "Sucursal"
  },
  {
    "type": "post",
    "url": "auth/autenticar/",
    "title": "Autenticar el usuario",
    "name": "autenticar",
    "group": "auth",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Correo",
            "description": "<p>Direccion de correo del Usuario.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Password",
            "description": "<p>Password del Usuario.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "result",
            "description": "<p>datos de interes.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "response",
            "description": "<p>resultado del llamado.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>mesaje informativo.</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "errors",
            "description": "<p>errores de validacion.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"result\": token,\n  \"response\": \"true\"\n  \"message\": \"Credenciales Validas\"\n  \"errors\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/route/auth_route.php",
    "groupTitle": "auth"
  }
] });
