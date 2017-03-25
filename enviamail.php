<?php
include_once "phpmailer/class.phpmailer.php";
include_once "phpmailer/class.pop3.php";
include_once "phpmailer/class.smtp.php";
//include_once "phpmailer/phpmailer.lang-pt_br.php";


function EnviaEmail($remetente, $destinatario, $assunto, $mensagem)
{
	$mail = new PHPMailer();
	//$mail->SetLanguage("br", "phpmailer/phpmailer.lang-pt_br.php");
	$mail->IsSMTP();
	$mail->Charset = "UTF-8";
	$mail->SMTPAuth = true;
	//$mail->SMTPSecure = "ssl";
	$mail->SMTPDebug = 2;
	//$mail->SMTPAutoTLS = false;
	$mail->SMTPSecure = "tls";
	$mail->Host = "smtp.dominioempresa.com.br";
	$mail->Port = 587;
	$mail->Username = "nomedeusuario";
	$mail->Password = "senha";
	$mail->FromName = "Nome do usuário";
	$mail->From = "nomedeusuario@dominioempresa.com.br";

	$mail->AddAddress($destinatario);
	$mail->AddReplyTo($remetente);
	$mail->IsHTML(true);

	$mail->Subject = $assunto;
	$mail->Body = $mensagem;

	if($mail->Send())
		return 1;
	else return 0;
}

//Teste de envio e-mail
if(EnviaEmail("emailremetente@dominioempresa.com.br", "emaildestinatario@dominio.com.br", "Mail Teste", "Esse email é um teste usando o PHPMailer") )
   echo "OK";

else
	echo "Ocorreu algum problema no envio de e-mail ";
   
?>