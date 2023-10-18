<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);
	

		
	$mail->isSMTP(); //Send using SMTP
	$mail->Host       = 'smtp.mail.ru'; //Set the SMTP server to send through
	$mail->SMTPAuth   = true; //Enable SMTP authentication
	$mail->Username   = 'aeoaob@bk.ru'; //SMTP username, та почта с котрой будут отправляться письма
	$mail->Password   = 'Florida1470Zaq'; //SMTP password. пароль от почты
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
	$mail->Port       = 465;                 



	//От кого письмо
	$mail->setFrom('aeoaob@bk.ru', 'Фрилансер по жизни'); // Указать нужный E-mail
	//Кому отправить1
	$mail->addAddress('anton.klimenko.2017@bk.ru'); // Указать нужный E-mail
	//Тема письма
	$mail->Subject = 'Привет! Это "Фрилансер по жизни. Тест отправки формы"';

	//Тело письма
	$body = '<h1>Встречайте супер письмо!</h1>';

	//if(trim(!empty($_POST['name']))){
		//$body.='';
	//}	
	// if(trim(!empty($_POST[$subscribe]))){ // это значит если поле не пустое!
	// 	$body.=;
	// }


	/*
	//Прикрепить файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//путь загрузки файла
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузим файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото в приложении</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>