
//===== data table init ============

var redirect_url = 'http://rajdental/'; // here we need to change our site base url 

$(document).ready(function () {    

    $('#existing_patient').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,      
      "scrollX": true,
      columnDefs: [{ orderable: false, targets: [-1,-2] }],      
    });
});


//iCheck for checkbox and radio inputs
/*$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
  checkboxClass: 'icheckbox_minimal-blue',
  radioClass: 'iradio_minimal-blue'
});*/

$(document).ready(function () {
//Initialize Select2 Elements
$("select").select2();

//Datemask dd/mm/yyyy
//$("#p_dob").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
//Datemask2 mm/dd/yyyy
//$("#p_doqb").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});

$("[data-mask]").inputmask();

});

$(document).ready(function () {
    
    'use strict';
//age calculation from dob
    $('#p_dob').on("blur", function() { 
   
        var dob = $(this).val();
        dob = new Date(dob);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

        $('#p_age').val(age);
  
    });

//=====new patient insert validation and submit =========
    $(document).on("submit", "#new_patient_create", function(e){

        e.preventDefault();

        $(this).validate({
            ignore:":not(:visible)",
            rules: {
                p_name: {
                    required: true,                    
                },
                p_phone:{
                    required: true,
                },
                p_age: {
                    pattern: /^[0-9]+$/,
                },
                fees:{
                    pattern: /^[0-9]+$/,
                }
            }
        });

        if($(this).valid()){

            var url = $(this).attr('action');

            $.ajax({

                url : url,
                method: 'POST',                
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType:'JSON',
                error: function()
                {
                    alert("An error occoured!");
                },
                success: function(response)
                {
                    var status = response.status;
                    var p_id = response.p_id;
                    
                    if(status == 'success')
                    {                                                                                    

                        window.location.href = redirect_url +'admin/patient_details/' + p_id;
                    }
                    else if(status == 'failed')
                    {
                        alert("sorry data not inserted");
                    }
                    
                }

            });
        }

    });


//add new prescription to db
$(document).on("submit", "#insert_new_prescription", function(e){

        e.preventDefault();

            var url = $(this).attr('action');

            $.ajax({

                url : url,
                method: 'POST',                
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType:'JSON',
                error: function()
                {
                    alert("An error occoured!");
                    //alert("Prescription Saved."); 
                },
                success: function(response)
                {
                    var status = response.status;
                    var p_id = response.p_id;
                    var pres_id = response.pres_id;
                    
                    if(status == 'success')
                    {      
                        alert("Prescription Saved.");
                        //window.location.href = redirect_url +'admin/patient_details/' + p_id;
                        showAjaxModal(redirect_url + 'admin/print_prescription/'+p_id+'/'+pres_id);                       
                    }
                    else if(status == 'failed')
                    {
                        alert("sorry data not saved");
                    }
                    
                }

            });

    });


//patient details page form edit option
$('#patient_details_update .btn-edit').click(function(){
    $('#patient_details_update .readonly').attr('readonly', false);
    $('#patient_details_update select').attr('disabled', false);

    $('#patient_details_update .btn-edit').css('display', 'none');
    $('#patient_details_update .btn-success').css('display', '');
    $('#patient_details_update .btn-cancel').css('display', '');
    
});

$('#patient_details_update .btn-cancel').click(function(){
    $('#patient_details_update .readonly').attr('readonly', true);
    $('#patient_details_update select').attr('disabled', true);

    $('#patient_details_update .btn-edit').css('display', '');
    $('#patient_details_update .btn-success').css('display', 'none');
    $('#patient_details_update .btn-cancel').css('display', 'none');

});

//update patient details to db
    $(document).on("submit", "#patient_details_update", function(e){

        e.preventDefault();

        $(this).validate({
            ignore:":not(:visible)",
            rules: {
                p_name: {
                    required: true,                    
                }
            }
        });

        if($(this).valid()){

            var url = $(this).attr('action');

            $.ajax({

                url : url,
                method: 'POST',                
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType:'JSON',
                error: function()
                {
                    alert("An error occoured!");
                },
                success: function(response)
                {
                    var status = response.status;
                    var p_id = response.p_id;
                    
                    if(status == 'success')
                    {                                                            
                            $('#patient_details_update .readonly').attr('readonly', true);
                            $('#patient_details_update select').attr('disabled', true);
                        
                            $('#patient_details_update .btn-edit').css('display', '');
                            $('#patient_details_update .btn-success').css('display', 'none');
                            $('#patient_details_update .btn-cancel').css('display', 'none');

                            alert("Patient Details Updated");

                    }
                    else if(status == 'failed')
                    {
                        alert("sorry data not updated");
                    }
                    
                }

            });
        }

    });

    $(document).on("submit", "#drug_create", function(e){

        e.preventDefault();

        $(this).validate({
            ignore:":not(:visible)",
            rules: {
                drug_name: {
                    required: true,                    
                },
                qty: {
                    required: true,
                },
                days: {
                    required: true,
                },
                drug_instruct: {
                    required: true,
                },
                duration: {
                    required: true,
                }
            }
        });

        if($(this).valid()){

            var url = $(this).attr('action');

            $.ajax({

                url : url,
                method: 'POST',                
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType:'JSON',
                error: function()
                {
                    alert("An error occoured!");
                },
                success: function(response)
                {
                    var status = response.status;                    
                    
                    if(status == 'success')
                    {                                                                                    
                        alert("Drug Details Inserted");
                        window.location.href = redirect_url +'admin/drugs';
                    }
                    else if(status == 'failed')
                    {
                        alert("sorry data not inserted");
                    }
                    
                }

            });
        }

    });

//update patient details to db
    $(document).on("submit", "#drug_update", function(e){

        e.preventDefault();

        $(this).validate({
            ignore:":not(:visible)",
            rules: {
                drug_name: {
                    required: true,                    
                },
                qty: {
                    required: true,
                },
                days: {
                    required: true,
                },
                drug_instruct: {
                    required: true,
                },
                duration: {
                    required: true,
                }
            }
        });

        if($(this).valid()){

            var url = $(this).attr('action');

            $.ajax({

                url : url,
                method: 'POST',                
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType:'JSON',
                error: function()
                {
                    alert("An error occoured!");
                },
                success: function(response)
                {
                    var status = response.status;                    
                    
                    if(status == 'success')
                    {                                                                                    
                        alert("Drug Details Updated");
                        window.location.href = redirect_url +'admin/drugs';

                    }
                    else if(status == 'failed')
                    {
                        alert("sorry data not updated");
                    }
                    
                }

            });
        }

    });


    $(document).on("submit", "#insert_treat_type", function(e){

        e.preventDefault();

        $(this).validate({
            ignore:":not(:visible)",
            rules: {
                treat_name: {
                    required: true,                    
                }
            }
        });

        if($(this).valid()){

            var url = $(this).attr('action');

            $.ajax({

                url : url,
                method: 'POST',                
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType:'JSON',
                error: function()
                {
                    alert("An error occoured!");
                },
                success: function(response)
                {
                    var status = response.status;                    
                    
                    if(status == 'success')
                    {                                                                                    
                        alert("Treatment Type Added.");
                        window.location.href = redirect_url +'admin/treat_types';
                    }
                    else if(status == 'failed')
                    {
                        alert("sorry data not inserted");
                    }
                    
                }

            });
        }

    });

        $(document).on("submit", "#treat_type_update", function(e){

        e.preventDefault();

        $(this).validate({
            ignore:":not(:visible)",
            rules: {
                treat_type: {
                    required: true,                    
                }
            }
        });

        if($(this).valid()){

            var url = $(this).attr('action');

            $.ajax({

                url : url,
                method: 'POST',                
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType:'JSON',
                error: function()
                {
                    alert("An error occoured!");
                },
                success: function(response)
                {
                    var status = response.status;                    
                    
                    if(status == 'success')
                    {                                                                                    
                        alert("Treatment Type Updated.");
                        window.location.href = redirect_url +'admin/treat_types';

                    }
                    else if(status == 'failed')
                    {
                        alert("sorry data not updated");
                    }
                    
                }

            });
        }

    });


    //update patient details to db
    $(document).on("submit", "#profile_update", function(e){

        e.preventDefault();

        $(this).validate({
            ignore:":not(:visible)",
            rules: {
                user_name: {
                    required: true,                    
                },
                user_email: {
                    required: true,                    
                },
            }
        });

        if($(this).valid()){

            var url = $(this).attr('action');

            $.ajax({

                url : url,
                method: 'POST',                
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType:'JSON',
                error: function()
                {
                    alert("An error occoured!");
                },
                success: function(response)
                {
                    var status = response.status;
                    var p_id = response.p_id;
                    
                    if(status == 'success')
                    {                                                                                    
                        alert("Profile Updated");
                        window.location.href = redirect_url +'admin/profile';

                    }
                    else if(status == 'failed')
                    {
                        alert("sorry data not updated");
                    }
                    
                }

            });
        }

    });


    //update patient details to db
    $(document).on("submit", "#update_password", function(e){

        e.preventDefault();

        $(this).validate({
            ignore:":not(:visible)",
            rules: {
                new_pass: {
                    required: true,                    
                },
                confirm_new_pass: {
                    equalTo: "#new_pass"
                },
            }
        });

        if($(this).valid()){

            var url = $(this).attr('action');

            $.ajax({

                url : url,
                method: 'POST',                
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType:'JSON',
                error: function()
                {
                    alert("An error occoured!");
                },
                success: function(response)
                {
                    var status = response.status;
                    var p_id = response.p_id;
                    
                    if(status == 'success')
                    {                                                                                    
                        $("#update_password")[0].reset();
                        alert("Password Updated");
                        //window.location.href = redirect_url +'admin/profile';

                    }
                    else if(status == 'failed')
                    {
                        alert("sorry password not updated");
                    }
                    
                }

            });
        }

    });


	//upload sign image to db
    $(document).on("submit", "#sign_upload", function(e){

        e.preventDefault();

            var url = $(this).attr('action');

            $.ajax({

                url : url,
                method: 'POST',                
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType:'JSON',
                error: function(err)
                {
                    alert(err);
                },
                success: function(response)
                {
                    var status = response.status;
                    
                    if(status == 'success')
                    {    
                        $("#sign_upload")[0].reset();                                                                                                        
                        alert("Signature Uploaded");                        

                    }
                    else if(status == 'error')
                    {
                        alert("Sorry Signature Not Uploaded");
                    }

                }

            });

    });



});//document

//auto close alert box
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);


    //update patient details to db
  
   function archive(p_id){

    var p_id = p_id;

    if (confirm("Do you want to Archive"))
    {
            var url = redirect_url +'admin/archive/'+p_id;

            //alert(url);
            //var url = redirect_url +'admin/archive';

            $.ajax({
                url : url,
                method: 'POST',                                                
                dataType:'JSON', 
                //data: 'p_id='+p_id,               
                success: function(response)
                {
                    var status = response.status;
                    var p_id = response.p_id;
                    
                    if(status == 'success')
                    {                                                                                                            
                        alert("Patient Details Archived");
                        window.location.href = redirect_url +'admin/existing_patient';

                    }
                    else if(status == 'failed')
                    {
                        alert("Sorry! Error occured..");
                    }
                    
                }
            });

        }
        return false;
   }