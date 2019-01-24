<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bug Tracking Web</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_login') ?>/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_login') ?>/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_login') ?>/css/animate.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_login') ?>/css/style.css">
  <!-- =======================================================
    Theme Name: Bethany
    Theme URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>

  <body>
    <!--header-->
    <header class="main-header" id="header">
      <div class="bg-color">
        <!--nav-->

        <!--/ nav-->
        <div class="container text-center">
          <div class="wrapper wow fadeInUp delay-05s">
            <h2 class="top-title">Welcome to</h2>
            <h2 class="title">Bug Tracking</h2>
            <h4 class="sub-title">Login as :</h4>
            <div class="container">
              <button type="submit" class="btn btn-submit-red" data-toggle="modal" data-target="#exampleModalCenter"> &nbsp;&nbsp;&nbsp; Client  &nbsp;&nbsp;&nbsp;
              </button>
              <button type="submit" class="btn btn-submit-yellow" data-toggle="modal" data-target="#exampleModalCenter2">Department</button>
              <button type="submit" class="btn btn-submit-green" data-toggle="modal" data-target="#exampleModalCenter3">Moderator</button>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--/ header-->

    <!---->
    <!---->
    <footer class="" id="footer">
      <div class="container">
        <div class="row">

        </div>
      </div>
    </div>
  </footer>
  <!---->
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Login Client</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- <form action="<?php echo site_url('Login/proses_login')?>" method = "post"> -->
            <div class="form-group">
              <?php echo form_open('login/proses_login'); ?>
              <?php echo $this->session->flashdata('msg');?>
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
            <?php echo form_close(); ?>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Login Department</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open('login/proses_login'); ?>
          <?php echo $this->session->flashdata('msg');?>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name = "email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
               <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <?php echo form_close(); ?>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Login Moderator</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open('login/proses_login'); ?>
          <?php echo $this->session->flashdata('msg');?>
          <div class="form-group">
           <label for="exampleInputEmail1">Email address</label>
           <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
         </div>
         <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<!--contact ends-->
<script src="<?php echo base_url('assets_login') ?>/js/jquery.min.js"></script>
<script src="<?php echo base_url('assets_login') ?>/js/jquery.easing.min.js"></script>
<script src="<?php echo base_url('assets_login') ?>/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets_login') ?>/js/wow.js"></script>
<script src="<?php echo base_url('assets_login') ?>/js/custom.js"></script>
<script src="<?php echo base_url('assets_login') ?>/contactform/contactform.js"></script>

</body>
</html>
