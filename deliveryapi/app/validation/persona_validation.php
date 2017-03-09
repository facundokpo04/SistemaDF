<?php
namespace App\Validation;

use App\Lib\Response;

class PersonaValidation {
    public static function validate($data) {
       $response = new Response();
        
        $key = 'per_nombre';
        if(!isset($data[$key])) {
            $response->errors[$key][] = 'Este campo es obligatorio';
        } else {
            $value = $data[$key];
            
           if(strlen($value) < 4) {
                $response->errors[$key][] = 'Debe contener como mínimo 4 caracteres';
            }
        }
        
//        $key = 'per_email';
//        if(empty($data[$key])) {
//            $response->errors[$key][] = 'Este campo es obligatorio';
//        } else {
//            $value = $data[$key];
//            
//           if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
//                $response->errors[$key][] = 'Correo no Valido';
//            }
//        }
        
//        $key = 'per_documento';
//        if(!isset($data[$key])) {
//            $response->errors[$key][] = 'Este campo es obligatorio';
//        } else {
//            $value = $data[$key];
//            
//           if(strlen($value) < 2) {
//                $response->errors[$key][] = 'Debe contener como mínimo 2  caracteres';
//            }
//        }
        
        $key = 'per_password';
        if(!isset($data[$key])) {
            $response->errors[$key][] = 'Este campo es obligatorio';
        } else {
            $value = $data[$key];
            
           if(strlen($value) < 2) {
                $response->errors[$key][] = 'Debe contener como mínimo 2 caracteres';
            }
        }
//        
//        $key = 'per_nacionalidad';
//        if(!isset($data[$key])) {
//            $response->errors[$key][] = 'Este campo es obligatorio';
//        } else {
//            $value = $data[$key];
//            
//           if(strlen($value) < 2) {
//                $response->errors[$key][] = 'Debe contener como mínimo 2 caracteres';
//            }
//        }


        $response->setResponse(count($response->errors) === 0);

        return $response;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

