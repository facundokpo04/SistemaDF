<?php
namespace App\Validation;

use App\Lib\Response;

class DiahorarioValidation {
    public static function validate($data) {
       $response = new Response();
        
       
        


        $response->setResponse(count($response->errors) === 0);

        return $response;
    }
}
