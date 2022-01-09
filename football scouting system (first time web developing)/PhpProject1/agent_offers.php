<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="club_homepage.css" type="text/css">

            </head>

            <body style="" class="">
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
                                                    ?></h5>
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
                                <li class="breadcrumb-item"> <a href="agent_homepage.php" class="text-light">Home</a> </li>            
                                <li class="breadcrumb-item"><a href="organizations.php" class="text-light">Organizations</a></li>             
                                <li class="breadcrumb-item"><a href="agent_settings.php" class="text-light">Settings</a></li>
                            </ul>
                        </div>
                        <form action="" method="post">
                            <div class="col-md-2 text-white">
                                <div class="col-md-12 py-2"><button class="btn btn-dark" type ="submit" formaction="index.php">Logout</button></div>
                            </div> </form>
                    </div>
                </div>
            </div>
            <div class="py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-white">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OFFERS</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="text-white">RECEIVED OFFERS</h5>
                        </div>

                    </div>
                </div>
            </div>
            <div class="py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-white">
                                            <th>Name        </th>
                                            <th>Offerer Club        </th>
                                            <th>Role In Team   </th>
                                            <th>Offer Status</th>
                                            <th>Wage       </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                        <?php
                                        if (!isset($db)) {
                                            include("config.php");
                                        }
                                        if (session_id() == '') {
                                            //session has not started
                                            session_start();
                                        }
                                        $userid = $_SESSION['loggedInUserID'];

                                        $result4 = mysqli_query($db, "select * from offer ") or die("Unable to access" . mysqli_error());
                                        $resultRow = mysqli_fetch_array($result4);
                                        if ($resultRow != NULL) {
                                            $result = mysqli_query($db, "select * from offer ") or die("Unable to access" . mysqli_error());
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $footballer_id = $row['footballer_id'];
                                                $offerer_club_user_id = $row['offerer_club_user_id'];
                                                $offer_id = $row['id'];
                                                $role_in_team = $row['role_in_team'];
                                                $offer_status = $row ['status'];
                                                $wage = $row ['wage'];

                                                $result2 = mysqli_query($db, "select * from footballer where id = $footballer_id and agent_user_id = $userid ") or die("Unable to access" . mysqli_error());
                                                $row2 = mysqli_fetch_assoc($result2);
                                                if ($row2 != NULL) {
                                                    $footballer_name = $row2['name'];

                                                    $result3 = mysqli_query($db, "select * from user where id = $offerer_club_user_id ") or die("Unable to access" . mysqli_error());
                                                    $row3 = mysqli_fetch_assoc($result3);
                                                    $offerer_club_name = $row3['name'];

                                                    if ($offer_status == "waiting for agent") {
                                                        echo " <tr><td>$footballer_name</td><td>$offerer_club_name</td><td>$role_in_team</td> <td> <a href=\"agent_respond_offer.php?selectedofferid=$offer_id\">waiting for agent</a> </td>  <td>$wage</td></tr> ";
                                                    } else {
                                                        echo " <tr><td>$footballer_name</td><td>$offerer_club_name</td><td>$role_in_team</td> <td>$offer_status</td>  <td>$wage</td></tr> ";
                                                    }
                                                }
                                            }
                                        }
                                        ?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" style=""></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous" style=""></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" style=""></script>


            </html>

