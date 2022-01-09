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
                                    <h1 class="m-2 text-white" style="	text-shadow: 5px 0px 10px black;">Football Scouting System</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb m-1 shadow-none bg-dark" style="">
                                <li class="breadcrumb-item"> <a href="agent_homepage.php" class="text-light">Home</a> </li>
                                <li class="breadcrumb-item"><a href="organizations.php" class="text-light">Organizations</a></li>
                                <li class="breadcrumb-item"><a href="agent_offers.php" class="text-light">Offers</a></li>
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
            <div class="py-3" style="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="display-4 text-white" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Add a footballer</h1>
                        </div>
                    </div>
                </div>
            </div>
            <form class="" method="POST">
                <div class="py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group row text-white"> 
                                    <label>Selected Footballer:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label> 
                                    <span  id="footballerNameSpan" style="color:white">Not chosen yet</span> 
                                </div>
                                <div> 
                                    <input  class="text" id="footballerIDMakeNewOffer"
                                            type = "hidden" name="selected_footballer" tabindex="1" type="text" value="" readonly required="required"/>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="py-2">
                    <div class="container">

                        <div id="div2DeleteAfterSelection2" class="input-group">
                            <input type="text" class="form-control px-5" id="userFootballerSearchInput" onkeyup="footballerSearchFunction()" placeholder="Select a footballer...">
                                
                        </div>

                        <div class="row">

                            <div id = "div2DeleteAfterSelection" class="col-md-12">
                                <ul id="footballerSelectUL" class="list-group">
                                    <?php
                                    if (session_id() == '') {
                                        //session has not started
                                        session_start();
                                    }

                                    if (!isset($db)) {
                                        include("config.php");
                                    }

                                    

                                    $result = mysqli_query($db, "select * from footballer where agent_user_id IS NULL") or die("Unable to access" . mysqli_error());

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        
                                        $outputFootballerID = $row["id"];
                                        $outputFootballerName = $row["name"];
                                        $outputFootballerAge = $row["age"];

                                        echo "<li id='$outputFootballerID'> <button id='$outputFootballerID' class=\"list-group-item list-group-item-action list-group-item-dark\" onClick=\"chooseFootballer(this)\" type=\"button\">$outputFootballerName | $outputFootballerAge </button></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-12 py-2"><button class="btn btn-primary" type="submit" formaction="process_add_footballer.php">Submit</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <script>
                function footballerSearchFunction() {

                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById("userFootballerSearchInput");

                    filter = input.value.toUpperCase();

                    ul = document.getElementById("footballerSelectUL");
                    li = ul.getElementsByTagName("li");
                    
                    for (i = 0; i < li.length; i++)
                    {
                        a = li[i].getElementsByTagName("button")[0];
                        txtValue = a.textContent || a.innerText;

                        if (txtValue.toUpperCase().indexOf(filter) > -1)
                        {
                            li[i].style.display = "";
                        } else
                        {
                            li[i].style.display = "none";
                        }
                    }
                }
            </script>
            <script type="text/javascript" src="js/common.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" style=""></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous" style=""></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" style=""></script>

            </body>

            </html>
