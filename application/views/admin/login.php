<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>::Raj Dental Clinic::</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/Bootstrap3.3.7.css'?>">
    
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-icons/font-awesome4.6.3/css/font-awesome.css'?>" type="text/css">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/all.css'?>">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/select2.min.css'?>">

  <!-- Custom Fonts -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-icons/my-fonts/my-fonts.css'?>" type="text/css">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.css'?>">
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/skin-blue.css'?>">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css'?>">

<script type="text/javascript">
  //var baseurl = 'http://hms/';
</script>

</head>

<body>

<div class="login-page">
    <div class="mask">
        
        <div class="row">
            
            <div class="col-md-offset-5 col-md-7" style="margin-top:10px; z-index:3;">
                
                <div class="col-sm-12 login-logo">                    
                    <img src="<?php echo base_url().'assets/img/logo-lg.png'?>" class="" alt="logo"/>
                </div>
                
                <div class="login-form col-sm-12">

                    <div class="login-content col-sm-offset-2 col-md-offset-2 col-lg-offset-3 col-sm-8 col-lg-6">

                        <div class="form-login-error" style="display:none;">
                            <h3>Invalid login</h3>
                            <p>Please Enter Correct Username and Password!</p>
                        </div>

                        <div class="form-forgotpass-error" style="display:none;">
                            <h3>Wrong Email</h3>
                            <p>Please Enter correct Email!</p>
                        </div>

                        <div class="form-forgotpass-success" style="display:none;">
                            <h3>Password Successfully Changed</h3>
                            <h5>Please Login.</h5>
                        </div>
                    
                        <div class="spinner" style="display:none;">
                          <i class="fa fa-4x fa-spinner fa-spin" style="color:#7c2579;"></i>
                        </div>

                        <form role="form" method="POST" action="<?php echo base_url().'login/login_auth'?>" id="form_login" novalidate="novalidate">

                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>

                                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name" />
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </div>

                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                            </div>

                        </div>

                        <div class="row login-help">
                           <!-- <div class="col-xs-6 remember">
                              <div class="checkbox icheck">
                                <label>
                                  <input type="checkbox">Remember Me
                                </label>
                              </div>
                            </div> -->
                            <!-- /.col -->
                            <div class="col-xs-12 forgot_pass">
                              <div style="cursor:pointer;" onclick="show_forgot_password_form();">Forgot Password ?</div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-login">
                                <i class="entypo-login"></i>
                                Login
                            </button>
                        </div>

                        </form>

                        <form role="form" method="POST" action="<?php echo base_url().'login/forgot_pass'?>" id="forgot_pass_form" novalidate="novalidate" style="display:none;">

                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>

                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" />
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </div>

                                <input type="password" class="form-control" name="fpassword" id="fpassword" placeholder="Password" autocomplete="off" />
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </div>

                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" autocomplete="off" />
                            </div>

                        </div>

                        <div class="row login-help">
                            <div class="col-xs-12 text-right login_link">
                              <div style="cursor:pointer;" onclick="show_login_form();">Remember password ?</div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-login">
                                <i class="entypo-login"></i>
                                Update Password
                            </button>
                        </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!-- bg bottom img -->
        <div class="login-bg-bottom-img hidden-sm hidden-xs">
            <img src="<?php echo base_url().'assets/img/bg_bottom.png'?>" class="" alt="bottom_img">
        </div> <!--/.bg bottom img -->
       
    </div><!--/.mask -->

</div><!--/.login-page-->

<!-- Script to load -->

<!-- jQuery 2.2.3 -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.js'?>"></script>

<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap3.3.7.js'?>"></script>

<!-- Jquery validation -->
<script src="<?php echo base_url().'assets/plugins/jquery-validation/jquery.validate.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jquery-validation/additional-methods.js'?>"></script>

<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/js/app.js'?>"></script>

<!-- custom js -->
<script src="<?php echo base_url().'assets/js/login.js'?>"></script>
</body>
</html>

