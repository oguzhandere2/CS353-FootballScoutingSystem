<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="club_homepage.css" type="text/css">
            </head>

            <body style="" class="" >
            <div class="p-3" style="">
                <div class="container" style="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6"><img class="img-fluid d-block" src="images/icon.png">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="text-white">
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
                                <li class="breadcrumb-item"><a href="<?php
                                    if (session_id() == '') {
                                        //session has not started
                                        session_start();
                                    }

                                    if (!isset($db)) {
                                        include("config.php");
                                    }

                                    $user_type = $_SESSION['loggedInUserType'];

                                    if ($user_type == "Club") {
                                        echo "club_homepage.php";
                                    } else if ($user_type == "Scouting Agency") {
                                        echo "agency_homepage.php";
                                    } else if ($user_type == "Scout") {
                                        echo "scout_homepage.php";
                                    } else if ($user_type == "Agent") {
                                        echo "agent_homepage.php";
                                    }
                                    ?>" class="text-white">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php
                                    if (session_id() == '') {
                                        //session has not started
                                        session_start();
                                    }

                                    if (!isset($db)) {
                                        include("config.php");
                                    }

                                    $user_type = $_SESSION['loggedInUserType'];

                                    if ($user_type == "Club") {
                                        echo "club_settings.php";
                                    } else if ($user_type == "Scouting Agency") {
                                        echo "agency_settings.php";
                                    } else if ($user_type == "Scout") {
                                        echo "scout_settings.php";
                                    } else if ($user_type == "Agent") {
                                        echo "agent_settings.php";
                                    }
                                    ?> " class="text-light">Settings</a></li>
                            </ul>
                        </div>
                        <form action="" method="post">
                            <div class="col-md-2 text-white">
                                <div class="col-md-12 py-2"><button class="btn btn-dark" type ="submit" formaction="index.php">Logout</button></div>
                            </div> </form>
                    </div>
                </div>
            </div>
            <div class="py-3" style="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="text-white">

                                <?php
                                if (session_id() == '') {
                                    //session has not started
                                    session_start();
                                }

                                if (!isset($db)) {
                                    include("config.php");
                                }

                                $selected_user_id = $_GET['selecteduserid'];
                                $result = mysqli_query($db, "select * from user where id = '$selected_user_id'") or die("Unable to access" . mysqli_error());
                                $row = mysqli_fetch_array($result);
                                $result2 = mysqli_query($db, "select * from scouting_agency where user_id = '$selected_user_id'") or die("Unable to access" . mysqli_error());
                                $row2 = mysqli_fetch_array($result2);
                                $agency_name = $row['name'];
                                $agency_region = $row2['region'];
                                $agency_year = $row2['year_founded'];
                                $agency_rate = $row2['rate'];
                                $agency_numofscouts = $row2['num_of_scouts'];
                                echo "Agency Name: $agency_name";
                                ?>


                            </h1>
                        </div>
                        <div class="col-md-4">
                            <ul class="breadcrumb bg-dark m-1">
                                <li class="breadcrumb-item"> <a href="agency_user_page_scouts.php?agencyuserid=<?php echo $selected_user_id ?>" class="text-white">Scouts</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4" style="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="text-white">Region</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="text-white">
                                        <?php
                                        echo $agency_region;
                                        ?>

                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5 class="text-white">Year Founded</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="text-white">
                                        <?php
                                        echo $agency_year;
                                        ?>

                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5 class="text-white">Rate</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="text-white">
                                        <?php
                                        echo $agency_rate;
                                        ?>

                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5 class="text-white">Number Of Scouts</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="text-white">
                                        <?php
                                        echo $agency_numofscouts;
                                        ?>

                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4">
                <div class="container">
                    <div class="row border border-light">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="text-white">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Scouts With Highest Reputation</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 py-3">
                                    <h5 class="text-white">

                                        <?php
                                        if (!isset($db)) {
                                            include("config.php");
                                        }
                                        if (session_id() == '') {
                                            //session has not started
                                            session_start();
                                        }
                                        $selected_user_id = $_GET['selecteduserid'];

                                        $result4 = mysqli_query($db, "select * from scout where scouting_agency_user_id = '$selected_user_id' ") or die("Unable to access" . mysqli_error());
                                        $resultRow = mysqli_fetch_array($result4);
                                        if ($resultRow != NULL) {

                                            $result = mysqli_query($db, "select * from scout where scouting_agency_user_id = '$selected_user_id' order by reputation ") or die("Unable to access" . mysqli_error());
                                            $count = 0;

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                if ($count < 3) {
                                                    $scout_id = $row['user_id'];

                                                    $result2 = mysqli_query($db, "select * from user where id = '$scout_id' ") or die("Unable to access" . mysqli_error());
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                        $scout_name = $row2 ['name'];
                                                        echo "$scout_name\n";
                                                        if ($count != 2) {
                                                            echo "<br>";
                                                            echo "<br>";
                                                            echo "<br>";
                                                        }
                                                    }
                                                    $count = $count + 1;
                                                }
                                            }
                                        }
                                        ?>
                                    </h5>
                                </div>
                            </div>

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
