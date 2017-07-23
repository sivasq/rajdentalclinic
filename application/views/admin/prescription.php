<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- mask -->
<div class="mask">
  <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Add New Prescription         
        </h1>
        <ol class="breadcrumb">
          <li><a href="#">Dashboard</a></li>
          <li class="active">Add New Prescription</li>
        </ol>
      <hr/>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- prescription -->
      <?php foreach($patient_info as $p_info) ?>
      <div class="row">
        <div class="col-md-12">        
    <div class="new_prescription">
        <h4 class="text-center" style="font-weight:bold;margin-bottom:20px;">Add New Prescription</h4>
          <div class="patient_info">
            <table width="100%" border="0">
              <tbody>
                <tr>
                    <td valign="top" align="left">
                      <span class="title">Patient Name : </span><?php echo $p_info->p_name ?><br>
                      <span class="title">Age : </span><?php echo $p_info->p_age ?>&nbsp;&nbsp;<span class="title">Sex : </span><?php echo $p_info->p_sex ?>
                      <br>
                    </td>
                    <td valign="top" align="right">
                      <span class="title">Doctor Name : </span><?php echo $this->session->userdata('name'); ?><br>
                      <span class="title">Date : </span> <?php echo $p_info->timestamp ?> : 10:00 AM<br>                      
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
          <hr/>
          <div class="prescription_details">
            <form enctype="multipart/form-data" method="post" action="<?php echo base_url(). 'admin/add_new_prescription/'.$p_info->p_id; ?>" class="form-horizontal form-groups-bordered" id="add_new_prescription" role="form">

                <div class="table">            
                    <table id="medication" class="table">
                      <thead>
                        <tr>
                            <th colspan="2"></th>
                            <th colspan="3">Timings</th>
                            <th colspan="3"></th>
                        </tr>
                        <tr>                          
                          <th>S.No.</th>
                          <th>Drug Name</th>
                          <th>M</th>
                          <th>A</th>
                          <th>N</th>
                          <th width:"10px">Days</th>
                          <th>Qty</th>
                          <th>Instruction</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <input class="form-control input-sm" id="drug_name" name="drug_name[]" type="text" placeholder="">
                            </td>
                            <td>
                                <div class="form-group">
                                  <label>
                                    <input type="checkbox" id="m_s" name="m_s[]" class="minimal">
                                  </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                  <label>
                                    <input type="checkbox" id="af_s" name="af_s[]" class="minimal">
                                  </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                  <label>
                                    <input type="checkbox" id="n_s" name="n_s[]" class="minimal">
                                  </label>
                                </div>
                            </td>
                            <td>
                                <input class="form-control input-sm" id="no_of_days" name="no_of_days[]" type="text" placeholder="">
                            </td>

                            <td>
                                <input class="form-control input-sm" id="qty" name="qty[]" type="text" placeholder="">
                            </td>
                            <td>
                                <input class="form-control input-sm" id="instruction" name="instruction[]" type="text" placeholder="">
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>
                                <input class="form-control input-sm" id="drug_name" name="drug_name[]" type="text" placeholder="">
                            </td>
                            <td>
                                <div class="form-group">
                                  <label>
                                    <input type="checkbox" id="m_s" name="m_s[]" class="minimal">
                                  </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                  <label>
                                    <input type="checkbox" id="af_s" name="af_s[]" class="minimal">
                                  </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                  <label>
                                    <input type="checkbox" id="n_s" name="n_s[]" class="minimal">
                                  </label>
                                </div>
                            </td>
                            <td>
                                <input class="form-control input-sm" id="no_of_days" name="no_of_days[]" type="text" placeholder="">
                            </td>

                            <td>
                                <input class="form-control input-sm" id="qty" name="qty[]" type="text" placeholder="">
                            </td>
                            <td>
                                <input class="form-control input-sm" id="instruction" name="instruction[]" type="text" placeholder="">
                            </td>
                        </tr>
                        
                      </tbody>
                    </table>
                </div>
                <div class="action text-center">
                    <button type="submit" class="btn violet btn-info" data-dismiss="modal">Save & Print</button>
                    <button type="button" class="btn cancel btn-info" data-dismiss="modal">Cancel</button>
                </div>
            </form>
          </div>
    </div><!--/.prescription -->
      </div>
      </div>
    </section>
</div>

</div>