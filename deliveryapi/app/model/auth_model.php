<?php

namespace App\Model;

use App\Lib\Response,
    App\Lib\Auth;

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
                        'Celular' =>$persona->per_celular,
                        'email' =>$persona->per_email
            ]);
//var_dump($token);
            $this->response->result = $token;

            return $this->response->SetResponse(true,'Credenciales Validas',$token);
        } else {
            return $this->response->SetResponse(false, "Credenciales no válidas");
        }
    }

}
