<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once "vendor/autoload.php";



function EnviaEmail($emaildestinatario, $nomedestinatario, $assunto, $mensagem)
{
	$mail = new PHPMailer();
	//$mail->SetLanguage("br", "phpmailer/phpmailer.lang-pt_br.php");

	$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
	);

	$mail->IsSMTP();
	$mail->CharSet = "UTF-8";
	$mail->ContentType = "Content-Type: text/html";
	$mail->Encoding = "base64";
	$mail->SMTPAuth = true;

	$mail->SMTPDebug = 2;
	//$mail->SMTPAutoTLS = false;
	$mail->SMTPSecure = "ssl";

	$mail->Host = "smtp.dominio.com.br";
	$mail->Port = 465;
	//$mail->From = "username@dominio.com.br";
	$mail->Username = "username@dominio.com.br";
	$mail->Password = "";
	$mail->SetFrom("username@dominio.com.br","NOME");

	$mail->AddAddress($emaildestinatario, $nomedestinatario);
	$mail->IsHTML(true);

	$mail->Subject = $assunto;
	$mail->MsgHTML($mensagem);

	//e-mail em cópia
	//$mail->addCC("username@dominio.com", "NOME");
	//e-mail em cópia oculta
	//$mail->addBCC("username@dominio.com", "NOME");

	if($mail->Send())
		return 1;
	else return 0;
}
