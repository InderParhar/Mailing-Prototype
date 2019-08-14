<?php

//include 'index_detail.php';
$draft_email_no = $_GET['draft_email_no'];
$myfile = fopen("$draft_email_no", "r") or die("Unable to open file!");
echo fread($myfile, filesize("$draft_email_no"));
fclose($myfile);
?>