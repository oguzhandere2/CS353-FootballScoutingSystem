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
  <div class="py-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12 py-2">
          <h1 class="display-4 py-0 text-white" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OFFER</h1>
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
                  <th >Name</th>
                  <th >Offerer Club</th>
                  <th>Role In Team</th>
                  <th>Wage(million euro)</th> 
                  <th>Championship Bonus(million euro)</th>
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
                    $offer_id = $_GET['selectedofferid'];
                    
                    $result = mysqli_query($db, "select * from offer where id = '$offer_id' ") or die("Unable to access" . mysqli_error());
                    $row = mysqli_fetch_array($result);
                    $footballer_id = $row ['footballer_id'];
                    $offerer_club_user_id = $row ['offerer_club_user_id'];
                    
                    $result2 = mysqli_query($db, "select * from user where id = '$offerer_club_user_id' ") or die("Unable to access" . mysqli_error());
                    $row2 = mysqli_fetch_array($result2);
                    $offerer_club_name = $row2 ['name'];
                    
                    $result3 = mysqli_query($db, "select * from footballer where id = '$footballer_id' ") or die("Unable to access" . mysqli_error());
                    $row3 = mysqli_fetch_array($result3);
                    $footballer_name = $row3 ['name'];
                    
                    $role_in_team = $row['role_in_team'];
                    $wage = $row['wage'];
                    $championshipbonus = $row['bonus'];
                    echo "<tr><td>$footballer_name</td><td> $offerer_club_name</td><td>$role_in_team</td><td>$wage</td><td>$championshipbonus</td></tr>";     
                    
                        ?>       
                  
              </tbody>
            </table>
              
              <form  action="" method="post">
              <div class="checkbox mb-3 text-white">
                 <label>
                     <input name= "check_box" type="checkbox" value="1"> Accept offer
                </label>
                 </div>
                  
                  <div> 
                       <input  class="text" value="<?php  if(!isset($db) ) 
                    {
                        include("config.php");
                    }
                    if(session_id() == '')
                    {
                        //session has not started
                        session_start();
                    }
                    $offer_id = $_GET['selectedofferid'];
                    echo $offer_id;?>"
                                  type = "hidden" name="selected_offer_id" tabindex="1" type="text" readonly required="required"/>
                                </div>
    
        <div class="text-white">
            <div ><button class="btn btn-primary" type ="submit" formaction="process_respond_offer.php">Send your respond</button></div>
        </div> </form>
              
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

