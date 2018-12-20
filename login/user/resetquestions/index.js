$(document).ready(function()
{
	M.AutoInit();


	$("#btn1").click(function() 
    {
    	var userid = $('#userid').val();

        var sq1 = $('#sq1').val();
        var ans1 = $('#ans1').val();
        var sq2 = $('#sq2').val();
        var ans2 = $('#ans2').val();

        $.ajax({
                type: 'POST',
                data: 
                {
                  'userid': userid,
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
                      alert('Information Successfully Updated!');
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
