<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- mask -->
<div class="mask">
  <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Drugs
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Drugs</li>
        </ol>
        <hr/>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row existing_patient">
            <div style="text-align:right; padding-right:20px;">
                <a data-href="#" style="width:190px;"class="btn violet btn-info btn-icon" data-toggle="modal" data-target="#add_drugs">Add Drugs</a>
            </div>
                <!-- data table patient list table view -->
                <div class="data-table">            
                    <table id="existing_patient" class="table">
                      <thead>
                        <tr>                          
                          <th>Drugs ID</th>
                          <th>Drugs Name</th>
                          <th>Price / Qty</th>
                          <th>Drugs Details</th>                         
                          <th>Instruction</th>
                          <th>Schedule</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($drug_details as $p_info){ ?>
                        <tr>
                            <td><?php echo $p_info->drug_id ?></td>
                            <td><?php echo $p_info->drug_name ?></td>
                            <td><?php echo $p_info->price ?></td>
                            <td><?php echo $p_info->drug_desc ?></td>
                            <td><?php echo $p_info->drug_instruct ?></td>
                            <td>
                            <?php
                            if($p_info->duration == '1')
                            {
                                echo "yes";
                            }
                            else
                            {
                                echo "No";
                            } ?>

                            </td>
                            <td><button onclick="showAjaxModal('<?php echo base_url();?>admin/edit_drug/<?php echo $p_info->drug_id ?>');" class="btn violet btn-info">Edit</button></td>                            
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
  <div class="modal fade" id="add_drugs" role="dialog" style="z-index:99999;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Add Drugs</h4>
        </div>
        <div class="modal-body">        
          <div class="prescription_details">
            <form enctype="multipart/form-data" method="post" action="<?php echo base_url(). 'admin/drug_create'; ?>" class="form-horizontal form-groups-bordered" id="drug_create" role="form">                

                <div class="form-group">
                    <label class="col-sm-3 col-md-3 control-label" for="drug_name">Drug Name</label>
                    <div class="col-sm-7">
                        <input type="text" id="drug_name" class="form-control" name="drug_name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 col-md-3 control-label" for="qty">Qty</label>
                    <div class="col-sm-7">
                        <input type="text" id="qty" class="form-control" name="qty">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 col-md-3 control-label" for="qty">Price / Qty</label>
                    <div class="col-sm-7">
                        <input type="text" id="price" class="form-control" name="price">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 control-label" for="days">No. of Days</label>
                    <div class="col-sm-7">
                        <input type="text" id="days" class="form-control" name="days">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 col-md-3 control-label" for="drug_instruct">Instruction</label>
                    <div class="col-sm-7">
                        <input type="text" id="drug_instruct" class="form-control" name="drug_instruct">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 col-md-3 control-label" for="duration">Schedule</label>
                    <div class="col-sm-7">
                        <label>
                            <input type="radio" name="duration" class="minimal" value='1' checked>&nbsp;&nbsp;Yes
                        </label>
                        <label>
                            <input type="radio" name="duration" class="minimal" value='0'>&nbsp;&nbsp;No
                        </label>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-md-3 control-label" for="drug_desc"></label>
                    
                  <div class="col-sm-7" style="margin-top:-12px;">
                  <table width="100%" style="border:2px solid #eee;">
                    <thead>
                        <tr>
                            <td width="33.3%" height="30px" style="background-color: #eee; text-align: center;">Mrng</td>
                            <td width="33.3%" height="30px" style="background-color: #eee; text-align: center;">Noon</td>
                            <td width="33.3%" height="30px" style="background-color: #eee; text-align: center;">Night</td>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="text-align: center; padding-top: 10px; padding-bottom: 7px;">
                        <div class="form-group" style="margin:0px;">
                            <label>
                            <input type="checkbox" id="time_mrng_s1" class="minimal checkbox">
                            <input type="hidden" id="mrng" name="mrng">
                            </label>
                        </div>
                        </td>
                        <td style="text-align: center; padding-top: 10px; padding-bottom: 7px;">
                        <div class="form-group" style="margin:0px;">
                            <label>
                            <input type="checkbox" id="time_noon_s1" class="minimal checkbox">
                            <input type="hidden" id="noon" name="noon">
                            </label>
                        </div>
                        </td>
                        <td style="text-align: center; padding-top: 10px; padding-bottom: 7px;">
                        <div class="form-group" style="margin:0px;">
                            <label>
                            <input type="checkbox" id="time_night_s1" class="minimal checkbox">
                            <input type="hidden" id="night" name="night">
                            </label>
                        </div>
                        </td>
                    </tr>
                    </tbody>
                  </table>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 col-md-3 control-label" for="drug_desc">Drug Details</label>
                    <div class="col-sm-7">
                        <input type="text" id="drug_desc" class="form-control" name="drug_desc">
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
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.js'?>"></script>
<script>

$('input[type=radio]').on('change', function() {
    if($(this).is(':checked'))
    {  
        var val = $(this).val();
      
      if(val == 1)
      {
        $('input[type="checkbox"]').prop('disabled', '');
      }
      else if(val == 0)
      {
        $('input[type="checkbox"]').prop('checked', '');
        $('input[type="hidden"]').val(0);
        $('input[type="checkbox"]').prop('disabled', 'disabled');
      }  
    } 
});

$('.checkbox').on('change', function() {
    if($(this).is(':checked'))
    {  
        $(this).parent().find('input[type="hidden"]').val(1);
    }else{
        $(this).parent().find('input[type="hidden"]').val(0);
    }
});
</script>
