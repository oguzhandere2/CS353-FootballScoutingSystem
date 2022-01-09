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
             <li class="breadcrumb-item"> <a href="agency_homepage.php" class="text-light">Home</a> </li>
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
  <div class="py-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center text-white" style="">Compare Scouts</h1>
        </div>
      </div>
    </div>
  </div>
<form class="" method="POST">
  <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 id="scoutNameSpan1" class="text-white">Scout 1:&nbsp;</h2>
        </div>
        <div class="col-md-5  offset-md-1" style="">
          <h2 id="scoutNameSpan2" class="text-white">Scout 2:&nbsp;</h2> 
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          
            <div id="scoutSearchTBD" class="input-group">
              <input type="text" class="form-control col-md-5" id="scoutCompareSearch1" onkeyup="scoutCompareSearchFunc1()" placeholder="First scout..." style="">
              
            </div>
          
        </div>
        <div class="col-md-6" style="">
          <div class="col-md-10 offset-md-2" style="">
            
              <div id="scoutSearchTBD2" class="input-group">
                <input type="text" class="form-control col-md-7" id="scoutCompareSearch2" onkeyup="scoutCompareSearchFunc2()" placeholder="Second scout..." style="">
                
              </div>
            
          </div>
        </div>
      </div>
      
      <div class="row">
        <div id = "sdiv2DeleteAfterSelection" class="col-md-3">
                                        <ul id="scoutCompareUL1" class="list-group">
                                            <?php
                                            if (session_id() == '') {
                                                //session has not started
                                                session_start();
                                            }

                                            if (!isset($db)) {
                                                include("config.php");
                                            }
                                           
                  
                                            $outputScoutAgencyId = $_SESSION['loggedInUserID'];

                                            $result = mysqli_query($db, "select * from scout") or die("Unable to access" . mysqli_error());

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $outputScoutID = $row["user_id"];
                                                $outputAge = $row["age"];
                                                
                                                $scoutName = mysqli_query($db, "select name from user where id = '$outputScoutID'") or die("Unable to access" . mysqli_error());
                                                $secondRow2 = mysqli_fetch_assoc($scoutName);

                                                $outputScoutName = $secondRow2['name'];

                                                echo "<li id='$outputScoutID'> <button id='$outputScoutID' class=\"list-group-item list-group-item-action list-group-item-dark\" onClick=\"modifyScoutTable1(this)\" type=\"button\">$outputScoutName | $outputAge </button></li>";
                                            }
                                            ?>
                                        </ul>
        </div>
        <div class="py-2 col-md-2" style=""></div>
        <div class="col-md-5">
        <div id = "sdiv2DeleteAfterSelection2" class="col-md-8 offset-md-5">
                                        <ul id="scoutCompareUL2" class="list-group">
                                            <?php
                                             if (session_id() == '') {
                                                //session has not started
                                                session_start();
                                            }

                                            if (!isset($db)) {
                                                include("config.php");
                                            }
                                           
                  
                                            $outputScoutAgencyId = $_SESSION['loggedInUserID'];

                                            $result = mysqli_query($db, "select * from scout ") or die("Unable to access" . mysqli_error());

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $outputScoutID = $row["user_id"];
                                                $outputAge = $row["age"];
                                                
                                                $scoutName = mysqli_query($db, "select name from user where id = '$outputScoutID'") or die("Unable to access" . mysqli_error());
                                                $secondRow2 = mysqli_fetch_assoc($scoutName);

                                                $outputScoutName = $secondRow2['name'];

                                                echo "<li id='$outputScoutID'> <button id='$outputScoutID' class=\"list-group-item list-group-item-action list-group-item-dark\" onClick=\"modifyScoutTable2(this)\" type=\"button\">$outputScoutName | $outputAge </button></li>";
                                            }
                                            ?>
                                        </ul>
        </div>
        </div>
      </div>
      <div class="row" style="">
        <div class="py-5 col-md-5" style="">
          <div class="table-responsive">
            <table id="scoutCompareTable1" class="table text-white">
                <script>
                function modifyScoutTable1(button)
                {
                    
                    var scoutID,xhttp,div2delete1,div2delete2,textValue,spanElement;
                    scoutID = button.id;
                    textValue = button.textContent || button.innerText;
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("scoutCompareTable1").innerHTML = this.responseText;
                        div2delete1 = document.getElementById("sdiv2DeleteAfterSelection");
                        //div2delete1.remove();

                        div2delete2 = document.getElementById("scoutSearchTBD");
                        //div2delete2.remove();
                        
                        spanElement = document.getElementById("scoutNameSpan1");
                        spanElement.innerText = textValue;
                      }
                    };
                    xhttp.open("GET", "getScoutTable.php?scoutid="+scoutID, true);
                    xhttp.send();
                }
                </script>
            </table>
          </div>
        </div>
        <div class="py-5 col-md-2" style=""></div>
        <div class="col-md-5">
          <div class="table-responsive my-5">
            <table id="scoutCompareTable2" class="table text-white">    
              <script>
                function modifyScoutTable2(button)
                {
                    var scoutID,xhttp,div2delete1,div2delete2,textValue,spanElement;
                    scoutID = button.id;
                    textValue = button.textContent || button.innerText;
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("scoutCompareTable2").innerHTML = this.responseText;
                        div2delete1 = document.getElementById("sdiv2DeleteAfterSelection2");
                        //div2delete1.remove();

                        div2delete2 = document.getElementById("scoutSearchTBD2");
                        //div2delete2.remove();
                        
                        spanElement = document.getElementById("scoutNameSpan2");
                        spanElement.innerText = textValue;
                      }
                    };
                    xhttp.open("GET", "getScoutTable.php?scoutid="+scoutID, true);
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
                function scoutCompareSearchFunc1()
                {

                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById("scoutCompareSearch1");

                    filter = input.value.toUpperCase();

                    ul = document.getElementById("scoutCompareUL1");
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
                
                function scoutCompareSearchFunc2()
                {

                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById("scoutCompareSearch2");

                    filter = input.value.toUpperCase();

                    ul = document.getElementById("scoutCompareUL2");
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

