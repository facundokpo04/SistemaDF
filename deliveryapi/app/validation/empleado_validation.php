<?php
namespace App\Validation;

use App\Lib\Response;

class EmpleadoValidation {
    public static function validate($data, $update = false) {
        $response = new Response();
        
        

        $response->setResponse(count($response->errors) === 0);

        return $response;
    }
}