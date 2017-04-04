define({ "api": [
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
  },
  {
    "type": "post",
    "url": "categoria/insertar",
    "title": "Insertar una  Categoria",
    "name": "Insertar_Categoria",
    "group": "categoria",
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
    "groupTitle": "categoria"
  },
  {
    "type": "get",
    "url": "categoria/listar/{l}/{p}",
    "title": "Listar Categorias",
    "name": "Listar_Categorias",
    "group": "categoria",
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
    "groupTitle": "categoria"
  },
  {
    "type": "get",
    "url": "categoria/obtener/{id}",
    "title": "Obtener Categoria",
    "name": "Obtener_Categoria",
    "group": "categoria",
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
    "groupTitle": "categoria"
  }
] });
