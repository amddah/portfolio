<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

class PHP_Email_Form {

    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $message;
    public $smtp;
    public $ajax; // Ajoutez la propriété ajax

    public function add_message($message, $label = '') {
        // Ajouter le message à l'e-mail
        $this->message .= "<p><strong>{$label}:</strong> {$message}</p>";
    }

    public function send() {
        if ($this->ajax)  {
            // Logique d'envoi sans AJAX

            echo $this->subject;
            $to = $this->to;
            $subject = $this->subject;
            $message = $this->message;
            $headers = "From: {$this->from_name} <{$this->from_email}>\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
           
            if (mail($to, $subject, $message, $headers)) {
                return 'Message sent successfully';
            } else {
                return 'Message could not be sent';
            }
        }
    }
}
