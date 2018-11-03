<?php
namespace App\Validation;

use App\Lib\Response;

class HotelValidation {
    
    
    public static function validate($data) {
       $response = new Response();
        
//        $key = 'cat_nombre';
//        if(!isset($data[$key])) {
//            $response->errors[$key][] = 'Este campo es obligatorio';
//        } else {
//            $value = $data[$key];
//            
//           if(strlen($value) < 4) {
//                $response->errors[$key][] = 'Debe contener como mínimo 4 caracteres';
//            }
//        }
//        
//        $key = 'cat_descripcion';
//        if(empty($data[$key])) {
//            $response->errors[$key][] = 'Este campo es obligatorio';
//        } else {
//            $value = $data[$key];
//            
//            if(strlen($value) < 4) {
//                $response->errors[$key][] = 'Debe contener como mínimo 4 caracteres';
//            }
//        }
//        
//
//
        $response->setResponse(count($response->errors) === 0);

        return $response;
    }
}