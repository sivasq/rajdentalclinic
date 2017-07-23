<link rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css'?>">
<!-- jQuery 2.2.3 -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap3.3.7.js'?>"></script>
<!-- InputMask -->
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.bundle.js'?>"></script>

<!-- iCheck for checkboxes and radio inputs -->
<!--<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/all.css'?>">
<script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>  -->

<!--typeahead-->
<script type="text/javascript" src="<?php echo base_url().'assets/js/typeahead.bundle.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/handlebars.min.js'?>"></script>


<?php foreach($patient_info as $p_info) ?>
    <div id="print">
    <div class="print_con">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="text-center" style="font-weight:bold;margin-bottom:20px;">Prescription</h4>
        </div>
        <div class="modal-body">
          <div class="patient_info">
            <table width="100%" border="0">
              <tbody>
                <tr>
                    <td valign="top" align="left">
                      <span class="title">Patient Name : </span><?php echo $p_info->name_prefix ?> &nbsp;<?php echo $p_info->p_name ?><br>
                      <span class="title">Age : </span><?php echo $p_info->p_age ?>&nbsp;&nbsp;<span class="title">Sex : </span><?php echo $p_info->p_sex ?>
                      <br>
                    </td>
                    <td valign="top" align="right">
                      <span class="title">Doctor Name : </span><?php echo $this->session->userdata('name'); ?><br>
                      <span class="title">Date : </span> <?php echo date("d-m-Y"); ?><br>                      
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
          <hr/>
          <div class="prescription_details">
            <form enctype="multipart/form-data" method="post" action="<?php echo base_url(). 'admin/insert_new_prescription/'.$p_info->p_id; ?>" class="form-horizontal form-groups-bordered" id="insert_new_prescription" role="form">


            <input type="hidden" name="treat_cost" id="treat_cost" value="<?php echo $p_info->treat_cost ?>" >

            <input type="hidden" name="prescription_id" id="prescription_id" value="<?php echo $pres_id ?>" >
            <input type="hidden" name="case_history_id" id="case_history_id" value="<?php echo $p_info->case_history_id ?>" >
                
                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="med_history">Previous Medical History</label>
                    <div class="col-sm-7">                        
                        <textarea id="med_history" class="form-control" name="med_history" rows="1"><?php echo $p_info->med_history ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="med_history_details">Medical History Details</label>
                    <div class="col-sm-7">
                        <textarea id="med_history_details" class="form-control" name="med_history_details" rows="1"><?php echo $p_info->med_history_details ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="diagnosis">Diagnosis</label>
                    <div class="col-sm-7">
                        <textarea id="diagnosis" class="form-control" name="diagnosis"><?php echo $p_info->diagnosis ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="treat_type">Treatment Type</label>
                    <div class="col-sm-7" >
                        <select class="form-control" id="treat_type" name="treat_type">
                            
                            <?php foreach($treat_types as $treat_type) { ?>
                            
                            <option value="<?php echo $treat_type->treat_name ?>" <?php if($p_info->treat_type == $treat_type->treat_name){echo "selected"; } ?> ><?php echo $treat_type->treat_name ?></option> 
                            
                            <?php } ?>                            

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-md-3 control-label" for="treat_details">Treatment Details</label>
                    <div class="col-sm-7">
                        <textarea id="treat_details" class="form-control" name="treat_details"><?php echo $p_info->treat_details ?></textarea>
                    </div>
                </div>
                
                <h4><b><span style="font-size:16px;">R</span><span style="font-size: 12px;">x</span></b></h4>
                <div class="table">            
                    <table id="medication" class="table add_prescription" >
                      <thead>
                        <tr>
                            <th colspan="3"></th>
                            <th colspan="3">Timings</th>
                            <th colspan="3"></th>
                        </tr>
                        <tr>                          
                          <th>S.No.</th>
                          <th>Drug Name</th>
                          <th>Qty</th>
                          <th style="width:75px;">Price</th>
                          <th>M</th>
                          <th>A</th>
                          <th>N</th>
                          <th>Days</th>                          
                          <th>Instruction</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="rows">
                            <td>1</td>
                            <td>
                              <input type="text" id="drug_name_1" name="drug_name[]" class="form-control input-sm drug_name"> 
                            </td>

                            <td>
                                <input class="form-control input-sm" id="qty_1" name="qty[]" type="text" placeholder="" readonly>
                            </td>
                            <td style="display:none">
                                <input class="form-control input-sm" id="pp_1" name="pp[]" type="hidden" placeholder="">
                            </td>
                            <td>
                                <input class="form-control input-sm" id="pt_1" name="pt[]" type="text" placeholder="" readonly>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label>
                                    
                                    <input type="checkbox" id="time_mrng_s1" class="minimal checkbox">
                                    <input type="hidden" id="time_mrng_1" name="time_mrng[]">

                                  </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                  <label>
                                    
                                    <input type="checkbox" id="time_noon_s1" class="minimal checkbox">
                                    <input type="hidden" id="time_noon_1" name="time_noon[]">

                                  </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                  <label>

                                    <input type="checkbox" id="time_night_s1" class="minimal checkbox"  >
                                    <input type="hidden" id="time_night_1" name="time_night[]">

                                  </label>
                                </div>
                            </td>
                            <td>
                                <input class="form-control input-sm" id="no_of_days_1" name="no_of_days[]" type="text" placeholder="" data-mask>
                            </td>
                            
                            <td>
                                <input class="form-control input-sm" id="instruction_1" name="instruction[]" type="text" placeholder="">
                            </td>

                            <td><i class="fa fa-plus add" aria-hidden="true"></i></td>
                        </tr>

                      </tbody>
                    </table>
                </div>
				
                <div class="row">                
                    <div class="col-sm-offset-10 col-sm-2" style="text-align: center;">
                        <p style="font-size: 18px;text-align: right;padding-right: 14px;"><strong> Total : </strong> 
                        <input class="form-control input-sm" id="total" name="total" type="text" value="0" placeholder=""></p>
                    </div>
                </div>

				<div class="row">                
                    <div class="col-sm-offset-10 col-sm-2" style="text-align: center;">
                        <label>Signature <input type="checkbox" id="sign" name="sign" class="minimal checkbox" style="display:inline; vertical-align: top; margin-left: 15px;" value="1"></label>
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
    </div>
    </div>



