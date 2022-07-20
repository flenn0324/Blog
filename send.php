<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
// Connection to DB
$mysqli = new mysqli("localhost", "root", "root", "zeralda");

// Check connection
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}

$fname=mysqli_real_escape_string($mysqli, $_POST['fname']);
$message=mysqli_real_escape_string($mysqli, $_POST['message']);
$email=mysqli_real_escape_string($mysqli, $_POST['email']);

$email2="zakaria.brahimi@hotmail.com";
$subject="Blog message";

if (strlen($fname) > 50) {
    echo 'fname_long';

} elseif (strlen($fname) < 2) {
    echo 'fname_short';

} elseif (strlen($email) > 50) {
    echo 'email_long';

} elseif (strlen($email) < 2) {
    echo 'email_short';

} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo 'eformat';

} elseif (strlen($message) > 500) {
    echo 'message_long';

} elseif (strlen($message) < 3) {
    echo 'message_short';

} else {
	
    //MAILER

   require 'phpmailer/PHPMailerAutoload.php';
   require 'src/PHPMailer.php';
   require 'src/SMTP.php';

   $mail = new PHPMailer(true);
   
   $mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP 
   $mail->Host = 'mail.gmail.com'; // Spécifier le serveur SMTP
   $mail->SMTPAuth = true; // Activer authentication SMTP
   $mail->Username = $email; // Votre adresse email d'envoi
   $mail->Password = ''; // Le mot de passe de cette adresse email
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Accepter SSL
   $mail->Port = 465;
   
   $mail->setFrom('from@example.com', 'Mailer'); // Personnaliser l'envoyeur
   $mail->addAddress('To1@example.net', 'Karim User'); // Ajouter le destinataire
   $mail->addAddress('To2@example.com'); 
   $mail->addReplyTo('info@example.com', 'Information'); // L'adresse de réponse
   $mail->addCC('cc@example.com');
   $mail->addBCC('bcc@example.com');
   
   $mail->addAttachment('/var/tmp/file.tar.gz'); // Ajouter un attachement
   $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); 
   $mail->isHTML(true); // Paramétrer le format des emails en HTML ou non
   
   $mail->Subject = 'Here is the subject';
   $mail->Body = 'This is the HTML message body';
   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

   if (!$mail->send()) {
       echo 'Message could not be sent.';
       echo 'Mailer Error: ' . $mail->ErrorInfo;
   } else {
       echo 'true';
   }


}



?>