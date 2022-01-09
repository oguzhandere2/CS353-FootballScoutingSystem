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

                                <li class="breadcrumb-item"><a href="organizations.php" class="text-light">Organizations</a></li>
                                <li class="breadcrumb-item"><a href="agency_tasks.php" class="text-light">Tasks</a></li>
                                <li class="breadcrumb-item"><a href="agency_settings.php" class="text-light">Settings</a></li>
                            </ul>
                        </div>
                        <form action="" method="post">
                            <div class="col-md-2 text-white">
                                <div class="col-md-12 py-2"><button class="btn btn-dark" type ="submit" formaction="index.php">Logout</button></div>
                            </div> </form>
                    </div>
                </div>
            </div>
            <div class="p-0 py-3" style="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3" style="">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="px-4 text-white">Actions</h5>
                                </div>
                            </div>
                            <div class="btn-group btn-group-vertical m-2">
                                <a href="agency_sendtask.php" class="btn py-4 m-2 btn-dark">Assign a Task</a>
                                <a href="agency_display_scouts.php" class="btn py-4 m-2 btn-dark">Display My Scouts</a>
                                <a href="agency_compare_scouts.php" class="btn py-4 m-2 btn-dark">Compare Scouts</a>

                            </div>
                        </div>
                        <div class="col-md-4" style="">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="px-5 text-white">News Feed</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="carousel slide" data-ride="carousel" id="carousel" >
                                        <div class="carousel-inner">
                                            <div class="carousel-item active"> <img class="d-block img-fluid w-100" src="images/giroud.jpg">
                                                    <div class="carousel-caption">
                                                        <h5 class="m-0">Good news for Chelsea fans!</h5>
                                                        <p>Chelsea signed a new contract with Giroud</p>
                                                    </div>
                                            </div>
                                            <div class="carousel-item"> <img class="d-block img-fluid w-100" src="images/salah.jpg">
                                                    <div class="carousel-caption">
                                                        <h5 class="m-0">This will thrill Barcelona fans!</h5>
                                                        <p>Barcelona is negotiating with Liverpool for Salah</p>
                                                    </div>
                                            </div>
                                            <div class="carousel-item"> <img class="d-block img-fluid w-100" src="images/trlig.jpg">
                                                    <div class="carousel-caption">
                                                        <h5 class="m-0">The best league of the world returns!</h5>
                                                        <p>Turkish League will resume on 12 June</p>
                                                    </div>
                                            </div>
                                        </div> <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carousel" role="button" data-slide="next"> <span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe src="https://www.youtube.com/embed/aVfQMRHCGKY?controls=0" allowfullscreen="" class="embed-responsive-item"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="input-group">
                                        <input type="text" id="userSearchInput" class="form-control px-5" onkeyup="homepageSearchFunction()" placeholder="Search for names.." title="Type in a name">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul id="userUL" class="list-group">
                                        <script>
                                            function homepageSearchFunction()
                                            {

                                                var xhttp, input, text;
                                                input = document.getElementById("userSearchInput");
                                                text = input.value;

                                                xhttp = new XMLHttpRequest();
                                                xhttp.onreadystatechange = function () {
                                                    if (this.readyState === 4 && this.status === 200) {
                                                        document.getElementById("userUL").innerHTML = this.responseText;
                                                    }
                                                };
                                                xhttp.open("GET", "homepage_search.php?searchinput=" + text, true);
                                                xhttp.send();
                                            }
                                            homepageSearchFunction();
                                        </script>
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
            
            </body>

            </html>
