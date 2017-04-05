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
          "content": "HTTP/1.1 200 OK\n  {\n     \n         \"per_id\": \"8\",\n         \"per_nombre\": \"facundo Andres Dominguez\",\n         \"per_email\": \"facundokpo04@gmail.com\",\n         \"per_documento\": null,\n         \"per_password\": \"b9249ee15900c72b3938d6b8e3909103\",\n         \"per_nacionalidad\": \"Argentino\",\n         \"per_celular\": \"3758483058\",\n         \"per_perfilUsuario\": \"Cliente\",\n         \"dir_direccion\": \"jj valle 167\",\n         \"dir_telefonoFijo\": \"420769\"\n   \n   }",
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
          "content": "HTTP/1.1 200 OK\n  {\n     \n         \"pe_id\": \"13\",\n          \"pe_idCliente\": \"8\",\n          \"pe_idEmpleado\": null,\n          \"pe_aclaraciones\": \"Facturar a nombre de .. \",\n          \"pe_comentarios\": \"Exelente llego muy rapido \",\n          \"pe_idEstado\": \"1\",\n          \"pe_Total\": 250,\n          \"pe_idPersona\": \"8\",\n          \"pe_cli_tel\": \"3758483058\",\n          \"pe_idDireccion\": \"3\",\n          \"pe_medioPago\": \"Tarjeta Debito\",\n          \"pe_fechaPedido\": null,\n          \"per_nombre\": \"facundo Andres Dominguez\",\n          \"per_documento\": 34060319,\n          \"dir_telefonoFijo\": \"420769\",\n          \"dir_direccion\": \"jj valle 167\",\n          \"relacion\": \"pedidoestado\",\n          \"descripcion\": \"Pendiente\"\n   \n   }",
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
