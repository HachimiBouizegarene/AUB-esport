<?php 
namespace Model;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class EmailManager{
    public function sendConfirmationMail($to, $code){
        try{
            $mail = new PHPMailer(true);
            //Server settings                
            $mail->isSMTP();                                            
            $mail->Host       = $_ENV['MAIL_HOST'];                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = $_ENV['MAIL_USERNAME'];                     
            $mail->Password   = $_ENV['MAIL_PASSWORD'];                            
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;                                    
            $mail->setFrom('ne-pas-repondre@aub-esport.fr', 'aub-Esport');
            $mail->addAddress($to);     
            //Content
            $mail->isHTML(true);                                 
            $mail->Subject = 'Code confirmation';
            $mail->Body    = 'Voici votre code de confirmation <b>'.$code.'</b>';
            $mail->send();
            return true;
        }catch(Exception $e){
            return false;
        }

        
    }
}