<script type="text/javascript">

//iCheck for checkbox and radio inputs
/*
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({

    checkboxClass: 'icheckbox_minimal-blue',
    
    radioClass: 'iradio_minimal-blue'

});
*/

//dynamically add new rows with input fields

$(document).ready(function(){

    //init variables
    var id=2,txt_box;

    $('.add_prescription').on('click','.add',function(){

        //dynamic input rows
        txt_box = "<tr class='rows'><td>"+id+"</td> <td><input type='text' name='drug_name[]' id='drug_name_"+id+"' class='form-control input-sm drug_name'></td> <td><input class='form-control input-sm' id='qty_"+id+"' name='qty[]' type='text' placeholder='' readonly></td> <td style='display:none'><input class='form-control input-sm' id='pp_"+id+"' name='pp[]' type='hidden' placeholder=''></td> <td><input class='form-control input-sm' id='pt_"+id+"' name='pt[]' type='text' placeholder='' readonly></td> <td><div class='form-group'> <label> <input type='checkbox' id='time_mrng_s"+id+"' class='minimal checkbox'><input type='hidden' id='time_mrng_"+id+"' name='time_mrng[]'> </label> </div></td> <td><div class='form-group'> <label> <input type='checkbox' id='time_noon_s"+id+"' class='minimal checkbox'><input type='hidden' id='time_noon_"+id+"' name='time_noon[]'> </label> </div></td> <td><div class='form-group'> <label> <input type='checkbox' id='time_night_s"+id+"' class='minimal checkbox'> <input type='hidden' id='time_night_"+id+"' name='time_night[]'> </label> </div> </td> <td><input class='form-control input-sm' id='no_of_days_"+id+"' name='no_of_days[]' type='text' placeholder='' data-mask></td> <td><input class='form-control input-sm' id='instruction_"+id+"' name='instruction[]' type='text' placeholder=''></td> <td><i class='fa fa-minus remove' aria-hidden='true'></i></td></tr>";

        //append input field as a last row 
        $(".add_prescription").append(txt_box);
    

        //typeahead init
        var drug_names = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('drug_name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: base + 'admin/query?query=%QUERY'
        });
  
        drug_names.initialize();

        $('#drug_name_'+id).typeahead(
        {
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'drug_names',
            displayKey: 'drug_name',
            //display: function(item){ return item.drug_name+'-'+item.duration},
            source: drug_names.ttAdapter(),
            templates: {
                empty: [
                    '<div class="empty-message">',
                    'No Drug Names',
                    '</div>'
                ].join('\n'),
                suggestion: Handlebars.compile('<p class="clearfix">{{drug_name}}</p>')
            }
        }).on('typeahead:selected', function (obj, value){

            if(value['duration'] == 0)
            {     

                $(this).parents('tr').find('td input[type="checkbox"]').prop('checked', '');
                $(this).parents('tr').find('td input[type="checkbox"]').prop('disabled', 'disabled');
                $(this).parents('tr').find('td input[id^="instruction_"]').val(value['drug_instruct']);
                $(this).parents('tr').find('td input[id^="qty_"]').val(value['qty']);
                $(this).parents('tr').find('td input[id^="pp_"]').val(value['price']);
                $(this).parents('tr').find('td input[id^="no_of_days_"]').val(value['days']);
                $(this).parents('tr').find('td input[id^="time_mrng_"]').val(value['mrng']);
                $(this).parents('tr').find('td input[id^="time_noon_"]').val(value['noon']);
                $(this).parents('tr').find('td input[id^="time_night_"]').val(value['night']);
                
                if(value['mrng'] =='1'){
                    $(this).parents('tr').find('td input[id^="time_mrng_s"]').prop('checked', 'checked');
                }

                if(value['noon'] =='1'){
                    $(this).parents('tr').find('td input[id^="time_noon_s"]').prop('checked', 'checked');
                }

                if(value['night'] =='1'){
                    $(this).parents('tr').find('td input[id^="time_night_s"]').prop('checked', 'checked');
                }

                var pp = value['price'];

                var qty = value['qty'];

                var pt = (Number(pp) * Number(qty));

                $(this).parents('tr').find('td input[id^="pt_"]').val(pt);                            
            
                var total = 0;
                $("tr.rows").each(function() {
                    var tot = Number($(this).find('td input[id^="pt_"]').val());
                    total += tot;
                });
                $("#total").val(total);
                $("#m_cost").text('');
                $("#m_cost").text(total);

            }

            if(value['duration'] == 1)
            {                
                $(this).parents('tr').find('td input[type="checkbox"]').prop('disabled', '');
                $(this).parents('tr').find('td input[id^="instruction_"]').val(value['drug_instruct']);
                $(this).parents('tr').find('td input[id^="qty_"]').val(value['qty']);
                $(this).parents('tr').find('td input[id^="pp_"]').val(value['price']);
                $(this).parents('tr').find('td input[id^="no_of_days_"]').val(value['days']);
                $(this).parents('tr').find('td input[id^="time_mrng_"]').val(value['mrng']);
                $(this).parents('tr').find('td input[id^="time_noon_"]').val(value['noon']);
                $(this).parents('tr').find('td input[id^="time_night_"]').val(value['night']);
                
                if(value['mrng'] =='1'){
                    $(this).parents('tr').find('td input[id^="time_mrng_s"]').prop('checked', 'checked');
                }

                if(value['noon'] =='1'){
                    $(this).parents('tr').find('td input[id^="time_noon_s"]').prop('checked', 'checked');
                }

                if(value['night'] =='1'){
                    $(this).parents('tr').find('td input[id^="time_night_s"]').prop('checked', 'checked');
                }

                var pp = value['price'];

                var qty = value['qty'];

                var pt = (Number(pp) * Number(qty));

                $(this).parents('tr').find('td input[id^="pt_"]').val(pt);
                        
                var total = 0;
                $("tr.rows").each(function() {
                    var tot = Number($(this).find('td input[id^="pt_"]').val());
                    total += tot;
                });
                $("#total").val(total);
                $("#m_cost").text('');
                $("#m_cost").text(total);

            }
            else
            {
                //$(this).parents('tr').find('td input[type="checkbox"]').prop('disabled', '');
            }

        });

            
        $('input[id^="no_of_days_"]').on("keyup", function() { 
   
            var check_len = $(this).parents('tr').find('td input[type="checkbox"]:checked').length;

            var days = $(this).parents('tr').find('td input[id^="no_of_days_"]').val();

            var qty = (check_len * days);

            $(this).parents('tr').find('td input[id^="qty_"]').val(qty);

            var pp = $(this).parents('tr').find('td input[id^="pp_"]').val();

            var pt = (Number(pp) * Number(qty));

            $(this).parents('tr').find('td input[id^="pt_"]').val(pt);
             
            var total = 0;
            $("tr.rows").each(function() {
                var tot = Number($(this).find('td input[id^="pt_"]').val());
                total += tot;
            });
            $("#total").val(total);
            $("#m_cost").text('');
            $("#m_cost").text(total);

        });
    id++;

        $('.checkbox').on('change', function() {
            if($(this).is(':checked'))
            {  
                $(this).parent().find('input[type="hidden"]').val(1);
            }else{
                $(this).parent().find('input[type="hidden"]').val(0);
            }
        });

    
//input mask init
    $("[data-mask]").inputmask("9{1,3}");


    });//.add prescription dynamic row add end
    
    
    //dynamically remove rows
    $('.add_prescription').on('click', '.remove', function () {
    
        //check length of drug name field
        var len = $(this).parents('tr').find('td input[id^="drug_name_"]').val();

        //if length is not empty
        if(len !=='')
        {
            //confirm delete row
            if (confirm("Do you want to delete"))
            {
                $(this).parents('tr').remove();

                var total = 0;
                $("tr.rows").each(function() {
                    var tot = Number($(this).find('td input[id^="pt_"]').val());
                    total += tot;
                });
                $("#total").val(total);
                $("#m_cost").text('');
                $("#m_cost").text(total);
            }

            return false;
        }

        $(this).parents('tr').remove();

    });//dynamically remove rows end


});//end dynamically add remove row functions


