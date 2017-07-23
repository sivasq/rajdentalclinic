<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- mask -->
<div class="mask">
  <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Treatment Types
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Treatment Types</li>
        </ol>
        <hr/>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row existing_patient">
            <div style="text-align:right; padding-right:20px;">
                <a data-href="#" style="width:190px;"class="btn violet btn-info btn-icon" data-toggle="modal" data-target="#add_treat_type">Add Treatment Types</a>
            </div>
                <!-- data table patient list table view -->
                <div class="data-table">            
                    <table id="existing_patient" class="table">
                      <thead>
                        <tr>                          
                          <th>ID</th>
                          <th>Treatment Type</th>
                          <th>Desc.</th>                          
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($treat_types as $treat_type){ ?>
                        <tr>
                            <td><?php echo $treat_type->id ?></td>
                            <td><?php echo $treat_type->treat_name ?></td>
                            <td><?php echo $treat_type->treat_desc ?></td>                            
                            <td><button onclick="showAjaxModal('<?php echo base_url();?>admin/edit_treat_type/<?php echo $treat_type->id ?>');" class="btn violet btn-info">Edit</button></td>                            
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


<!-- add drugs Modal -->
  <div class="modal fade" id="add_treat_type" role="dialog" style="z-index:99999;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Add Treatment Types</h4>
        </div>
        <div class="modal-body">        
          <div class="prescription_details">
            <form enctype="multipart/form-data" method="post" action="<?php echo base_url(). 'admin/add_treat_type'; ?>" class="form-horizontal form-groups-bordered" id="insert_treat_type" role="form">                

                <div class="form-group">
                    <label class="col-sm-3 col-md-3 control-label" for="treat_type">Treatment Name</label>
                    <div class="col-sm-7">
                        <input type="text" id="treat_type" class="form-control" name="treat_type">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 col-md-3 control-label" for="treat_desc">Description</label>
                    <div class="col-sm-7">
                        <input type="text" id="treat_desc" class="form-control" name="treat_desc">
                    </div>
                </div>               

                <div class="action text-center">
                    <button type="submit" class="btn violet btn-info">Save</button>
                    <button type="button" class="btn cancel btn-info" data-dismiss="modal">Cancel</button>
                </div>
            </form>
          </div>
        </div><!--/.modal nody -->
        <div class="modal-footer">
        </div>
      </div><!--/. Modal content-->
    </div><!--/.Modal dialog-->
  </div>
  <!--/.add drugs modal -->
