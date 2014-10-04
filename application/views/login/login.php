<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Ahmad Ridwan | <?php echo $title?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="<?php echo base_url()?>media/login/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <link href="<?php echo base_url()?>media/login/css/styles.css" rel="stylesheet">
    </head>
    <body>
      <!--login modal-->
      <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="text-center">Login</h1>
            </div>
            <div class="modal-body">
              <?php 
              echo validation_errors();
              $attr = array('class'=>'form col-md-12 center-block');
              echo form_open(current_url(), $attr);
              ?>
              <div class="form-group">
                <input type="text" class="form-control input-lg" name="username" placeholder="Username">
              </div>
              <div class="form-group">
                <input type="password" class="form-control input-lg" name="password" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Sign In">
              </div>
              <?php echo form_close()?>
            </div>
            <div class="modal-footer">
              <div class="col-md-12">
              </div>	
            </div>
          </div>
        </div>
      </div>
      <!-- script references -->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
      <script src="<?php echo base_url()?>media/login/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url()?>media/login/js/scripts.js"></script>
    </body>
    </html>