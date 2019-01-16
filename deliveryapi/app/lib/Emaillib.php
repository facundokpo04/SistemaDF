<?php

namespace App\Lib;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {

    private static $configGmail = array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => '465',
        'smtp_user' => 'deliveryiguazu@gmail.com',
        'smtp_pass' => '34060319fa',
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'newline' => "\r\n"
    );

// Crea un nuevo token guardando la información del usuario que hemos autenticado
    public static function SendEmail($email, $password) {
        try {
            $mail = new PHPMailer;
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "ssl://smtp.googlemail.com";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "deliveryiguazu@gmail.com";
            $mail->Password = "34060319fa";
            $mail->SetFrom("deliveryiguazu@gmail.com", 'deliveryiguazu.com');
            $mail->addAddress($email);
            $mail->addReplyTo('no-reply@deliveryiguazu.com', 'deliveryiguazu.com');
            $mail->Subject = "Instrucciones para restablecer el Password de su cuenta en PizzaColorApp";
            $mail->Body = "
            <p>Hola,</p>
            <p>            
              Gracias por elegir Pizza Color Delivery! Hemos recibido una solicitud para restablecer la contraseña en la cuenta asociada con esta dirección de correo electrónico.
            </p>
            <p>
            Su Password es <b >\"$password\"</b>. Si Usted no inició esta solicitud,
            Por favor ignore este mensaje
            </p>
            <p>
            Si tiene alguna pregunta sobre este correo electrónico, puede contactarnos en deliveryiguazu@gmail.com.
            </p>
            <p>
            Saludos,
            <br>
            El equipo de Pizza Color Delivery 
            </p>";
            $enviado=$mail->send();
           return true;
        } catch (Exception $e) {
            
            //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            return false;
        }
    }

}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

