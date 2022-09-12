<?php

require_once('/var/www/u1181503/data/www/m-safety.ru/core/model/modx/mail/phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer();
$mail->CharSet = 'utf-8';

$cameraCount = $_POST['camera-count'];
$archiveCount = $_POST['archive-count'];
$cameraCost = $_POST['camera-cost'];
$workCost = $_POST['archive-cost'];
$email = $_POST['email'];
$phone = $_POST['phone-number'];
$totalCost = $_POST['total-cost'];

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'ssl://smtp.mail.ru';                                                                                              // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@m-safety.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'NpYUaPi33a*c'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('info@m-safety.ru'); // от кого будет уходить письмо?
$mail->addAddress('info@m-safety.ru');     // Кому будет уходить письмо
$mail->addAddress($email);     // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'КАЛЬКУЛЯТОР M-SAFETY';
$mail->Body    = '<strong>Количество камер: </strong>' . $cameraCount . '<br><strong>Размер архива: </strong>' . $archiveCount . '<br><strong>Стоимость оборудования: </strong>' . $cameraCost . '<br><strong>Стоимость работ: </strong>' . $workCost . '<br><strong>Почта: </strong>' . $email . '<br><strong>Телефон: </strong>' . $phone . '<br><strong>Итого стоимость: </strong>' . $totalCost;
$mail->AltBody = '';

if (!$mail->send()) {
    echo 'Error';
} else {
    header('location: https://m-safety.ru/');
}

?>