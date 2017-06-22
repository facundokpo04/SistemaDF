<?php
namespace App\Validation;

use App\Lib\Response;

class EmpresaValidation {
    public static function validate($data) {
       $response = new Response();
        
       
        


        $response->setResponse(count($response->errors) === 0);

        return $response;
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

