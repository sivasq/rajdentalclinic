<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- mask -->
<div class="mask">
  <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Doctor Profile
        </h1>
        <ol class="breadcrumb">
          <li><a href="#">Dashboard</a></li>
          <li class="active">Profile</li>
        </ol>
      <hr/>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row profile">
          <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#profile" data-toggle="tab">profile</a></li>
              <li><a href="#change_password" data-toggle="tab">Change Password</a></li>              
              <li><a href="#sign" data-toggle="tab">Add / Change Signature</a></li>              
            </ul>

            <div class="tab-content">
              <?php foreach($profile_info as $info) ?>
              <div class="active tab-pane" id="profile">
                <form class="form-horizontal" method="post" action="<?php echo base_url(). 'admin/profile_update'; ?>" id="profile_update">
                  <div class="form-group">
                    <label for="user_name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" value="<?php echo $info->user_name ?> ">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="user_email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-8">
                      <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email" value="<?php echo $info->user_email ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="user_address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-8">
                      <textarea class="form-control" id="user_address" name="user_address" placeholder="Address"><?php echo $info->user_address ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="user_phone" class="col-sm-3 control-label">Phone</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="user_phone" name="user_phone" placeholder="Phone" value="<?php echo $info->user_phone ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="change_password">
                <form role="form" class="form-horizontal form-groups-bordered" id="update_password" action="<?php echo base_url(). 'admin/update_password'; ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="new_pass" class="col-sm-4 control-label">New Password</label>

                            <div class="col-sm-5">
                                <input type="password" name="new_pass" class="form-control" id="new_pass">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="confirm_new_pass" class="col-sm-4 control-label">Confirm New Password</label>

                            <div class="col-sm-5">
                                <input type="password" name="confirm_new_pass" class="form-control" id="confirm_new_pass">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 control-label col-sm-offset-1">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </div>
                    </form>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="sign">
                
                <form role="form" class="form-horizontal form-groups-bordered" id="sign_upload" action="<?php echo base_url(). 'admin/sign_upload'; ?>" method="post" enctype="multipart/form-data">                    
                <div style="margin-top: 30px;"></div>
                    <div class="form-group">
                        <label for="confirm_new_pass" class="col-sm-4 control-label">Select your Signature: </label>

                        <div class="col-sm-5">
                            <input type="file" name="sign" id="sign"> 
                        </div>
                    </div>

                    <div class="row" style="margin-top: 15px; margin-bottom: 25px;">
                      <div class="col-sm-12" style="text-align: center;">
                        <p style="font-size: 16px;"> Image size 300 X 200 , image must be any one of the ( jpg | jpeg | png | gif ) formats.</p>
                      </div>
                    </div>
                                       
                    <div class="form-group">
                        <div class="col-sm-5 control-label col-sm-offset-1">
                            <input type="submit" class="btn btn-success" value="Upload">
                        </div>
                    </div>

                </form>

              </div>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->  
              
        </div>
    </section>
    <!-- /.Main content -->

</div>
<!--/.mask-->
</div>
<!-- /.content-wrapper -->
