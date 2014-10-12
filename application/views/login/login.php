<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Ahmad Ridwan | Login Admin</title>

  <!-- Core CSS - Include with every page -->
  <link href="<?php echo base_url()?>media/backend/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>media/backend/font-awesome/css/font-awesome.css" rel="stylesheet">

  <!-- SB Admin CSS - Include with every page -->
  <link href="<?php echo base_url()?>media/backend/css/sb-admin.css" rel="stylesheet">

</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Silakan Login</h3>
          </div>
          <div class="panel-body">
            <form role="form" action="<?php echo current_url()?>" method="POST">
              <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Password" name="password" type="password">
                  <input style="display: none;"  class="form-control" placeholder="fake" name="fake" type="text" value="">
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Core Scripts - Include with every page -->
  <script src="<?php echo base_url()?>media/backend/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url()?>media/backend/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>media/backend/js/plugins/metisMenu/jquery.metisMenu.js"></script>

  <!-- SB Admin Scripts - Include with every page -->
  <script src="<?php echo base_url()?>media/backend/js/sb-admin.js"></script>

</body>

</html>
