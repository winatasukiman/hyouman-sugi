$(document).ready(function() {
    ori_email = $('#email').val();
    email_changed = false;
    $('#email').on('input', function () {
        console.log($('#email_changed').val());
        if($('#email').val() == ori_email){
            if($('#email_status').hasClass("badge-success")) {
                $('#email_status').html("Verified"); 
            } else { 
                $('#email_status').html("Unverified"); 
            }
            
            $('#email_changed').val(false);
			$('#resend_email').css("visibility","visible");
        }
        else {
            $('#email_status').html(""); 
            $('#email_changed').val(true);
			$('#resend_email').css("visibility","hidden");
        }

    });
    $("#resend_success").hide();
    $("#resend_fail").hide();
    $('#resend_email').on('click', function () {
        $.ajax({
            type: 'post',
            url: base_url+'user/resend_user_email',
            data: {
            },
            success: function(data) {
                console.log(data);
                if(data==1){
                    $("#resend_success").fadeTo(2000, 500).slideUp(500, function() {
                        $("#success-alert").slideUp(500);
                      });
                } else {
                    $("#resend_fail").fadeTo(2000, 500).slideUp(500, function() {
                        $("#success-alert").slideUp(500);
                      });
                }
            }
        });
    });
});