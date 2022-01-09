<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"> 
        <link rel="stylesheet" href="club_homepage.css" type="text/css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

            </head>

            <body class="" style="" >
            <div class="p-3" style="">
                <div class="container" style="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6"><img class="img-fluid d-block" src="images/icon.png">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="text-white">
                                                    <?php
                                                    if (session_id() == '') {
                                                        //session has not started
                                                        session_start();
                                                    }

                                                    if (!isset($db)) {
                                                        include("config.php");
                                                    }

                                                    $main_id = $_SESSION['loggedInUserID'];
                                                    $result3 = mysqli_query($db, "select * from user where id = '$main_id'") or die("Unable to access" . mysqli_error());
                                                    $row3 = mysqli_fetch_array($result3);
                                                    $username = $row3['name'];
                                                    echo "Username: $username";
                                                    ?>
                                                </h5>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="m-2 text-white" style="text-shadow: 5px 0px 10px black;">Football Scouting System</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb m-1 shadow-none bg-dark" style="">
                                <li class="breadcrumb-item"><a href="agency_homepage.php" class="text-light">Home</a></li>
                                <li class="breadcrumb-item"><a href="organizations.php" class="text-light">Organizations</a></li>
                                <li class="breadcrumb-item"><a href="agency_tasks.php" class="text-light">Tasks</a></li>
                                <li class="breadcrumb-item"><a href="agency_settings.php" class="text-light">Settings</a></li>
                            </ul>
                        </div>
                         <form action="" method="post">
        <div class="col-md-2 text-white">
            <div class="col-md-12 py-2"><button class="btn btn-dark" type ="submit" formaction="index.php">Logout</button></div>
        </div> </form>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
            <div class="py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" id="scouts_form">
                                <div class="form-group"><label class = text-white>Select Task</label><select name = "tasks" class="custom-select" required="required">
                                        <?php
                                        if (session_id() == '') {
                                            //session has not started
                                            session_start();
                                        }
                                        if (!isset($db)) {
                                            include("config.php");
                                        }
                                        $userid = $_SESSION['loggedInUserID'];

                                        $result = mysqli_query($db, "select * from task where scouting_agency_user_id = '$userid' ") or die("Unable to access" . mysqli_error());

                                        while ($row = mysqli_fetch_assoc($result)) 
                                        {
                                            $task_id = $row['id'];
                                            $result2 = mysqli_query($db, "select * from task where id = '$task_id' and num_of_requested_scouts > 0") or die("Unable to access" . mysqli_error());
                                            $row2 = mysqli_fetch_assoc($result2);
                                            $organization_id = $row2['organization_id'];
                                            $club_user_id = $row2['club_user_id'];
                                            $position = $row2['positions'];
                                            $noOfRequestedScouts = $row2['num_of_requested_scouts'];
                                            $result3 = mysqli_query($db, "select * from user where id = '$club_user_id' ") or die("Unable to access" . mysqli_error());
                                            $row3 = mysqli_fetch_assoc($result3);
                                            $club_user_name = $row3['name'];
                                            $result4 = mysqli_query($db, "select * from organization where id = '$organization_id' ") or die("Unable to access" . mysqli_error());
                                            $row4 = mysqli_fetch_assoc($result4);
                                            $organization_name = $row4['name'];
                                            if ( $club_user_name != NULL)
                                            {
                                                echo "<option value=\"$task_id\">$club_user_name | $organization_name | $position | $noOfRequestedScouts </option>";
                                            }
                                        }
                                        ?> 
                                    </select></div>
                                <div class="form-group"><label class = text-white>Select Scouts</label>
                                    <select id = "scouts" name = "scouts[]"  required="required" multiple = "multiple" class="custom-select" >
                                        <?php
                                        if (session_id() == '') {
                                            //session has not started
                                            session_start();
                                        }
                                        if (!isset($db)) {
                                            include("config.php");
                                        }
                                        $userid = $_SESSION['loggedInUserID'];

                                        $result = mysqli_query($db, "select * from scout where scouting_agency_user_id = '$userid' and isFree = '1' ") or die("Unable to access" . mysqli_error());

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $scout_id = $row['user_id'];
                                            $result2 = mysqli_query($db, "select * from user where id = '$scout_id' ") or die("Unable to access" . mysqli_error());
                                            $row2 = mysqli_fetch_assoc($result2);
                                            $scout_name = $row2['name'];
                                            echo "<option value=\"$scout_id\">$scout_name</option>";
                                        }
                                        ?> 
                                    </select></div><button type="submit" name ="submit" class="btn btn-primary" formaction="process_agency_sendtask.php">Assign</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" style=""></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous" style=""></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" style=""></script>
            <script type="text/javascript" src="js/common.js"></script>
            <script type="text/javascript" src="js/club_homepage.js"></script>

            </body>
            </html>