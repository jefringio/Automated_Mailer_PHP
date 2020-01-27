<?php

//Include packages and files for PHPMailer and SMTP protocol
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

//Initialize PHP Mailer and set SMTP as mailing protocol:
$adminMail = new PHPMailer();
$adminMail->IsSMTP();
$adminMail->Mailer = "smtp";


$adminMail->SMTPDebug  = 1;  
$adminMail->SMTPAuth   = TRUE;
$adminMail->SMTPSecure = "tls";
$adminMail->Port       = 587;
$adminMail->Host       = "smtp.gmail.com";
$adminMail->Username   = "jefringio200@gmail.com";
$adminMail->Password   = "Viewat@20";


$adminMail->IsHTML(true);

?>