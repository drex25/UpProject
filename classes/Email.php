<?php 

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;

    }

    public function enviarConfirmacion() {
      // create a new object
      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host = 'smtp.mailtrap.io';
      $mail->SMTPAuth = true;
      $mail->Port = 2525;
      $mail->Username = 'c69b00bee09bf3';
      $mail->Password = 'e8d68348e06365';

      $mail->setFrom('cuentas@upproject.com');
      $mail->addAddress('cuentas@upproject.com', 'UpPropject.com');
      $mail->Subject = 'Confirma tu Cuenta';

      // Set HTML
      $mail->isHTML(TRUE);
      $mail->CharSet = 'UTF-8';

      $contenido = '<html>';
      $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has Creado tu cuenta en UpProject, solo debes confirmarla presionando el siguiente enlace</p>";
      $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar?token=" . $this->token . "'>Confirmar Cuenta</a>";        
      $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
      $contenido .= '</html>';
      $mail->Body = $contenido;

        //Enviar el mail
      $mail->send();

    }

    public function enviarInstrucciones() {
      // create a new object
   $mail = new PHPMailer();
   $mail->isSMTP();
   $mail->Host = 'smtp.mailtrap.io';
   $mail->SMTPAuth = true;
   $mail->Port = 2525;
   $mail->Username = 'c69b00bee09bf3';
   $mail->Password = 'e8d68348e06365';

   $mail->setFrom('cuentas@upproject.com');
   $mail->addAddress('cuentas@upproject.com', 'UpProject.com');
   $mail->Subject = 'Reestablecer Password';

   // Set HTML
   $mail->isHTML(TRUE);
   $mail->CharSet = 'UTF-8';


   $contenido = '<html>';
   $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong>  Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
   $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Reestablecer Password</a>";        
   $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
   $contenido .= '</html>';
   $mail->Body = $contenido;

     //Enviar el mail
   $mail->send();
}

}    