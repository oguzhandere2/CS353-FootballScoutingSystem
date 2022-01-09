<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
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
       <div class="col-md-6">
          <ul class="breadcrumb m-1 shadow-none bg-dark" style="">
              <li class="breadcrumb-item"> <a href="agency_homepage.php" class="text-light">Home</a> </li>
              <li class="breadcrumb-item"><a href="organizations.php" class="text-light">Organizations</a></li>
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
        <div class="col-md-12 py-2">
          <h1 class="display-4 py-0 text-white" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TASKS</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr class="text-white" >
                  <th >Club</th>
                  <th >Position</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody class="text-white">
                  <?php
                    if(!isset($db) ) 
                    {
                        include("config.php");
                    }
                    if(session_id() == '')
                    {
                        //session has not started
                        session_start();
                    }
                    $userid = $_SESSION['loggedInUserID'];
                              
                    $result4 = mysqli_query($db, "select * from task where scouting_agency_user_id = '$userid' ") or die("Unable to access" . mysqli_error());
                    $resultRow = mysqli_fetch_array($result4);
                   if ($resultRow != NULL)
                   {
                    $result = mysqli_query($db, "select * from task where scouting_agency_user_id = '$userid' ") or die("Unable to access" . mysqli_error());
                
                    while ($row = mysqli_fetch_assoc($result) ) 
                    {
                      $status = $row['status'];
                      $positions = $row['positions'];
                      $club_user_id = $row['club_user_id']; 
                      $result2 = mysqli_query($db, "select * from user where id = '$club_user_id' ") or die("Unable to access" . mysqli_error());
                      $row2 = mysqli_fetch_array($result2);
                      $club_name = $row2['name'];
                      echo "<tr><td>$club_name</td><td>$positions</td><td>$status</td></tr>";   
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>

</html>

