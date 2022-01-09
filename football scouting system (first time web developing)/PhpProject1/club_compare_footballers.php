<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="club_homepage.css" type="text/css">
</head>

<body>
  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6"><img class="img-fluid d-block" src="images/icon.png">
                  <div class="row">
                    <div class="col-md-12">
                      <h5 class="text-white">
                            <?php
                     if(session_id() == '')
                    {
                        //session has not started
                        session_start();
                    }
                    
                    if(! isset($db))
                    {
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
          </div>
        </div>
        <div class="col-md-6">
         <ul class="breadcrumb m-1 shadow-none bg-dark" style="">
             <li class="breadcrumb-item"> <a href="<?php
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
                                    ?>" class="text-light">Home</a> </li>
            
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
                                    }?>" class="text-light">Settings</a></li>
          </ul>
        </div>
       <form action="" method="post">
        <div class="col-md-2 text-white">
            <div class="col-md-12 py-2"><button class="btn btn-dark" type ="submit" formaction="index.php">Logout</button></div>
        </div> </form>
      </div>
    </div>
  </div>
  <div class="py-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center text-white" style="">Compare Footballers</h1>
        </div>
      </div>
    </div>
  </div>
<form class="" method="POST">
  <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 id="footballerNameSpan1" class="text-white">Footballer 1:&nbsp;</h2>
        </div>
        <div class="col-md-5  offset-md-1" style="">
          <h2 id="footballerNameSpan2" class="text-white">Footballer 2:&nbsp;</h2> 
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          
            <div id="footballerSearchTBD" class="input-group">
              <input type="text" class="form-control col-md-5" id="footballerCompareSearch1" onkeyup="footballerCompareSearchFunc1()" placeholder="First footballer..." style="">
              
            </div>
          
        </div>
        <div class="col-md-6" style="">
          <div class="col-md-10 offset-md-2" style="">
            
              <div id="footballerSearchTBD2" class="input-group">
                <input type="text" class="form-control col-md-7" id="footballerCompareSearch2" onkeyup="footballerCompareSearchFunc2()" placeholder="Second footballer..." style="">
                
              </div>
            
          </div>
        </div>
      </div>
      
      <div class="row">
        <div id = "div2DeleteAfterSelection" class="col-md-3">
                                        <ul id="footballerCompareUL1" class="list-group">
                                            <?php
                                            if (session_id() == '') {
                                                //session has not started
                                                session_start();
                                            }

                                            if (!isset($db)) {
                                                include("config.php");
                                            }

                                            $result = mysqli_query($db, "select * from footballer") or die("Unable to access" . mysqli_error());

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $outputFootballerID = $row["id"];
                                                $outputFootballerName = $row["name"];
                                                $outputFootballerAge = $row["age"];

                                                echo "<li id='$outputFootballerID'> <button id='$outputFootballerID' class=\"list-group-item list-group-item-action list-group-item-dark\" onClick=\"modifyFootballerTable1(this)\" type=\"button\">$outputFootballerName | $outputFootballerAge </button></li>";
                                            }
                                            ?>
                                        </ul>
        </div>
        <div class="py-2 col-md-2" style=""></div>
        <div class="col-md-5">
        <div id = "div2DeleteAfterSelection2" class="col-md-8 offset-md-5">
                                        <ul id="footballerCompareUL2" class="list-group">
                                            <?php
                                            if (session_id() == '') {
                                                //session has not started
                                                session_start();
                                            }

                                            if (!isset($db)) {
                                                include("config.php");
                                            }

                                            $result2 = mysqli_query($db, "select * from footballer") or die("Unable to access" . mysqli_error());

                                            while ($row = mysqli_fetch_assoc($result2)) {
                                                $outputFootballerID = $row["id"];
                                                $outputFootballerName = $row["name"];
                                                $outputFootballerAge = $row["age"];

                                                echo "<li id='$outputFootballerID'> <button id='$outputFootballerID' class=\"list-group-item list-group-item-action list-group-item-dark\" onClick=\"modifyFootballerTable2(this)\" type=\"button\">$outputFootballerName | $outputFootballerAge </button></li>";
                                            }
                                            ?>
                                        </ul>
        </div>
        </div>
      </div>
      <div class="row" style="">
        <div class="py-5 col-md-5" style="">
          <div class="table-responsive">
            <table id="footballerCompareTable1" class="table text-white">
                <script>
                function modifyFootballerTable1(button)
                {
                    
                    var footballerID,xhttp,div2delete1,div2delete2,textValue,spanElement;
                    footballerID = button.id;
                    textValue = button.textContent || button.innerText;
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("footballerCompareTable1").innerHTML = this.responseText;
                        div2delete1 = document.getElementById("div2DeleteAfterSelection");
                        //div2delete1.remove();

                        div2delete2 = document.getElementById("footballerSearchTBD");
                        //div2delete2.remove();
                        
                        spanElement = document.getElementById("footballerNameSpan1");
                        spanElement.innerText = textValue;
                      }
                    };
                    xhttp.open("GET", "getFootballerTable.php?footballerid="+footballerID, true);
                    xhttp.send();
                }
                </script>
            </table>
          </div>
        </div>
        <div class="py-5 col-md-2" style=""></div>
        <div class="col-md-5">
          <div class="table-responsive my-5">
            <table id="footballerCompareTable2" class="table text-white">    
              <script>
                function modifyFootballerTable2(button)
                {
                    var footballerID,xhttp,div2delete1,div2delete2,textValue,spanElement;
                    footballerID = button.id;
                    textValue = button.textContent || button.innerText;
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("footballerCompareTable2").innerHTML = this.responseText;
                        div2delete1 = document.getElementById("div2DeleteAfterSelection2");
                        //div2delete1.remove();

                        div2delete2 = document.getElementById("footballerSearchTBD2");
                        //div2delete2.remove();
                        
                        spanElement = document.getElementById("footballerNameSpan2");
                        spanElement.innerText = textValue;
                      }
                    };
                    xhttp.open("GET", "getFootballerTable.php?footballerid="+footballerID, true);
                    xhttp.send();
                }
              </script>
            </table>
          </div>
        </div>
         
      </div>
     
    </div>
  </div>
  </form>
  <script>
                function footballerCompareSearchFunc1()
                {

                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById("footballerCompareSearch1");

                    filter = input.value.toUpperCase();

                    ul = document.getElementById("footballerCompareUL1");
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
                
                function footballerCompareSearchFunc2()
                {

                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById("footballerCompareSearch2");

                    filter = input.value.toUpperCase();

                    ul = document.getElementById("footballerCompareUL2");
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>