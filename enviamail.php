<?php
include_once "phpmailer/class.phpmailer.php";
include_once "phpmailer/class.pop3.php";
include_once "phpmailer/class.smtp.php";
//include_once "phpmailer/phpmailer.lang-pt_br.php";


function EnviaEmail($emaildestinatario, $nomedestinatario, $assunto, $mensagem)
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
        //Yahoo -> smtp.mail.yahoo.com
	$mail->Host = "smtp.dominio.com.br";
	$mail->Port = 587;
	$mail->Username = "nomedeusuario@dominio.com.br";
	$mail->Password = "senha";
	$mail->SetFrom("nomedeusuario@dominio.com.br","Nome");

	$mail->AddAddress($emaildestinatario, $nomedestinatario);
	$mail->AddReplyTo($remetente);
	$mail->IsHTML(true);

	$mail->Subject = $assunto;
	$mail->MsgHTML($mensagem);

	if($mail->Send())
		return 1;
	else return 0;
}   
?>
