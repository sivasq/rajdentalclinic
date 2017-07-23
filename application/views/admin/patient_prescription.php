<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- mask -->
<div class="mask">
  <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
        	Add New Patient        	
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="#">Dashboard</a></li>
        	<li class="active">Add New Patient</li>
      	</ol>
    	<hr/>
    </section>

    <!-- Main content -->
    <section class="content">
    	
    	<!-- Small boxes (Stat box) -->
    	<div class="row">
        <div class="col-md-12">
        <div class="add_patient">
        <form enctype="multipart/form-data" method="post" action="#" class="form-horizontal form-groups-bordered" role="form">

                    <div class="form-group">
                        <label class="col-sm-3 col-md-2 control-label" for="field-1">Patient ID</label>

                        <div class="col-sm-7">
                            <input type="text" id="field-1" class="form-control" name="name" value=RJ001 readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-md-2 control-label" for="field-1">Patient Name</label>

                        <div class="col-sm-7">
                            <input type="email" id="field-1" class="form-control" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-md-2 control-label" for="field-1">Age</label>

                        <div class="col-sm-7">
                            <input type="password" id="field-1" class="form-control" name="password">
                        </div>
                    </div>                                
                    
                    <div class="form-group">
                        <label class="col-sm-3 col-md-2 control-label" for="field-1">Phone</label>

                        <div class="col-sm-7">
                            <input type="text" id="field-1" class="form-control" name="phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-md-2 control-label" for="field-ta">Address</label>

                        <div class="col-sm-7">
                            <textarea id="field-ta" class="form-control" name="address"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-md-2 control-label" for="field-ta">Date Of Birth</label>

                        <div class="col-sm-7">
                            <input type="text" id="field-1" class="form-control" name="phone">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 col-md-2 control-label" for="field-ta">Sex</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="sex">                                
                                <option value="male">male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-md-2 control-label" for="field-ta">Blood Group</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="blood_group">
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group action">
                    <div class="col-sm-offset-4 col-md-offset-3">
                        <button type="submit" class="btn btn-success col-sm-3">Submit</button>
                        <button type="submit" class="btn btn-cancel col-sm-offset-1 col-sm-3">Cancel</button>
                    </div>
                    </div>
        </form>
        </div>
        </div>
    	</div>
    	<!--/.Small boxes (Stat box) -->

    </section>
    <!-- /.Main content -->

    <!-- bg bottom img -->
    <div class="bg-bottom-img hidden-md hidden-sm hidden-xs">
        <img src="<?php echo base_url().'assets/img/bg_bottom.png'?>" class="" alt="bottom_img">
    </div>
    <!-- /.bg bottom img -->

</div>
<!--/.mask-->
</div>
<!-- /.content-wrapper -->
