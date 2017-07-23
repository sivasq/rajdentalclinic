<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- mask -->
<div class="mask">
  <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
        	Patient Details        	
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="<?php echo base_url(). 'admin/dashboard' ?>">Dashboard</a></li>
            <li><a href="<?php echo base_url(). 'admin/existing_patient' ?>">Existing Patient</a></li>
        	<li class="active">Patient Details</li>
      	</ol>
    	<hr/>

    </section>
    <?php
    if(!empty($this->session->flashdata('message')))
    {
    ?>
    <div class="row">
    <div class="col-md-offset-7 col-md-5">
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $this->session->flashdata('message'); ?>
    </div>
    </div>
    </div>
    <?php } ?>

    <!-- Main content -->
    <section class="content">

    	<?php foreach($patient_info as $p_info) ?>
    	<!-- Small boxes (Stat box) -->
    	<div class="row">
        <div class="col-md-12">
        <div class="patient_details">
        <div class="row">
        <div class="action-top col-md-offset-1 col-sm-9">
            <button onclick="showAjaxModal('<?php echo base_url();?>admin/add_new_prescription/<?php echo $p_info->p_id ?>');" class="btn violet btn-info">Add Prescription</button>

            <a href="<?php echo base_url();?>admin/case_history/<?php echo $p_info->p_id ?>" class="btn dark_green btn-info">Case History</a>
        </div>
        </div>
        <div class="col-md-offset-1">
        <form enctype="multipart/form-data" method="post" action="<?php echo base_url(). 'admin/patient_update'; ?>" class="form-horizontal form-groups-bordered readonly" id="patient_details_update" role="form">
                    <input type="hidden" value="<?php echo $p_info->treat_cost ?>" name="total_cost" id="total_cost">
                    <div class="form-group">
                        <label class="col-sm-4 col-md-3 control-label" for="p_id">Patient ID</label>

                        <div class="col-sm-7">
                            <input type="text" id="p_id" class="form-control" name="p_id" value="<?php echo $p_info->p_id ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-md-3 control-label" for="p_name">Patient Name</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="name_prefix" name="name_prefix" disabled>
                                <option value=""></option>
                                <option value="Mr" <?php if($p_info->name_prefix == 'Mr'){echo 'selected';}?>>Mr</option>
                                <option value="Mrs" <?php if($p_info->name_prefix == 'Mrs'){echo 'selected';}?>>Mrs</option>
                                <option value="Dr" <?php if($p_info->name_prefix == 'Dr'){echo 'selected';}?>>Dr</option>
                            </select>
                        </div>
                        <div class="col-sm-5" style="padding-left: 0px;">
                            <input type="text" id="p_name" class="form-control readonly" name="p_name" value="<?php echo $p_info->p_name ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-md-3 control-label" for="p_dob">Date of Birth</label>

                        <div class="col-sm-3">
                            <input type="text" id="p_dob" class="form-control readonly" name="p_dob" value="<?php echo $p_info->p_dob ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask readonly="readonly">
                        </div>
                    
                        <label class="col-sm-1 col-md-1 control-label text-right readonly" for="p_age" value="<?php echo $p_info->p_name ?>" readonly="readonly">Age</label>

                        <div class="col-sm-3">
                            <input type="text" id="p_age" class="form-control readonly" name="p_age" value="<?php echo $p_info->p_age ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="col-sm-4 col-md-3 control-label" for="p_blood_group">Blood Group</label>
                        <div class="col-sm-3">
                            <select class="form-control" id="p_blood_group" name="p_blood_group" disabled>
                                <option value=""></option>
                                <option value="A+" <?php if($p_info->p_blood_group == 'A+'){echo 'selected';}?>>A+</option>
                                <option value="A-" <?php if($p_info->p_blood_group == 'A-'){echo 'selected';}?>>A-</option>
                                <option value="B+" <?php if($p_info->p_blood_group == 'B+'){echo 'selected';}?>>B+</option>
                                <option value="B-" <?php if($p_info->p_blood_group == 'B-'){echo 'selected';}?>>B-</option>
                                <option value="AB+" <?php if($p_info->p_blood_group == 'AB+'){echo 'selected';}?>>AB+</option>
                                <option value="AB-" <?php if($p_info->p_blood_group == 'AB-'){echo 'selected';}?>>AB-</option>
                                <option value="O+" <?php if($p_info->p_blood_group == 'O+'){echo 'selected';}?>>O+</option>
                                <option value="O-" <?php if($p_info->p_blood_group == 'O-'){echo 'selected';}?>>O-</option>
                            </select>                            
                        </div>

                        <label class="col-sm-1 col-md-1 control-label text-right" for="p_sex">Sex</label>
                        <div class="col-sm-3">
                            <select class="form-control" id="p_sex" name="p_sex" disabled>      
                                <option value="male" <?php if($p_info->p_sex == 'male'){echo 'selected';}?>>Male</option>
                                <option value="female" <?php if($p_info->p_sex == 'female'){echo 'selected';}?>>Female</option>
                            </select>
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <label class="col-sm-4 col-md-3 control-label" for="p_phone">Phone</label>

                        <div class="col-sm-7">
                            <input type="text" id="p_phone" class="form-control readonly" name="p_phone" value="<?php echo $p_info->p_phone ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-md-3 control-label" for="p_phone1">Phone</label>

                        <div class="col-sm-7">
                            <input type="text" id="p_phone1" class="form-control readonly" name="p_phone1" value="<?php echo $p_info->p_phone1 ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-md-3 control-label" for="p_address">Address</label>

                        <div class="col-sm-7">
                            <textarea id="p_address" class="form-control readonly" name="p_address" readonly="readonly"><?php echo $p_info->p_address ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="med_history">Previous Medical History</label>
                    <div class="col-sm-7"> 
                        <select class="form-control select2 multiple" id="med_history" name="med_history[]" multiple="multiple" data-placeholder="" style="width: 100%;" disabled>
                        <?php 

                            $selected =  $p_info->med_history;

                            $selected_value = explode(", ", $selected);

                            foreach($selected_value as $value) { ?>

                                <option value="<?php echo $value; ?>" selected ><?php echo $value; ?></option>';
                            
                        <?php } ?>

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
                        <textarea id="med_history_details" class="form-control readonly" name="med_history_details" readonly="readonly" ><?php echo $p_info->med_history_details ?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="diagnosis">Diagnosis</label>
                    <div class="col-sm-7">
                        <textarea id="diagnosis" class="form-control readonly" name="diagnosis" readonly="readonly" ><?php echo $p_info->diagnosis ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="treat_type">Treatment Type</label>
                    <div class="col-sm-7" >
                        <select class="form-control" id="treat_type" name="treat_type" disabled>
                            
                            <?php foreach($treat_types as $treat_type) { ?>
                            
                            <option value="<?php echo $treat_type->treat_name ?>" <?php if($p_info->treat_type == $treat_type->treat_name){echo "selected"; } ?> ><?php echo $treat_type->treat_name ?></option> 
                            
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="treat_details">Treatment Details</label>
                    <div class="col-sm-7">                        
                        <textarea id="treat_details" class="form-control readonly" name="treat_details" readonly="readonly" ><?php echo $p_info->treat_details ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="treat_cost">Treatment Total Cost</label>
                    <div class="col-sm-7">
                        <input type="text" id="treat_cost" class="form-control" name="treat_cost" value="<?php echo $p_info->bal_cost ?>"  readonly="readonly">
                    </div>
                </div>

                <!--<div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="med_history">Previous Medical History</label>
                    <div class="col-sm-7">                        
                        <textarea id="med_history" class="form-control readonly" name="med_history" readonly="readonly" ><?php echo $p_info->med_history ?></textarea>
                    </div>
                </div>-->
                
                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="fees">Fees</label>
                    <div class="col-sm-7">                        
                        <input type="text" id="fees" class="form-control readonly" name="fees" value="" readonly="readonly" >
                    </div>
                </div>

                <div class="form-group action">
                    <div class="col-sm-offset-5 col-md-offset-4">
                        <button type="submit" class="btn btn-success col-sm-3" style="display:none">Submit</button>
                        <button type="button" class="btn btn-edit col-sm-offset-2 col-sm-3">Edit</button>
                        <button type="button" class="btn btn-cancel col-sm-offset-1 col-sm-3" style="display:none">Cancel</button>
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
