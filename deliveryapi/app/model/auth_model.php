<?php

namespace App\Model;

use App\Lib\Response,
    App\Lib\Auth,
    App\Lib\Email;

class AuthModel {

    private $db;
    private $table = 'persona';
    private $response;

    public function __CONSTRUCT($db) {
        $this->db = $db;
        $this->response = new Response();
    }

    public function autenticar($correo, $password) {
        $password = md5($password);
        $persona = $this->db->from($this->table)
                ->where('per_email', $correo)
                ->where('per_password', $password)//faltaria poner el  md5($password)
                ->fetch();

        if (is_object($persona)) {
            $nombre = explode(' ', $persona->per_nombre)[0];
//            var_dump($persona);
            $token = Auth::SignIn([
                        'id' => $persona->per_id,
                        'Nombre' => $nombre,
                        'NombreCompleto' => $persona->per_nombre,
                        //'Imagen' => $empleado->Imagen, LO DEJAMOS COMENTADO PORQUE HACE GENERAR UN TOKEN DEMASIADO GRANDE
                        'Perfil' => $persona->per_perfilUsuario,
                        'Celular' => $persona->per_celular,
                        'email' => $persona->per_email
            ]);
//var_dump($token);
            $this->response->result = $token;

            return $this->response->SetResponse(true, 'Credenciales Validas', $token);
        } else {
            return $this->response->SetResponse(false, "Credenciales no válidas");
        }
    }

    public function registrar($data) {

        $correo = $data['per_email'];
//        $password = md5($data['per_password']);
        //$password = md5($password);
        $persona = $this->db->from($this->table)
                ->where('per_email', $correo)
                ->fetch();
        if (is_object($persona)) {
            return $this->response->SetResponse(false, "Ya existe un usuario con ese Correo");
        } else {


            $query = $query = $this->db->insertInto($this->table, [
                        'per_nombre' => $data['per_nombre'],
                        'per_email' => $correo, // No podemos asumir que esta data enviada desde el cliente es CORRECTA,
                        'per_documento' => '1',
                        'per_password' => $data['per_password'],
                        //'per_nacionalidad' => 'ARG',
                        'per_nacionalidad' => $data['per_nacionalidad'],
                        'per_celular' => $data['per_celular'],
                        'per_perfilUsuario' => 'Cliente',
                    ])
                    ->execute();

            return $this->response->SetResponse(true, 'Registro Exitoso', $query);
        }
    }

    public function recuperarPassword($correo) {

        $persona = $this->db->from($this->table)
                ->where('per_email', $correo)
                ->fetch();

        if (is_object($persona)) {
            $password = $persona->per_password;

            $respuesta = Email::SendEmail($correo, $password);

            if ($respuesta) {
                return $this->response->SetResponse(true, 'El password fue enviado a ' . $correo);
            } else {
                 return $this->response->SetResponse(true, 'No fue posible reestablecer la contraseña con ese correo');
            }
        } else {
            return $this->response->SetResponse(false, "Su correo no esta registrado");
        }
    }

}
