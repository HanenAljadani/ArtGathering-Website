
<?php


//Include required PHPMailer files
	require './includes/PHPMailer.php';
	require './includes/SMTP.php';
	require './includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "artgatharing@gmail.com";
//Set gmail password
	$mail->Password = "ziarzvagldcbyhkj";
//Email subject
	$mail->Subject = "Test email using PHPMailer";
//Set sender email
	$mail->setFrom('artgatharing@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('C:\Program Files\Ampps\www\Project405\phpmailer\imgs\Screenshot (12).png');
//Email body
	$mail->Body = "<h1>ArtGatharing Website</h1></br><p>ArtGathering is a website that provides a platform for artists to showcase their work and 
connect with a community of art enthusiasts.</p>";
//Add recipient
	$mail->addAddress('saraalgethami@gmail.com');
//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		echo "Message could not be sent. Mailer Error: ";
	}
//Closing smtp connection
$mail->smtpClose();



?>