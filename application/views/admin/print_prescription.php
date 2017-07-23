<link rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css'?>">
<!-- jQuery 2.2.3 -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap3.3.7.js'?>"></script>


<!-- iCheck for checkboxes and radio inputs -->
<!--<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/all.css'?>">
<script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>  -->

<!--typeahead-->
<script type="text/javascript" src="<?php echo base_url().'assets/js/typeahead.bundle.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/handlebars.min.js'?>"></script>



    <div id="print">
    <div class="print_con">
        <div class="modal-header">
        </div>
        <div class="modal-body">
          <div class="patient_info">
            <table width="100%" border="0">
              <tbody>
              <?php foreach($patient_info as $p_info) ?>
                <tr>
                    <td valign="top" align="left" style="padding:0px;">
                      <span class="title">Patient Name : </span><b><?php echo $p_info->name_prefix ?>.&nbsp;<?php echo $p_info->p_name ?></b><br>
                      <span class="title">Age : </span><?php echo $p_info->p_age ?>&nbsp;&nbsp;<span class="title">Sex : </span><?php echo $p_info->p_sex ?>
                      <br>
                    </td>
                    <td valign="top" align="right">
                      <span class="title">Date : </span> <?php echo date("d-m-Y"); ?><br>
                      <span class="title">Time : </span><?php echo date("H:m"); ?><br>
                    </td>
                </tr>

              </tbody>
            </table>
          </div>
          <hr/>
          <div class="prescription_details">            
                
            <?php foreach($case_history_info as $case_info) ?>
            <div class="part-1">
                <div class="row">
                    <div class="col-sm-12">
                        <p><span class="title">Previous Medical History :</span> <?php echo $case_info->med_history.' - '.$case_info->med_history_details ?></p>
                    </div>                    
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <p><span class="title">Diagnosis :</span> <?php echo $case_info->diagnosis ?></p>
                    </div>             
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <p><span class="title">Treatment :</span> <?php echo $case_info->treat_type .' ' .$case_info->treat_details ?></p>
                    </div>                    
                </div>
            </div>

                <div class="row">
                    <div class="col-sm-12">
                        <h4><b><span style="font-size:16px;">R</span><span style="font-size: 10px;">x</span></b></h4>
                    </div>
                </div>

                <div class="table">            
                    <table id="medication" class="table add_prescription" >
                      <thead>
                        <!--<tr>
                            <th></th>
                            <th colspan="3">Timings</th>
                            <th colspan="3"></th>
                        </tr>-->
                        <tr>                                                    
                          <th style="text-align:left; line-height:25px; margin-right:0px;">Drug Name</th>
                          <th style="text-align:left; line-height:25px; margin:0px;">Qty</th>
                          <th style="text-align:center; line-height:25px; margin:0px;">Mrng<br/><span class="tamil">(காலை)</span></th>
                          <th style="text-align:center; line-height:25px; margin:0px;">Noon<br/><span class="tamil">(மதியம்)</span></th>
                          <th style="text-align:center; line-height:25px; margin:0px;">Night<br/><span class="tamil">(இரவு)</span></th>
                          <th style="text-align:left; line-height:25px; margin:0px;">Days</th>
                          <th style="text-align:left; line-height:25px; margin:0px;">Instruction</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($pres_infos as $pres_info) {  ?>

                        <tr>                            
                            <td style="text-align:left;">
                               <b><?php echo $pres_info->drug_name ?></b>
                            </td>

                            <td style="text-align:center;">
                                <?php echo $pres_info->qty ?>
                            </td>
                            
                            <td style="text-align:center;">                                
                                <?php 
                                if($pres_info->time_mrng == 0)
                                {
                                    echo '-';
                                }
                                else if($pres_info->time_mrng == 1)
                                {
                                    echo '1';
                                }
                                ?>
                            </td>

                            <td style="text-align:center;">
                                <?php 
                                if($pres_info->time_noon == 0)
                                {
                                    echo '-';
                                }
                                else if($pres_info->time_noon == 1)
                                {
                                    echo '1';
                                }
                                ?>
                            </td>

                            <td style="text-align:center;">                                
                                <?php 
                                if($pres_info->time_night == 0)
                                {
                                    echo '-';
                                }
                                else if($pres_info->time_night == 1)
                                {
                                    echo '1';
                                }
                                ?>
                            </td>
                            <td style="text-align:center;">
                                <?php echo $pres_info->no_of_days ?>
                            </td>                            

                            <td style="text-align:left;">
                                <?php echo $pres_info->instruction ?>
                            </td>
                            
                        </tr>
                        <?php } ?>
                        <?php 
                            foreach($case_history_info as $case_info){ ?>
                                <tr><td colspan="7" style="text-align: right; padding-top: 30px; font-size: 21px; font-weight: 600;" padding-right:60px;> Total Medicine Cost : Rs. <?php echo $case_info->total_medicine; ?></td></tr>
                        <?php } ?>
                      </tbody>
                    </table>
                </div>
				
				<?php 

                foreach($case_history_info as $case_info)

                if($case_info->sign == "1")
                {
                    foreach($user_info as $sign_info)
                ?>
                <div class="row">
                    <div class="col-sm-10" style="text-align: right;">
                        <img src="<?php echo base_url().'uploads/'.$sign_info->sign ?>" style="width:150px;" alt="logo">
                    </div>
                </div>
                <?php
                }
                ?>
				
            <div class="row">            
                <div class="col-sm-offset-4 col-sm-4">
                    <button type="submit" class="btn violet btn-info" style="width:250px; margin-top:10px;" onclick="PrintDoc()">Print</button>
                </div>
            </div>
          </div>
        </div><!--/.modal nody -->
        <div class="modal-footer">
        </div>
    </div>
    </div>



<script type="text/javascript">

    function PrintDoc() {

            var divContents = document.getElementById('print');
            var printWindow = window.open('', '', 'height=1400,width=800');
            printWindow.document.write('<html><head><title>Prescription</title>');
            printWindow.document.write('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />');
            printWindow.document.write('<link rel="stylesheet" href="<?php echo base_url().'assets/css/Bootstrap3.3.7.css'?>">');
            printWindow.document.write('<link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.css'?>">');
            printWindow.document.write('<link rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css'?>">');
            printWindow.document.write('<link rel="stylesheet" media="print" href="<?php echo base_url().'assets/css/print.css'?>">');
            printWindow.document.write('<style>@page { size: auto;  margin: 0mm; padding:5px; }   html{overflow: auto; height: 99%; page-break-after: avoid; page-break-before: avoid; } body{overflow: auto; height: 99%; page-break-after: avoid; page-break-before: avoid; }</style></head><body >');
            printWindow.document.write(divContents.innerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
       
    }

</script>