<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function sendMailGmail() {
        //cargamos la libreria email de ci
        $this->load->library("email");

        //configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => 'deliveryiguazu@gmail.com',
            'smtp_pass' => '34060319fa',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);

        $this->email->from('deliveryiguazu@gmail.com');
        $this->email->to("facundokpo04@gmail.com");
        $this->email->subject('Bienvenido/a a uno-de-piera.com');
        $this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de gmail</h2><hr><br> Bienvenido al blog');
        $this->email->send();
        //con esto podemos ver el resultado
        echo json_encode($this->email->print_debugger());
    }

}
