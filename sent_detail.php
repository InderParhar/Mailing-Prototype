<?php

//include 'index_detail.php';
$sent_email_no = $_GET['sent_email_no'];
$myfile = fopen("$sent_email_no", "r") or die("Unable to open file!");
echo fread($myfile, filesize("$sent_email_no"));
fclose($myfile);
?>