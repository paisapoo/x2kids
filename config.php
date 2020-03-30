<?php
use Medoo\Medoo;

$database = new Medoo([
	'database_type' => "mysql",
	'database_name' => "x2elite_cagocon",
	'server' => "localhost",
	'username' => "root",
	'password' => "",
	
]);

use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer(true);
$mail->SMTPDebug = 0; // Enable verbose debug output
$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'pai@x2globalmedia.com'; // SMTP username
$mail->Password = 'bX<DG6gr(*&)(&^%%$^#^%???]'; // SMTP password
$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;
$mail->CharSet = 'UTF-8';
$debug = 0;
$limit = 20; //Table row per page.

// extranal Link
$adminemail ="pai@x2globalmedia.com";
$toemail = "paisapoo@gmail.com";
