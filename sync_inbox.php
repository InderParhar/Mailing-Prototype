
<?php

include 'database.php';


$conn = imap_open($hostname, $username, $password) or header("Location:error.html");
$timevar = "SELECT time FROM inbox ORDER BY time DESC LIMIT 0,1";
$timevar_exec = mysqli_query($conn_db, $timevar) or die(mysqli_error());
if (mysqli_num_rows($timevar_exec) > 0) {
    $timevar_data = mysqli_fetch_array($timevar_exec);
    echo'last updated at '.$timevar_data['time'];
    $emails = imap_search($conn, 'SINCE ' . date('d-M-Y', strtotime($timevar_data['time'])));
    if ($emails) {
        rsort($emails);
        foreach ($emails as $email_number){

            $overview = imap_fetch_overview($conn, $email_number, 0);
            $message = imap_fetchbody($conn, $email_number, 2);
            $to = $overview[0]->from;
            $subject = $overview[0]->subject;
            $time = date('Y-m-d H:i', strtotime($overview[0]->date));
            $msg_ref = "email_{$email_number}.txt";
            $check_old_email_exist = "SELECT id FROM inbox WHERE message='$msg_ref'";
            $check_old_email_exist_exec = mysqli_query($conn_db, $check_old_email_exist) or die(mysqli_error());
            if (mysqli_num_rows($check_old_email_exist_exec) == 0) {
                file_put_contents("email_{$email_number}.txt", $message);
                $sql = "INSERT INTO `gmail`.`inbox` (`username` , `to` , `subject` , `message` , `time` )VALUES ( '$username', '$to' , '$subject' , '$msg_ref' , '$time')";
                $sql_exec = mysqli_query($conn_db, $sql) or die(mysqli_error());
            }
        }
    }
} else {

    $emails = imap_search($conn, 'ALL');
    if ($emails) {
        rsort($emails);
        foreach ($emails as $email_number) {
            $overview = imap_fetch_overview($conn, $email_number, 0);
            $message = imap_fetchbody($conn, $email_number, 2);
            $to = $overview[0]->from;
            $subject = $overview[0]->subject;
            $time = date('Y-m-d H:i', strtotime($overview[0]->date));
            $msg_ref = "email_{$email_number}.txt";

            file_put_contents("email_{$email_number}.txt", $message);
            $sql = "INSERT INTO `gmail`.`inbox` (`username` , `to` , `subject` , `message` , `time` )VALUES ( '$username', '$to' , '$subject' , '$msg_ref' , '$time')";
            $sql_exec = mysqli_query($conn_db, $sql) or die(mysqli_error());
        }
    }
}
//header("Location:index.php");
?>   


