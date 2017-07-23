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
        	<li><a href="<?php echo base_url(). 'admin/dashboard' ?>">Dashboard</a></li>
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
        <div class="col-md-offset-1">
        <form enctype="multipart/form-data" method="post" action="<?php echo base_url(). 'admin/new_patient_create'; ?>" class="form-horizontal form-groups-bordered" id="new_patient_create" role="form">

                    <div class="form-group">
                        <label class="col-sm-4 col-md-3 control-label" for="p_id">Patient ID</label>

                        <div class="col-sm-7">
                            <input type="text" id="p_id" class="form-control" name="p_id" value=<?php echo $p_id; ?> readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-md-3 control-label" for="p_name">Patient Name</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="name_prefix" name="name_prefix">
                                <option value=""></option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Dr">Dr</option>
                            </select>
                        </div>
                        <div class="col-sm-5" style="padding-left: 0px;">
                            <input type="text" id="p_name" class="form-control" name="p_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-md-3 control-label" for="p_dob">Date of Birth</label>

                        <div class="col-sm-3">
                            <input type="text" id="p_dob" class="form-control" name="p_dob" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                    
                        <label class="col-sm-1 col-md-1 control-label text-right" for="p_age">Age</label>

                        <div class="col-sm-3">
                            <input type="text" id="p_age" class="form-control" name="p_age" data-inputmask="'alias': '9', 'repeat': 2,'greedy' : false" data-mask>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-md-3 control-label" for="p_blood_group">Blood Group</label>
                        <div class="col-sm-3">
                            <select class="form-control" id="p_blood_group" name="p_blood_group">
                                <option value=""></option>
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

                        <label class="col-sm-1 col-md-1 control-label text-right" for="p_sex">Sex</label>
                        <div class="col-sm-3">
                            <select class="form-control" id="p_sex" name="p_sex">
                                <option value=""></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-4 col-md-3 control-label" for="p_phone">Phone</label>

                        <div class="col-sm-7">
                            <input type="text" id="p_phone" class="form-control" name="p_phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-md-3 control-label" for="p_phone1">Phone</label>

                        <div class="col-sm-7">
                            <input type="text" id="p_phone1" class="form-control" name="p_phone1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-md-3 control-label" for="p_address">Address</label>

                        <div class="col-sm-7">
                            <textarea id="p_address" class="form-control" name="p_address"></textarea>
                        </div>
                    </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="treat_details">Previous Medical History</label>
                    <div class="col-sm-7"> 
                        <select class="form-control select2 multiple" id="med_history" name="med_history[]" multiple="multiple" data-placeholder="" style="width: 100%;">
                          <option value="No Relavent Medical History">No Relavent Medical History</option>
                          <option value="Thyroid Dysfunction">Thyroid Dysfunction</option>
                          <option value="Neurological Disorders">Neurological Disorders</option>
                          <option value="Urological Disorders">Urological Disorders</option>
                          <option value="Anemia">Anemia</option>
                          <option value="Cardiac Disorders">Cardiac Disorders</option>
                          <option value="Diabetis">Diabetis</option>
                          <option value="Hepatic Disorders">Hepatic Disorders</option>
                          <option value="Bleeding Disorders">Bleeding Disorders</option>
                          <option value="Previoue Surgery">Previoue Surgery</option>
                          <option value="Under Long Tern Medications">Under Long Tern Medications</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="med_history_details">Medical History Details</label>
                    <div class="col-sm-7">
                        <textarea id="med_history_details" class="form-control" name="med_history_details"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="diagnosis">Diagnosis</label>
                    <div class="col-sm-7">
                        <textarea id="diagnosis" class="form-control" name="diagnosis"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="treat_type">Treatment Type</label>
                    <div class="col-sm-7" >
                        <select class="form-control" id="treat_type" name="treat_type">
                            <option value=""></option> 
                            <?php foreach($treat_types as $treat_type) { ?>
                            <option value="<?php echo $treat_type->treat_name ?>"><?php echo $treat_type->treat_name ?></option> 
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="treat_details">Treatment Details</label>
                    <div class="col-sm-7">
                        <textarea id="treat_details" class="form-control" name="treat_details"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="treat_cost">Treatment Total Cost</label>
                    <div class="col-sm-7">
                        <input type="text" id="treat_cost" class="form-control" name="treat_cost" data-inputmask="'alias': '9', 'repeat': 9,'greedy' : false" data-mask>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="fees">Fees</label>
                    <div class="col-sm-7">                        
                        <input type="text" id="fees" class="form-control" name="fees" data-inputmask="'alias': '9', 'repeat': 9,'greedy' : false" data-mask>
                    </div>
                </div>

                <div class="form-group action">
                    <div class="col-sm-offset-5 col-md-offset-4">
                        <button type="submit" class="btn btn-success col-sm-3">Submit</button>
                        <button type="submit" class="btn btn-cancel col-sm-offset-1 col-sm-3">Cancel</button>
                    </div>
                </div>
        </form>
        </div>
        </div>
        </div>
    	</div>
    	<!--/.Small boxes (Stat box) -->

    </section>
    <!-- /.Main content -->

</div>
<!--/.mask-->
</div>
<!-- /.content-wrapper -->
