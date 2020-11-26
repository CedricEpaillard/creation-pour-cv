<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
class Model
{
      
      const SERVER = "localhost";
      const USER = "root";
      const PASSWORD = "";
      const BASE = "tar";


    private $connection;

    public function __construct()
    // try 
    {
        $this->connection = new
            PDO(
                "mysql:host=" .
                    self::SERVER . ";dbname=" .
                    self::BASE,
                self::USER,
                self::PASSWORD
            );
    }
    // catch (Execption $e) {die('Erreur : '.$e->getMessage()); }
    public function addNewsletter($mail)
    {
        $requete = $this->connection->prepare("INSERT INTO  bdd_mail VALUES (NULL, :mail)");
        $requete->bindParam(':mail', $mail);
        $result = $requete->execute();
        return $result;
    }

    public function SendForm($mail,$textarea)
    {    
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
            
        $mail = new PHPMailer();
        
        $email = $_POST['mail'];
        $textarea = $_POST['message'];
        
        try {
            $mail->From = $email; 
            $mail->Subject = ' Test mail'; 
            $mail->MsgHTML($textarea);
            $mail->AltBody="Message HTML, votre messagerie n'accepte pas ce format";
            $mail->CharSet = 'UTF-8';        
              $mail->AddAddress("cedric.epaillard11@gmail.com");
              $mail->send();
          
        }
         catch (Exception $e) {
              echo 'Message non envoyé'; 
              echo 'Erreur: ' . $mail->ErrorInfo;
             }
    }
}
