<?php
include_once "enviamail.php";

$nome = "Reginaldo";
$email = "";
$assunto = "Teste envio de e-mail";
$mensagem = $nome . ", Isso é um teste de envio e-mail usando o PHPMailer.";

if(EnviaEmail($email, $nome, $assunto, $mensagem))
  echo "E-mail encaminhado";
else
  echo "Ocorreu algum problema no envio de e-mail";

