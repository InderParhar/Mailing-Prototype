<?php
include 'database.php';

//$conn = imap_open($hostname, $username, $password) or die('cannot connect to Gmail:' . imp_last_error());
$idvar = "SELECT id FROM inbox ORDER BY time";
$idvar_exec = mysqli_query($conn_db, $idvar) or die(mysqli_error());
$inbox_count = mysqli_num_rows($idvar_exec);

$idvar_sent = "SELECT id FROM sent ORDER BY time";
$idvar_sent_exec = mysqli_query($conn_db, $idvar_sent) or die(mysqli_error());
$sent_count = mysqli_num_rows($idvar_sent_exec);


$idvar_draft = "SELECT id FROM draft ORDER BY time";
$idvar_draft_exec = mysqli_query($conn_db, $idvar_draft) or die(mysqli_error());
$draft_count = mysqli_num_rows($idvar_draft_exec);


?>
<div class="col-sm-3 col-md-2" style='border-right: 1px solid #d4d4d4 !important;height: 432px'>
    <a href="?type=compose" class="btn btn-warning btn-sm btn-block" role="button">COMPOSE</a>
    <hr />
    <ul class="nav nav-pills nav-stacked">
        <li><a style='color:black;' href="?type=inbox"><span class="badge pull-right"><?php echo $inbox_count; ?></span> Inbox </a>
        </li>

        <li><a style='color:black;' href="?type=sent"><span class="badge pull-right"><?php echo $sent_count; ?></span> Sent Mail</a></li>
        <li><a style='color:black;' href="?type=drafts">
                <span class="badge pull-right"><?php echo $draft_count; ?></span>Drafts</a></li>
    </ul>
</div>
