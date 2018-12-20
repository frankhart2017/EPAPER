$(document).ready(function()
{
    M.AutoInit();
    $('input.validate').characterCounter();

    M.toast({html: 'User Registration !'});


   $("#clear").click(function() 
   {
      location.reload();
   });

   $("#register").click(function() 
   {
    	  var userid = $('#user_id').val();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var password = $('#password').val();
        var repassword = $('#repassword').val();
        var mobile = $('#mobile').val();
        var dept = $('#dept :selected').text();
        var deptval = $('#dept :selected').val();
        var email = $('#email').val();

        var sq1 = $('#sq1').val();
        var ans1 = $('#ans1').val();
        var sq2 = $('#sq2').val();
        var ans2 = $('#ans2').val();


        $.ajax({
                type: 'POST',
                data: 
                {
                  'userid': userid,
                  'fname': fname,
                  'lname': lname,
                  'password': password,
                  'repassword': repassword,
                  'mobile': mobile,
                  'dept': dept,
                  'email': email,
                  'deptval': deptval,
                  'sq1': sq1,
                  'ans1': ans1,
                  'sq2': sq2,
                  'ans2': ans2,
                },
                url: 'index.helper.php',
                dataType: 'json',
                beforeSend: function()
                {
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
                      alert('Registration Confirmed!');
                      window.location = "../index.php";
                    }
                    else 
                    {
                      window.alert("Something is Wrong... Contact Admin");
                    }
                }
              });
 
      });


  });