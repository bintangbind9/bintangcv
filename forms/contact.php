<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  // $receiving_email_address = 'bintangsaputra531@gmail.com';

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;
  
  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->subject = $_POST['subject'];

  // // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  // /*
  // $contact->smtp = array(
  //   'host' => 'example.com',
  //   'username' => 'example',
  //   'password' => 'pass',
  //   'port' => '587'
  // );
  // */

  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // // $contact->add_message( $_POST['message'], 'Message', 10);
  // $contact->add_message( $_POST['message'], 'Message');

  // echo $contact->send();
  // // mail($receiving_email_address, $_POST['subject'], $_POST['message'], 'From:'.$_POST['email']);

//----------------------------------------------------------------------------------------------------

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

require "../vendor/phpmailer/phpmailer/src/PHPMailer.php";
require "../vendor/phpmailer/phpmailer/src/SMTP.php";
require "../vendor/phpmailer/phpmailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// //Load Composer's autoloader
// require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
  //Server settings
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
  $mail->SMTPDebug = 0;
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'iseven.software@gmail.com';                     //SMTP username
  $mail->Password   = 'kampungmalang';                               //SMTP password
  // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
  $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
  $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

  //Recipients
  $mail->setFrom($_POST['email'], $_POST['name']);
  $mail->addAddress('bintangsaputra531@gmail.com', 'Bintang');     //Add a recipient
  // $mail->addAddress('ellen@example.com');               //Name is optional
  // $mail->addReplyTo('info@example.com', 'Information');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');

  //Attachments
  // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = $_POST['subject'];
  $mail->Body    = '<p>From: '.$_POST['name'].'</p><p>Mail: '.$_POST['email'].'</p><p>Message: '.$_POST['message'].'</p>';
  $mail->AltBody = $_POST['message'];

  $mail->send();
  echo 'Your message has been sent. Thank you!';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>