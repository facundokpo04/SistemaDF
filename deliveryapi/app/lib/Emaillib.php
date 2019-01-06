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
            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
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
            $mail->Subject = 'Instructions for resetting the password for your account with PizzaColorApp';
            $mail->Body = "
        <p>Hi,</p>
        <p>            
        Thanks for choosing PizzaColorDelivery! We have received a request for a password reset on the account associated with this email address.
        </p>
        <p>
        Su Password es <b >\"$password\"</b>.  If you did not initiate this request,
        please disregard this message.
        </p>
        <p>
        If you have any questions about this email, you may contact us at deliveryiguazu@gmail.com.
        </p>
        <p>
        With regards,
        <br>
        The Pizza Color Delivery Team
        </p>";
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

