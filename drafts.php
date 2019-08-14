  <div class="col-sm-9 col-md-10">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li><a href="#home" data-toggle="tab">
                                <span class="glyphicon glyphicon-conn">
                                </span>Primary</a></li>
                        <li><a style="color:black;" href="#profile" data-toggle="tab">
                    </ul>
                    <a href="sendmail.php"></a>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <div class="list-group">
									<?php                              

                                $conn = imap_open($hostname, $username, $password) or die('cannot connect to Gmail:' . imp_last_error());

                                $emails = imap_search($conn, 'ALL');

                                if ($emails) {
                                    $output = '';

                                    rsort($emails);

                                    foreach ($emails as $email_number) {
                                        $overview = imap_fetch_overview($conn, $email_number, 0);
                                        $message = imap_fetchbody($conn, $email_number, 2);
                                        

                                        $output .='<a href="#" class="list-group-item">
                                    <div class="checkbox"><label> <input type="checkbox"></label></div>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="name" style="min-width: 120px; display: inline-block;">' . $overview[0]->from . '</span>
                                    <span class="">' . $overview[0]->subject . '</span>
                                    <span class="text-muted" style="font-size: 11px;">
                                        
                                           
                                    </span> 
                                    <span class="badge">'.date('h:i A',strtotime($overview[0]->date)).'</span>
										
										
                                    <span class="pull-right">
                                        <span class="glyphicon glyphicon-paperclip">
                                        </span></span>
                                </a>'; 
                                    }
                                    echo $output;
                                }
                                imap_close($conn);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>