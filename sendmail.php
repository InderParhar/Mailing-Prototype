<html>
<head>
<meta charset='UTF-8'>
<title>send mail </title>
</head>
<body>
<?php
// include'vendor\phpmailer\phpmailer\src\PHPMailer.php';
?>
<div id ='main'>
<h1>mail</h1>
<div id ='login'>
<h2>Gmail SMTP</h2>
<hr/>
<form action='sendmail.php' method='post'>
<input type='text' placeholder='enter your email id ' name='email'/>
<input type='password' placeholder='Password' name='password'/>
<input type='text' placeholder='TO: Email ID ' name='toID'/>
<input type='text' placeholder='Subject' name='subject'/>
<textarea rows='5' cols='50' placeholder='Enter your Message ' name ='message'></textarea>
<input type ='submit' value='Send' name ='send'/>
</form>
</div>
</div>
 <?php
 if(isset($_POST['send'])){
	 $email=$_POST['email'];
	 $password=$_POST['password'];
	 $toID=$_POST['toID'];
	 $message=$_POST['message'];
	 $subject=$_POST['subject'];
	 $mail = new PHPmailer;
	 $mail->isSMTP();
	 $mail->Host='smtp.gmail.com'
	 $mail->Port = 465;
	 $mail->SMTPSecure='tls';
	 $mail->SMTPAuth = true;
	 $mail->Username = $email;
	 $mail->Password = $password;
	 $mail->addAddress($toID);
	 $mail->Subject=$subject;
	 $mail->msgHTML($message);
	 if(!$mail->send()){
		 $error='Mailer Error'.$mail->ErrorInfo;
		 echo'<p id="para">'.$error.'</p>';
	 }
	 else{
		 echo'<p id="para">Message Sent!<p>';
	 }
	 
	 
 }else{
		 echo '<p id =>Plese Enter Valid Data</p>';
	 }
 ?>
 </body>
 </html>