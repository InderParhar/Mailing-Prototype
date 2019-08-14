<div class="col-sm-9 col-md-10">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li><a href="#home" data-toggle="tab">
                <span class="glyphicon glyphicon-conn">
                </span>Primary</a></li>
        <li><a style="color:black;" href="#profile" data-toggle="tab">
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="list-group">
                <?php
                include 'database.php';
//                $conn = imap_open($hostname, $username, $password) or die('cannot connect to Gmail:' . imp_last_error());
//                
//                 if ($emails) {
//                    $output = '';
//
//                    rsort($emails);
//
//                    foreach ($emails as $email_number) {
//
//                        $overview = imap_fetch_overview($conn, $email_number, 0);
//                        $message = imap_fetchbody($conn, $email_number, 2);
//                        $to = $overview[0]->from;
//                        $subject = $overview[0]->subject;
//                        $time = date('Y-m-d h:i:s', strtotime($overview[0]->date));
//                        file_put_contents("draft_email_{$email_number}.txt", $message);
//                       $msg_ref = "draft_email_{$email_number}.txt";
//                        $sql = "INSERT INTO `gmail`.`draft` (`username` , `to` , `subject` , `message` , `time` )VALUES ( '$username', '$to' , '$subject' , '$msg_ref' , '$time')";
//                        $sql_exec = mysqli_query($conn_db, $sql) or die(mysqli_error());
//               
//                  

                        $timevar = "SELECT * FROM draft ORDER BY time DESC ";
                        $timevar_exec = mysqli_query($conn_db, $timevar) or die(mysqli_error());
                        if (mysqli_num_rows($timevar_exec) > 0) {
                            while ($data = mysqli_fetch_array($timevar_exec)) {
                                ?>
                                <a href="index.php?type=draft-detail&draft_email_no=<?php echo $data['message']; ?>" class="list-group-item">
                                    <div class="checkbox"><label> <input type="checkbox"></label></div>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="name" style="min-width: 120px; display: inline-block;"><?php echo $data['to']; ?></span>
                                    <span class=""><?php echo $data['subject']; ?></span>
                                    <span class="text-muted" style="font-size: 11px;">


                                    </span> 
                                    <span class="badge"><?php echo date('h:i A', strtotime($data['time'])); ?></span>
                                    <span class="pull-right">
                                        <span class="glyphicon glyphicon-paperclip">
                                        </span></span>
                            </a>
                        <?php }}
                    
                
                //imap_close($conn);
                ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
