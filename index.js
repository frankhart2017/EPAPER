$(document).ready(function()
{
    M.AutoInit();

    $('body').keyup(function(event)
    {
        if(event.keyCode == 13) 
        {
            $("#login").click();
        }
    });
    
   M.toast({html: 'Welcome !'});

  $("#sp").click(function() 
  {
      if($('#sp').prop('checked'))
      {
        $("#password").prop('type', 'text');
      }
      else 
      {
        $("#password").prop('type', 'password');
      }
  });




  $("#login").click(function() 
  {
    var userid = $("#userid").val();
    var password = $("#password").val();


        if(userid.length === 0 ) 
        {
            error_block = M.toast({html: 'Enter your user ID!', classes: 'red'});
            $("#userid").addClass('invalid');
            return false;
        }
        
        if(password.length === 0 ) 
        {
            error_block = M.toast({html: 'Enter your password!', classes: 'red'});
            $("#password").addClass('invalid');
            return false;
        }

        var responseID;

         $.ajax({
                type: 'POST',
                data: 
                {
                  'userid': userid,
                  'password': password,
                },
                url: 'index.helper.php',
                beforeSend: function()
                {
                  M.toast({html: 'Checking Data !'});
                },        
                success: function(responseID) 
                {
                   if(responseID === 'S')
                   { 
                    window.location   = 'login/user/index.php';
                   }
                   else if(responseID === 'C') 
                   { 
                    window.location   = 'login/coordinator/index.php';
                   }
                   else if(responseID === 'A') 
                   { 
                    window.location   = 'login/admin/index.php';
                   }
                   else if (responseID== 0)
                   {
                    $("#l1").removeClass('indigo');
                    $("#l1").addClass('red');
                    M.toast({html: 'Wrong Credentials!', classes: 'red'});
                   }
        }
    });
  });


});