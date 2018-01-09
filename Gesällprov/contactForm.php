<?php
use PHPMailer\PHPMailer\PHPMailer;

include('GIFEncoder.class.php');

require '/Users/marietopphem/PhpstormProjects/PHPMailer-master/src/Exception.php';
require '/Users/marietopphem/PhpstormProjects/PHPMailer-master/src/PHPMailer.php';
require '/Users/marietopphem/PhpstormProjects/PHPMailer-master/src/SMTP.php';

$from = $_POST['mail'];
$to = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message']  . 'Observera! Detta meddelande är skickat från ett formulär på Internet och avsändaren kan vara felaktig!';

$file1 = $_FILES['file1']['tmp_name'];
$file2 = $_FILES['file2']['tmp_name'];


$fileToSend = createGIF($file1,$file2);


if (valid_email($from) == false) {
    echo 'Sender email not right';
    echo file_get_contents('contactForm.html');
}
elseif (valid_email($to) == false) {
    echo 'Reseiver email not right';
    echo file_get_contents('contactForm.html');
}

else {
    $mail = new PHPMailer(true);

    $headers = array(
        'From' => $from,
        'To' => $to,
        'Subject' => $subject
    );


    $mail->SMPTDebug = 2;
    $mail->IsSMTP();

    $mail->Mailer = "smtp";
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = 'marietopphem@gmail.com';
    $mail->Password = 'pgvyfoqxqegcfzkd';
    $mail->SMTPSecure = 'ssl';

    $mail->setFrom($from);

    $mail->addAddress($to);

    $mail->isHTML(true);

    $mail->Subject = $subject;

    $mail->Body = $message.  readfile(createGIF($file1, $file2));








    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
}

function valid_email($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("$email is a valid email address");
        return true;
    } else {
        echo("$email is not a valid email address");
        return false;
    }
}

function createGIF($file1, $file2){


    $image1 = imagecreatefrompng($file1);

    ob_start();
    imagegif($image1);
    $frames[]=ob_get_contents();
    $framed[]=40; // Delay in the animation.
    ob_end_clean();


    $image2 = imagecreatefrompng($file2);

    ob_start();
    imagegif($image2);
    $frames[]=ob_get_contents();
    $framed[]=40; // Delay in the animation.
    ob_end_clean();

    $gif = new GIFEncoder($frames,$framed,0,2,0,0,0,'bin');
    return $gif->GetAnimation();

}
