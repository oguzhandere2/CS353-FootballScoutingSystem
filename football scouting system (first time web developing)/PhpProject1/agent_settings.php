<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="club_settings.css" type="text/css">
</head>

<body>
  <form action="" method="post">
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
               <li class="breadcrumb-item"><a href="agent_homepage.php" class="text-light">Home</a></li>
                <li class="breadcrumb-item"><a href="organizations.php" class="text-light">Organizations</a></li>
            <li class="breadcrumb-item"><a href="agent_offers.php" class="text-light">Offers</a></li>
            
           
          </ul>
        </div>
         
       
      </div>
  <div class="py-0">
    <div class="container">
      <div class="row">
        <div class="py-2 col-md-12">
          <h1 class="text-center">SETTINGS</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="py-0" style="">
     
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4 class="" contenteditable="false">Username:</h4>
        </div>
        <div class="col-md-6">
          
            <div class="form-group"> <input type="text" required="required" name= "agent_set_username" class="form-control"> </div>
          
        </div>
      </div>
      <div class="row">
        <div class="col-md-6" style="">
          <h4 class="" contenteditable="false">Password:</h4>
        </div>
        <div class="col-md-6">
          
            <div class="form-group"> <input type="password" name= "agent_set_password" class="form-control"> </div>
          
        </div>
      </div>
    
  
  
    
      <div class="row">
        <div class="col-md-6">
          <h4 class="" contenteditable="false">Nationality:</h4>
        </div>
        <div class="col-md-6">
         
            <div class="form-group"> <input type="text"  name= "agent_set_nationality" class="form-control"> </div>
          
        </div>
      </div>
    
  
 
    
    </div>
  </div>
       
      
     
  <div class="py-5">
    <div class="container">
      <div class="row">
          <div class="col-md-12 text-right">
           <div class="form-group" > 
        <input type="submit" class="btn btn-primary" value="Save Changes" formaction = "process_settings.php"></div></div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</form>
  </body>
<form action="" method="post"> <input type="submit" class="btn btn-danger" value="Delete Account" formaction = "delete_account.php"></form>
</html>


