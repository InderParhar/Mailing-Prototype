   <?php
session_start();

$username = $_SESSION['username'];
$password = $_SESSION['password'];
if (empty($_SESSION['username'] && $_SESSION['password'])) {
    header("Location:login1.php");
}
date_default_timezone_set('Asia/Kolkata');
?>
<html lang="en">
    <head>
        <title>Inbox Page</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="css/tab.css" rel="stylesheet" id="bootstrap-css">

    </head>
    <body>
        <div class="container" style='    border: 1px solid #dddddd;padding: 10px;'>
            <div class="row">
                <a href="logout.php"></a>
                <div class="col-sm-3 col-md-2">

                </div>
                <a href="logout.php"></a>
                <div class="col-sm-9 col-md-10">


                    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Refresh">
                        &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;&nbsp;
                        <a href="?type=<?php echo $_GET['type']; ?>&sync=<?php echo $_GET['type']; ?>" class="btn btn-warning btn-sm btn-block" role="button">Sync</a></button>

                    <div class="pull-right" style='border-left:'>
                        <a href="logout.php" class="btn btn-warning btn-sm btn-block" role="button">LogOut</a>
                    </div>

                    <div class="pull-right">
                        <span class="text-muted"><b>1</b>-<b>50</b></span>
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </button>
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    include('left_panel.php');
                    if ((isset($_GET['type']) && $_GET['type'] == 'inbox') && isset($_GET['sync']) && $_GET['sync'] == 'inbox') {
                        $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
                        include('sync_inbox.php');
                    } else if ((isset($_GET['type']) && $_GET['type'] == 'drafts') && isset($_GET['sync']) && $_GET['sync'] == 'drafts') {
                        $hostname = '{imap.gmail.com:993/imap/ssl}[Gmail]/Drafts';
                        include('sync_draft.php');
                    } else if ((isset($_GET['type']) && $_GET['type'] == 'sent') && isset($_GET['sync']) && $_GET['sync'] == 'sent') {
                        $hostname = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';
                        include('sync_sent.php');
                    } else {
                        if (isset($_GET['type']) && $_GET['type'] == 'sent') {
                            //$hostname = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';
                            //include('sentmail.php');
                            include('sent_inbox.php');
                        } else if (isset($_GET['type']) && $_GET['type'] == 'sync-inbox') {

                            //include('draft_inbox.php');
                        } else if (isset($_GET['type']) && $_GET['type'] == 'drafts') {
                            $hostname = '{imap.gmail.com:993/imap/ssl}[Gmail]/Drafts';
                            //include('drafts.php');
                            include('draft_inbox.php');
                        } else if (isset($_GET['type']) && $_GET['type'] == 'compose') {
                            //$hostname='{imap.gmail.com:993/imap/ssl}[Gmail]/Drafts';
                            include('compose.php');
                        } else if (isset($_GET['type']) && $_GET['type'] == 'inbox-detail') {
                            //$hostname='{imap.gmail.com:993/imap/ssl}[Gmail]/Drafts';
//                      $email_no = $_GET['email_no'];

                            include('inbox_detail.php');
                        } else if (isset($_GET['type']) && $_GET['type'] == 'sent-detail') {
                            //$hostname='{imap.gmail.com:993/imap/ssl}[Gmail]/Drafts';
//                      $email_no = $_GET['email_no'];

                            include('sent_detail.php');
                        } else if (isset($_GET['type']) && $_GET['type'] == 'draft-detail') {
                            //$hostname='{imap.gmail.com:993/imap/ssl}[Gmail]/Drafts';
//                      $email_no = $_GET['email_no'];

                            include('draft_detail.php');
                        } else {

                            include('inbox.php');
                        }
                    }
                    ?>


                    </body>
                    </html>
