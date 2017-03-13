<?php
namespace App\Model;

use App\Lib\Response,
    App\Lib\Auth;

class AuthModel
{
    private $db;
    private $table = 'persona';
    private $response;
    
    public function __CONSTRUCT($db)
    {
        $this->db = $db;
        $this->response = new Response();
    }
    
    public function autenticar($correo, $password) {
        $usuario = $this->db->from($this->table)
                             ->where('per_email', $correo)
                             ->where('per_password', $password)//faltaria poner el  md5($password)
                             ->fetch();
        
        if(is_object($usuario)){
            $nombre = explode(' ', $usuario->per_nombre)[0];
            
            $token = Auth::SignIn([
                'id' => $usuario->per_id,
                'Nombre' => $nombre,
                'NombreCompleto' => $usuario->per_nombre,
                //'Imagen' => $empleado->Imagen, LO DEJAMOS COMENTADO PORQUE HACE GENERAR UN TOKEN DEMASIADO GRANDE
                'Perfil' => $usuario->per_perfilUsuario
            ]);
            
            $this->response->result = $token;
            
            return $this->response->SetResponse(true);
        }else{
            return $this->response->SetResponse(false, "Credenciales no válidas");
        }
    }
}