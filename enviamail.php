<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once "vendor/phpmailer/phpmailer/src/Exception.php";
include_once "vendor/phpmailer/phpmailer/src/PHPMailer.php";
include_once "vendor/phpmailer/phpmailer/src/SMTP.php";



function EnviaEmail($emaildestinatario, $nomedestinatario, $assunto, $mensagem)
{
	$mail = new PHPMailer();
	//$mail->SetLanguage("br", "phpmailer/phpmailer.lang-pt_br.php");

	/*No PHP 5.6 precisa adicionar o array SMTPOptions*/
	
	$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
	);

	$mail->IsSMTP();
	$mail->Charset = "UTF-8";
	$mail->SMTPAuth = true;
	//$mail->SMTPSecure = "ssl";
	$mail->SMTPDebug = 2;
	//$mail->SMTPAutoTLS = false;
	$mail->SMTPSecure = "tls";
        //Yahoo -> smtp.mail.yahoo.com
	$mail->Host = "smtp.dominio.com.br";
	$mail->Port = 587;
	//$mail->From = "no-reply@pisco.net.br";
	$mail->Username = "username@dominio.com.br";
	$mail->Password = "";
	$mail->SetFrom("username@dominio.com.br","NOME");

	$mail->AddAddress($emaildestinatario, $nomedestinatario);
	$mail->IsHTML(true);

	$mail->Subject = $assunto;
	$mail->MsgHTML($mensagem);

	if($mail->Send())
		return 1;
	else return 0;
}   
