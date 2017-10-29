<?php
// Файлы phpmailer
require 'class.phpmailer.php';
require 'class.smtp.php';

$name = $_POST['name'];
$number = $_POST['phone'];

// Настройки
$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = ''; // Сервер исходящей почты
$mail->SMTPAuth = true;
$mail->Username = ''; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
$mail->Password = ''; // Ваш пароль
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom(''); // Ваш Email
$mail->addAddress(''); // Email получателя

$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer.lang-ru.php');

// Письмо
$mail->isHTML(true);
$mail->Subject = "Новая заявка с сайта Видеонаблюдения"; // Заголовок письма
$mail->Body    = "Имя: $name\nТелефон: $number"; // Текст письма

// Результат
if(!$mail->send()) {
    echo 'Сообщение не может быть отправлено.';
    echo 'Ошибка: ' . $mail->ErrorInfo;
} else {
    echo 'ok';
}

// header( 'Location: ./index.html' );
?>
