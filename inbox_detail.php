<?php

//include 'index_detail.php';
$email_no = $_GET['email_no'];
$myfile = fopen("$email_no", "r") or die("Unable to open file!");
echo fread($myfile, filesize("$email_no"));
fclose($myfile);
?>