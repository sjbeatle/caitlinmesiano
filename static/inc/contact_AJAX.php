<?
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Header('Cache-Control: no-cache');
Header('Pragma: no-cache');


//initialize variables
$strName = $_GET['name'];
$strEmail = $_GET['email'];
$strMessage = "Do Not Reply to this email! Instead create a new message using the e-mail address below. This will help mitigate any issues with responses being mistaken as spam.\n\nName: ".$strName."\nEmail: ".$strEmail."\n\nMessage:\n".addslashes(urldecode(stripslashes($_GET['message'])));

//Load composer's autoloader
require __DIR__.'/PHPMailer.php';
require __DIR__.'/SMTP.php';
require __DIR__.'/Exception.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.caitlinmesiano.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'donotreply@caitlinmesiano.com';                 // SMTP username
    $mail->Password = 'donotreply';                           // SMTP password
    // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('donotreply@caitlinmesiano.com', 'Caitlin Mesiano Contact Form');
    $mail->addAddress('caitlinmesiano@gmail.com');               // Name is optional
    // $mail->addAddress('caitlinmesiano@gmail.com', 'Joe User');     // Add a recipient
    $mail->addReplyTo('donotreply@caitlinmesiano.com', 'Caitlin Mesiano Official Site');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    // $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contact Form Submission : Do Not Reply';
    $mail->Body    = stripslashes(urldecode($strMessage));
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '1';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
