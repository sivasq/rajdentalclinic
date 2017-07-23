<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- mask -->
<div class="mask">

<!-- Main content -->
<section class="content">

  <div class="login-page">
    <div class="mask">
        
        <div class="row" style="margin-top:5%;">
            
            <div class="col-md-offset-4 col-md-4">
                
                <div class="login-form col-sm-12">

                    <div class="login-content">

                        <div class="form-login-error" style="display:none;">
                            <h3>Invalid login</h3>
                            <p>Please Enter Correct Password!</p>
                        </div>                        
                    
                        <div class="spinner" style="display:none;">
                          <i class="fa fa-4x fa-spinner fa-spin" style="color:#7c2579;"></i>
                        </div>

                        <form role="form" method="POST" action="<?php echo base_url().'profile_login/profile_login_auth'?>" id="profile_login" novalidate="novalidate">

                        <div style="margin-bottom:20px;">
                          <h4> Profile Page Login</h4>
                        </div>

                        <input type="hidden" name="user_name" id="user_name" value="admin" />

                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </div>

                                <input type="password" class="form-control" name="password" id="password" placeholder="Profile Password" autocomplete="off" />
                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-login">
                                <i class="entypo-login"></i>
                                Login
                            </button>
                        </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div><!--/.mask -->

</div><!--/.login-page-->

</section>
<!-- /.Main content -->

</div>
<!--/.mask-->
</div>
<!-- /.content-wrapper -->

<!-- jQuery 2.2.3 -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.js'?>"></script>

<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap3.3.7.js'?>"></script>

<!-- Jquery validation -->
<script src="<?php echo base_url().'assets/plugins/jquery-validation/jquery.validate.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jquery-validation/additional-methods.js'?>"></script>

<!-- custom js -->
<script src="<?php echo base_url().'assets/js/login.js'?>"></script>