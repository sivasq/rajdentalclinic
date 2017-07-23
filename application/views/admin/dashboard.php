<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- mask -->
<div class="mask">
  <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1 class="upper">
        	My Dashboard        	
      	</h1>
      	<!--<ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        	<li class="active">Dashboard</li>
      	</ol>-->
    	<hr/>
    </section>

    <!-- Main content -->
    <section class="content">
    	
    	<!-- Small boxes (Stat box) -->
    	<div class="row dashboard_icons">

    		<div class="col-sm-6 col-md-3 col-lg-2">
    			<a href="<?php echo base_url().'admin/new_patient';?>">
                <div class="small-box box1">
    				<div class="inner">
    					<div class="icon text-center">              				
              				<i class="sq sq-user2"></i>
            			</div>
    				</div>
    				<div class="small-box-footer">
    					<h5>New Patient</h5>
    				</div>
    			</div>
                </a>
    		</div>

    		<div class="col-sm-6 col-md-3 col-lg-2">
                <a href="<?php echo base_url().'admin/existing_patient';?>">
    			<div class="small-box box2">
    				<div class="inner">
    					<div class="icon text-center">              				
              				<i class="sq sq-usersews"></i>
            			</div>
    				</div>
    				<div class="small-box-footer">
    					<h5>Existing Patient</h5>
    				</div>
    			</div>
                </a>
    		</div>

    		<div class="col-sm-6 col-md-3 col-lg-2">
                <a href="<?php echo base_url().'admin/drugs';?>">
    			<div class="small-box box3">
    				<div class="inner">
    					<div class="icon text-center">              				
              				<i class="sq sq-pill-and-tablet"></i>
            			</div>
    				</div>
    				<div class="small-box-footer">
    					<h5>Drugs</h5>
    				</div>
    			</div>
                </a>
    		</div>

    		<div class="col-sm-6 col-md-3 col-lg-2">
                <a href="#">
    			<div class="small-box box4">
    				<div class="inner">
    					<div class="icon text-center">              				
              				<i class="sq sq-note2"></i>
            			</div>
    				</div>
    				<div class="small-box-footer">
    					<h5>Prescription</h5>
    				</div>
    			</div>
                </a>
    		</div>

    		<div class="col-sm-6 col-md-3 col-lg-2">
    			<a href="<?php echo base_url().'admin/profile';?>">
                <div class="small-box box5">
    				<div class="inner">
    					<div class="icon text-center">              				
              				<i class="sq sq-user2"></i>
            			</div>
    				</div>
    				<div class="small-box-footer">
    					<h5>User Profile</h5>
    				</div>
    			</div>
                </a>
    		</div>

    		<div class="col-sm-6 col-md-3 col-lg-2">
                <a href="#">
    			<div class="small-box box6">
    				<div class="inner">
    					<div class="icon text-center">              				
              				<i class="sq sq-controls"></i>
            			</div>
    				</div>
    				<div class="small-box-footer">
    					<h5>Settings</h5>
    				</div>
    			</div>
                </a>
    		</div>

    		<div class="col-sm-6 col-md-3 col-lg-2">
                <a href="#">
    			<div class="small-box box7">
    				<div class="inner">
    					<div class="icon text-center">              				
              				<i class="sq sq-export-document"></i>
            			</div>
    				</div>
    				<div class="small-box-footer">
    					<h5>Export</h5>
    				</div>
    			</div>
                </a>
    		</div>

    		<div class="col-sm-6 col-md-3 col-lg-2">
                <a href="<?php echo base_url().'admin/help';?>">
    			<div class="small-box box8">
    				<div class="inner">
    					<div class="icon text-center">              				
              				<i class="sq sq-help-cursor"></i>
            			</div>
    				</div>
    				<div class="small-box-footer">
    					<h5>Help</h5>
    				</div>
    			</div>
                </a>
    		</div>

    	</div>
    	<!--/.Small boxes (Stat box) -->

    	<!-- last patients list -->
        <div class="row last_patient">
    		<div class="content-header">
    			<h1 class="upper">
    				Out Patients visited Today
    			</h1>
    			<hr/>
            </div>   
                <!-- data table last patient table view -->
                <div class="data-table">
                    <table id="last_patient" class="table">
                      <thead>
                        <tr>                          
                          <th>Patient ID</th>
                          <th>Patient Name</th>
                          <th>Phone</th>
                          <th>Treatment Type</th>
                          <th>Fees Paid</th>
                          <th>Date</th>
                          <th class="view">Option</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($today_data as $today) {?>
                        <tr>
                            <td><?php echo $today->p_id; ?></td>
                            <td><?php echo $today->p_name; ?></td>
                            <td><?php echo $today->p_phone; ?></td>
                            <td><?php echo $today->treat_type; ?></td>
                            <td>Rs <?php if($today->fees !=''){ echo $today->fees; }else{echo '0';} ?></td>
                            <td><?php echo $today->last_visited; ?></td>
                            <td><a href="<?php echo base_url().'admin/patient_details/'.$today->p_id ?>" class="btn btn-info btn-icon icon-left">View</a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th></th>
                        <th></th>
                        <th style="text-align: right; font-size: 18px;"></th>
                        <th style="font-size: 18px;">Today's Total Paid : </th>
                        <th></th>
                      </tr>
                      </tfoot>
                    </table>
                </div>                 
                <!--/.data table last patient table view -->
    		</div>

    	</div>
        <!-- /.last patients list -->

    </section>
    <!-- /.Main content -->

    <!-- bg bottom img -->
    <!--<div class="bg-bottom-img hidden-md hidden-sm hidden-xs">
        <img src="<?php echo base_url().'assets/img/bg_bottom.png'?>" class="" alt="bottom_img">
    </div> -->
    <!-- /.bg bottom img -->

</div>
<!--/.mask-->
</div>
<!-- /.content-wrapper -->

<!-- jQuery 2.2.3 -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.js'?>"></script>

<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap3.3.7.js'?>"></script>

<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/api/sum().js'?>"></script>
<script src="http://cdn.datatables.net/plug-ins/1.10.12/api/sum().js"></script>

<script type="text/javascript">
    
    var today = '<?php echo date("d-m-Y") ?>';

    $(document).ready(function () {
        
    var today_date = today;

    $('#last_patient').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,      
        "scrollX": true,        
        "search": {"search": today_date},
        "order": [[ 5, "desc" ]],

        drawCallback: function() {
   
            var api = this.api();

            // Total over all pages
            //var total = api.column(4).data().sum();

            // Total over this page
            var pageTotal = api.column(4, {page:'current'}).data().sum();
        
            $(api.column(2).footer()).html("Today's Total paid :");
            $(api.column(3).footer()).html('Rs ' + pageTotal);
        }
    });
});
</script>