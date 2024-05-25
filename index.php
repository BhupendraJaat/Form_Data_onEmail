<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>email send</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>Contact</h1>
        <form action="" method="POST">
            <div class="form-control">
                <input type="text" name="name" placeholder="Enter Name">
            </div>
            <div class="form-control">
                <input type="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-control">
                <textarea name="msg" placeholder="enter your msg"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" name="Send" value="Send">
        </form>
    </div>


</body>

</html>
<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['Send'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];



    //Load Composer's autoloader
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'unknowsapps@gmail.com';                     //SMTP username
        $mail->Password   = 'zszg mkgw dvio hdpz';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('rishabhyadav2301@gmail.com', 'Contact Fprm');
        $mail->addAddress('rishabhyadav2301@gmail.com', 'StartUP Innovative');     //Add a recipient


        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Test Contact Form';
        $mail->Body    = "Sender Name - $name <br>  Sender Email - $email <br> message - $msg";

        $mail->send();
        echo '<script>alert(Message has been sent);</script>';
    } catch (Exception $e) {
        echo "<script>alert(Message could not be sent. Mailer Error:);</script> {$mail->ErrorInfo}";
    }
}

?>