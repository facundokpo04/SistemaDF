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
  }
] });
