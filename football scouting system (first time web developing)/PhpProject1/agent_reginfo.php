<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />-->
<div class="container">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="club_homepage.css" type="text/css">
</head>

    
  <form action="" method="post">
    <h1 style="padding-top: 60px; color: white">Agent Information</h1>
    <hr>

    <div class="row">
      <!-- left column --> 

      <!-- edit form column -->
      <div class="col-md-7 personal-info">

        <h3 style="color: white">Required Agent Information </h3>

        <!-- Change this to a <form> to reproduce your original issue -->
        <div class="form-horizontal" role="form">
          <div class="form-group">
            <label style="color: white" class="col-lg-3 control-label">Age:</label>
            <div class="col-lg-8">
              <input class="form-control" name="age" type="text" required="required">
            </div>
          </div>
          <div class="form-group">
            <label style="color: white"  class="col-lg-3 control-label">Nationality:</label>
            <div class="col-lg-8">
              <input class="form-control" name="nationality" type="text" required="required" >
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes" formaction = "process3.php">
            </div>
          </div>
        </div>
      </div>
    </div>

<hr>
</form>
</div>