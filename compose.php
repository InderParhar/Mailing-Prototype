

    
            
       
      <div class="col-sm-9 col-md-10">      
<form action='' method='post'>
  <table class="table" >
    <thead>
      <tr>
          <th>
                     New Message
                    </th>
                    <th>
                <div class="pull-right">
                    
               
                    <a href="index.php" class="btn btn-warning btn-sm btn-block" role="button">Back</a>
                </th>
         
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>
            <div id ='login'>

<input type='text' placeholder='TO: Email ID ' name='toID' class='form-control'/>

 
            </div>
        </td>
      </tr>
      <tr>
    
        <td>
            <input type='text' placeholder='Subject' name='subject' class='form-control'/></td>
    
      </tr>
      <tr>
        <td><textarea rows='5' cols='50' placeholder='Enter your Message ' name ='message' class='form-control'></textarea></td>
      </tr>
      
      <tr>
        <td><input type ='submit' value='Send' name ='send' class='btn btn-danger'/></td>
        
      </tr>
    
    </tbody>
  </table>
            
</form>
</div>	
                   

<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();
if(isset($_POST['send'])){
$toID=$_POST['toID'];
$message=$_POST['message'];
$subject=$_POST['subject'];
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'
$mail->SMTPSecure = 'ssl'
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = $_SESSION['username'];
$mail->Password = $_SESSION['password'];
$mail->setFrom($_SESSION['username'], 'User');
$mail->addAddress($toID);
$mail->Subject=$subject;
$mail->msgHTML($message);
$mail->isHTML(true);
$mail->Body = $message;
if (!$mail->send())
        echo "Something wrong happened!";
    else
        echo "Mail sent";

}	
?>