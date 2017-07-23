$(document).ready(function(){
   
   //=========login form submit =============
    $(document).on("submit", "#form_login", function(e){

        e.preventDefault();

        $(this).validate({
            ignore:":not(:visible)",
            rules: {
                email: {
                    required: true,
                    email : true
                },
                
                password: {
                    required: true
                }
                
            },
            highlight: function(element){
                $(element).closest('.input-group').addClass('validate-has-error');
            },
            
            unhighlight: function(element)
            {
                $(element).closest('.input-group').removeClass('validate-has-error');
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
                    var login_status = response.login_status;
                    
                    if(login_status == 'success')
                    {                                    
                        $(".form-login-error").slideUp('fast');

                        $(".login-page").addClass('logging-in');                    

                        $('.login-form .spinner').show();

                        setTimeout(function()
                        {
                            var redirect_url = 'http://rajdental/';

                            window.location.href = redirect_url +'admin/dashboard';

                        },500);

                    }
                    else if(login_status == 'invalid')
                    {
                        $('.form-login-error').show();
                    }
                    
                }

            });
        }

    });
	
	
	//========= profile login form submit =============
    $(document).on("submit", "#profile_login", function(e){

        e.preventDefault();

        $(this).validate({
            ignore:":not(:visible)",
            rules: {                
                password: {
                    required: true
                }
                
            },
            highlight: function(element){
                $(element).closest('.input-group').addClass('validate-has-error');
            },
            
            unhighlight: function(element)
            {
                $(element).closest('.input-group').removeClass('validate-has-error');
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
                    var login_status = response.login_status;
                    
                    if(login_status == 'success')
                    {                                    
                        //$(".form-login-error").slideUp('fast');

                        //$(".login-page").addClass('logging-in');                    

                        //$('.login-form .spinner').show();

                        setTimeout(function()
                        {
                            var redirect_url = 'http://rajdental/';

                            window.location.href = redirect_url +'admin/profile';

                        },100);

                    }
                    else if(login_status == 'invalid')
                    {
                        $('.form-login-error').show();
                    }
                    
                }

            });
        }

    });
	
    // =========== forgot pass form submit ==============

        $(document).on("submit", "#forgot_pass_form", function(e){

        e.preventDefault();

        $(this).validate({
            ignore:":not(:visible)",
            rules: {
                email: {
                    required: true,
                    email : true
                },
                
                fpassword: {
                    required: true
                },

                confirm_password:{
                    required:true,
                    equalTo:"#fpassword"
                }
                
            },
            highlight: function(element){
                $(element).closest('.input-group').addClass('validate-has-error');
            },
            
            unhighlight: function(element)
            {
                $(element).closest('.input-group').removeClass('validate-has-error');
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
                beforeSend: function(){
                    $('#forgot_pass_form .btn-login').html('Updating&nbsp;&nbsp; <i class="fa fa-spinner fa-spin" style="font-size:20px"></i>');                    
                },                
                complete: function(){
                    $('#forgot_pass_form .btn-login').text('Update Password');                    
                },
                success: function(response)
                {
                    var result = response.status;

                    if(result == 'mailsuccss')
                    {        
                        $(".form-login-error").hide();
                        $('.form-forgotpass-error').hide();
                        $('#forgot_pass_form').hide();
                        $('#form_login').show();
                        $('.form-forgotpass-success').show();

                    }
                    if(result == 'mailfailed')
                    {
                        $('.form-login-error').hide();
                        $('.form-forgotpass-success').hide();
                        $('.form-forgotpass-error').show();
                    }
                    
                }

            });
        }

    });

});

$(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
});

function show_forgot_password_form(){
    $('#form_login').hide();
    $('#forgot_pass_form').show();
}

function show_login_form(){
    $('#forgot_pass_form').hide();
    $('#form_login').show();
}
