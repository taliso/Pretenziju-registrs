<?php
$mail->addAddress('talis@tenachem.com');               // Name is optional
$mail->Subject = 'Here is the subject';
$mail->Body    = 'Pretenzijas tests!';

if(!$mail->send()) {
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
	echo 'E-pasts ir nosūtīts otru reizi';
}