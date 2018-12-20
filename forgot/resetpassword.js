$(document).ready(function()
{
	M.AutoInit();
    $('input.validate').characterCounter();

	$("#btn1").click(function() 
	{
		var userid = $('#userid').val();
		var password = $('#password').val();
		var repassword = $('#repassword').val();

        $.ajax({
                type: 'POST',
                data: 
                {
                  'userid': userid,
                  'password': password,
                  'repassword': repassword,
                },
                url: 'resetpassword.helper.php',
                dataType: 'json',
                beforeSend: function()
                {
                },        
                success: function(final_result) 
                {
                    if(final_result['error'] == 1)
                    {      
                      //Error Occured
                      M.toast({html: final_result['errorMsg']});
                    }
                    else if(final_result['error'] == 0)
                    { 
                     //No Error Occured
                     alert("Password Changed successfully");
                     window.location = '../index.php';
                    }
                    else 
                    {
                      window.alert("Something is Wrong... Contact Admin");
                    }
                }
              });
    });




});
