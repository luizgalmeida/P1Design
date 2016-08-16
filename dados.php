<?php	
	require 'class.phpmailer.php';
	require 'class.smtp.php';
	require 'PHPMailerAutoload.php';

	$mail =new PHPMailer();
	$mail->setLanguage('pt');

	$nome =$_GET['nome'];
	$email =$_GET['mail'];
	$rua =$_GET['rua'];
	$num =$_GET['num'];
	$est =$_GET['est'];
	$cid =$_GET['cid'];
	$msg =$_GET['msg'];

	$host= 	'smtp.gmail.com';
	$username= 'luiz.g.almeida07@gmail.com';
	$password=	'' ;
	$port= 	25;
	$secure= 	'tls';

	$from= $username;
	$fromName= 'PEDIDO P1DESIGN';

	$mail->isSMTP();
	$mail->Host = $host;
	$mail->SMTPAuth = true;
	$mail->Username = $username;
	$mail->Password = $password;
	$mail->Port = $port;
	$mail->SMTPSecure = $secure;

	$mail->From = $from;
	$mail->Sender = 'luiz.gl.almeida07@gmail.com';
	$mail->FromName = $fromName;
	$mail->addReplyto($from, $fromName);

	$mail->AddAddress('luiz.g.almeida07@gmail.com', 'Luiz Gabriel');
	$mail->isHTML(true);
	$mail->Charset = 'utf-8';
	$mail->wordwrap = 70;

	$mail->Subject  = 'Pedido';
	$mail->Body = "Nome: $nome<br><br>E-mail: $email<br><br>Endereço:  Rua: $rua, Número: $num, Cidade: $cid, Estado: $est<br><br>Pedido: $msg";
	$mail->AltBody = 'Mensagem';

	$send = $mail->Send();
	
	if(!$mail->send()) {
    echo 'Mensagem não pode ser enviada.';
    echo 'Mail Error: ' . $mail->ErrorInfo;
} else {
    echo 'Contato enviado';
}
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();

?>