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
               

                  

                        $timevar = "SELECT * FROM inbox ORDER BY time DESC ";
                        $timevar_exec = mysqli_query($conn_db, $timevar) or die(mysqli_error());
                        if (mysqli_num_rows($timevar_exec) > 0) {
                            while ($data = mysqli_fetch_array($timevar_exec)) {
                                ?>
                                <a href="index.php?type=inbox-detail&email_no=<?php echo $data['message']; ?>" class="list-group-item">
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


                            <?php
                            }
                        }
                    
                
                ?>


            </div>
        </div>
    </div>
</div>
</div>
</div>
