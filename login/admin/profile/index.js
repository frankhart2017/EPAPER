$(document).ready(function()
{
 M.AutoInit();

   $("#btn1").click(function()
   {
    	  var userid = $('#username').val();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var password = $('#password').val();
        var repassword = $('#repassword').val();
        var phone = $('#phone').val();
        var email = $('#email').val();

        $.ajax({
                type: 'POST',
                data: {
                  'userid': userid,
                  'fname': fname,
                  'lname': lname,
                  'password': password,
                  'repassword': repassword,
                  'phone': phone,
                  'email': email,
                 },
                url: 'index.helper.php',
                dataType: 'json',
                beforeSend: function(){

                },
                success: function(codedata)
                {
                    if(codedata['error'] == 1)
                    {
                        //Error Occured
                        M.toast({html: codedata['errorMsg']});
                    }
                    else if(codedata['error'] == 0)
                    {
                        //No Error Occured
                        alert('Profile Successfully Updated!');
                        window.location.reload();
                    }
                    else
                    {
                      window.alert("Something is Wrong... Contact Admin");
                    }
                }
        });

 });

});
