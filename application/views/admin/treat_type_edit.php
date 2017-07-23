<!-- jQuery 2.2.3 -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap3.3.7.js'?>"></script>

<!-- Jquery validation -->
<script src="<?php echo base_url().'assets/plugins/jquery-validation/jquery.validate.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jquery-validation/additional-methods.js'?>"></script>


<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/all.css'?>">
<script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>


<?php foreach($treat_types_info as $treat_type_info) ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Edit Treatment Type </h4>
        </div>
        <div class="modal-body">
          <div class="prescription_details">
            <form enctype="multipart/form-data" method="post" action="<?php echo base_url(). 'admin/treat_type_update/'.$treat_type_info->id;?>" class="form-horizontal form-groups-bordered" id="treat_type_update" role="form">                

                <div class="form-group">
                    <label class="col-sm-3 col-md-3 control-label" for="treat_type">Treatment Name</label>
                    <div class="col-sm-7">
                        <input type="text" id="treat_type" class="form-control" name="treat_type" value="<?php echo $treat_type_info->treat_name ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 col-md-3 control-label" for="treat_desc">Description</label>
                    <div class="col-sm-7">
                        <input type="text" id="treat_desc" class="form-control" name="treat_desc" value="<?php echo $treat_type_info->treat_desc ?>">
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
