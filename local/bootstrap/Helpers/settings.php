<?php
function getPercent($price_full = '', $price_sale = '') {
    if($price_full != '' and $price_sale != '') {
        $result = number_format(($price_full - $price_sale) * 100 / $price_full, 0, '.', ',)');
    } else {
        $result = 0;
    }

    return $result;
}

function getDatepicker2DateDatabase($date) {
    $date = explode('/', $date);

    $month = $date[0];
    $day = $date[1];
    $year = $date[2];

    return $year.'-'.$month.'-'.$day;
}

function getDateDatabase2DateDotDot($date) {
    $date = explode('/', $date);

    $month = $date[0];
    $day = $date[1];
    $year = $date[2];

    return $day.'.'.$month.'.'.$year;
}

function getDateDatabase2DateDotDot2($date) {
    $date_ = explode('/', $date);

    if(!empty($date_[1])) {
        $month = $date_[0];
        $day = $date_[1];
        $year = $date_[2];

        return $day.'.'.$month.'.'.$year;
    } else {
        $date = explode('-', $date);

        $year = $date[0];
        $month = $date[1];
        $day = $date[2];

        return $day.'.'.$month.'.'.$year;
    }
}

// phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// End phpmailer

function sendMail($sender = array(), $subject, $message) {
    // Load Composer's autoloader
    require 'local/vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'noreply.eatfit.gourmet@gmail.com';                     // SMTP username
        $mail->Password   = 'cqbokvhzghaeskcn';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;   
        $mail->CharSet = 'UTF-8';                                 // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('noreply.eatfit.gourmet@gmail.com', 'eatfit by Gourmet Primo');
    
        if(!empty($sender)) {
            foreach($sender as $email) {
                $mail->addAddress($email); // Add a recipient
            }
        }
        
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('sitiporn@orange-thailand.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = $message;

        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}