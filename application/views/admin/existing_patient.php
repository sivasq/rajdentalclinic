<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- mask -->
<div class="mask">
  <!-- Content Header (Page header) -->
    <section class="content-header">
    	  <h1>
        	Existing Patient
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="<?php echo base_url(). 'admin/dashboard' ?>">Dashboard</a></li>
        	<li class="active">Existing Patient</li>
      	</ol>
    	<hr/>
    </section>

    <!-- Main content -->
    <section class="content">
    
        <div class="row existing_patient">
            
                <!-- data table patient list table view -->
                <div class="data-table">            
                    <table id="existing_patient" class="table">
                      <thead>
                        <tr>                          
                          <th>Patient ID</th>
                          <th>Patient Name</th>
                          <th>Phone</th>                          
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($patient_info as $p_info){ ?>
                        <tr>
                            <td><?php echo $p_info->p_id ?></td>
                            <td><?php echo $p_info->p_name ?></td>
                            <td><?php echo $p_info->p_phone ?></td>                            
                            <td><a href="<?php echo base_url().'admin/patient_details/'.$p_info->p_id ?>" class="btn violet btn-info btn-icon icon-left">View Details</a></td>
                            <td><button class="btn btn-danger btn-icon icon-left" onclick=archive('<?php echo $p_info->p_id ?>');>Archive</button></td>
                        </tr>
                        <?php } ?>               
                      </tbody>                      
                    </table>
                </div>                
                <!--/.data table patient list table view -->
            </div>

        </div>
    </section>
    <!-- /.Main content -->

</div>
<!--/.mask-->
</div>
<!-- /.content-wrapper -->


