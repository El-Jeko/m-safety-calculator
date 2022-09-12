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

// $mail->SMTPDebug = 3;

$mail->isSMTP();
$mail->Host = 'ssl://smtp.mail.ru'; 
$mail->SMTPAuth = true; 
$mail->Username = 'info@m-safety.ru';
$mail->Password = 'password';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('info@m-safety.ru');
$mail->addAddress('info@m-safety.ru');
$mail->addAddress($email);
//$mail->addAddress('ellen@example.com');
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
$mail->isHTML(true);

$mail->Subject = 'КАЛЬКУЛЯТОР M-SAFETY';
$mail->Body    = '<strong>Количество камер: </strong>' . $cameraCount . '<br><strong>Размер архива: </strong>' . $archiveCount . '<br><strong>Стоимость оборудования: </strong>' . $cameraCost . '<br><strong>Стоимость работ: </strong>' . $workCost . '<br><strong>Почта: </strong>' . $email . '<br><strong>Телефон: </strong>' . $phone . '<br><strong>Итого стоимость: </strong>' . $totalCost;
$mail->AltBody = '';

if (!$mail->send()) {
    echo 'Error';
} else {
    header('location: https://m-safety.ru/');
}

?>