$(document).ready(function()
{

    $('input[id^="no_of_days_"]').on("keyup", function() {

        var check_len = $(this).parents('tr').find('td input[type="checkbox"]:checked').length;

        var days = $(this).parents('tr').find('td input[id^="no_of_days_"]').val();

        var qty = (check_len * days);

        $(this).parents('tr').find('td input[id^="qty_"]').val(qty);

        var pp = $(this).parents('tr').find('td input[id^="pp_"]').val();

        var pt = (Number(pp) * Number(qty));

        $(this).parents('tr').find('td input[id^="pt_"]').val(pt);
       
        var total = 0;
        $("tr.rows").each(function() {
            var tot = Number($(this).find('td input[id^="pt_"]').val());
            total += tot;
        });
        $("#total").val(total);
        $("#m_cost").text('');
        $("#m_cost").text(total);
    });


});


//====typeahead function for static row ========
var base = "<?php echo base_url() ?>" ;

$(document).ready(function()
{ 
    var drug_names = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('drug_name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: base + 'admin/query?query=%QUERY'
    });
  
    drug_names.initialize();
  

    $('#drug_name_1').typeahead(
    {
        hint: true,
        highlight: true,
        minLength: 1
    },
    {
        name: 'drug_names',
        displayKey: 'drug_name',
        //display: function(item){ return item.drug_name+'-'+item.duration},    
        source: drug_names.ttAdapter(),
        templates: {
            empty: [
                '<div class="empty-message">',
                'No Drug Names',
                '</div>'
            ].join('\n'),
            suggestion: Handlebars.compile('<p class="clearfix">{{drug_name}}</p>')
        }

    }).on('typeahead:selected', function (obj, value){

        if(value['duration'] == 0)
            {
                $(this).parents('tr').find('td input[type="checkbox"]').prop('checked', '');
                $(this).parents('tr').find('td input[type="checkbox"]').prop('disabled', 'disabled');
                $(this).parents('tr').find('td input[id^="instruction_"]').val(value['drug_instruct']);
                $(this).parents('tr').find('td input[id^="qty_"]').val(value['qty']);
                $(this).parents('tr').find('td input[id^="pp_"]').val(value['price']);
                $(this).parents('tr').find('td input[id^="no_of_days_"]').val(value['days']);
                $(this).parents('tr').find('td input[id^="time_mrng_"]').val(value['mrng']);
                $(this).parents('tr').find('td input[id^="time_noon_"]').val(value['noon']);
                $(this).parents('tr').find('td input[id^="time_night_"]').val(value['night']);
                if(value['mrng'] =='1'){
                    $(this).parents('tr').find('td input[id^="time_mrng_s"]').prop('checked', 'checked');
                }

                if(value['noon'] =='1'){
                    $(this).parents('tr').find('td input[id^="time_noon_s"]').prop('checked', 'checked');
                }

                if(value['night'] =='1'){
                    $(this).parents('tr').find('td input[id^="time_night_s"]').prop('checked', 'checked');
                }

                var pp = value['price'];

                var qty = value['qty'];

                var pt = (Number(pp) * Number(qty));

                $(this).parents('tr').find('td input[id^="pt_"]').val(pt);

                var total = 0;
                $("tr.rows").each(function() {
                    var tot = Number($(this).find('td input[id^="pt_"]').val());
                    total += tot;
                });
                $("#total").val(total);
                $("#m_cost").text('');
                $("#m_cost").text(total);

            }

            if(value['duration'] == 1)
            {
                $(this).parents('tr').find('td input[type="checkbox"]').prop('disabled', '');
                $(this).parents('tr').find('td input[id^="instruction_"]').val(value['drug_instruct']);
                $(this).parents('tr').find('td input[id^="qty_"]').val(value['qty']);
                $(this).parents('tr').find('td input[id^="pp_"]').val(value['price']);
                $(this).parents('tr').find('td input[id^="no_of_days_"]').val(value['days']);
                $(this).parents('tr').find('td input[id^="time_mrng_"]').val(value['mrng']);
                $(this).parents('tr').find('td input[id^="time_noon_"]').val(value['noon']);
                $(this).parents('tr').find('td input[id^="time_night_"]').val(value['night']);
                
                if(value['mrng'] =='1'){
                    $(this).parents('tr').find('td input[id^="time_mrng_s"]').prop('checked', 'checked');
                }

                if(value['noon'] =='1'){
                    $(this).parents('tr').find('td input[id^="time_noon_s"]').prop('checked', 'checked');
                }

                if(value['night'] =='1'){
                    $(this).parents('tr').find('td input[id^="time_night_s"]').prop('checked', 'checked');
                }

                var pp = value['price'];

                var qty = value['qty'];

                var pt = (Number(pp) * Number(qty));

                //$(this).parents('tr').find('td input[id^="pt_"]').val(pt);
                $(this).parents('tr').find('td input[id^="pt_"]').val(pt);
              
                var total = 0;
                $("tr.rows").each(function() {
                    var tot = Number($(this).find('td input[id^="pt_"]').val());
                    total += tot;
                });
                $("#total").val(total);
                $("#m_cost").text('');
                $("#m_cost").text(total);
            }

  });


$('.checkbox').on('change', function() {
  //alert('change event fired');
  if($(this).is(':checked'))
  {  
    $(this).parent().find('input[type="hidden"]').val(1);
  }else{
    $(this).parent().find('input[type="hidden"]').val(0);
  }

});

//input mask init
    $("[data-mask]").inputmask("9{1,3}");

});

</script>