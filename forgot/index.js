$(document).ready(function()
{
	  M.AutoInit();
    $('input.validate').characterCounter();
    var cmtlist = $("#cmtlist");
    $("#ques").hide();
    var refid1 = 0,refid2 = 0;

	$("#forgot").click(function()
	{
		var userid = $('#user_id').val();
    $("#user_id").attr("disabled", "disabled");

    if(userid.length === 0 )
    {
      error_block = M.toast({html: 'Enter your user ID!', classes: 'red'});
      return false;
    }

	    $.ajax({
	      type: 'POST',
	      data:
	      {
	        'userid': userid,
	      },
	      url: 'index.helper.php',
	      dataType: 'json',
	      beforeSend: function()
	      {
	      },
	      success: function(final_result)
	      {
          if(final_result['error'] == 0)
          {
  	      	q1 = final_result['QUESTION'][0];
  	      	q2 = final_result['QUESTION'][1];

  	      	$('#sq1').val(q1);
  	      	$('#sq2').val(q2);
  	      	$('.validate').addClass('black-text');
  			    M.updateTextFields();
            $("#ques").show();
          }
          else
            M.toast({html: 'User Not Exist' , classes: 'red'});
	      }

	      });

    });

	$("#check").click(function()
	{
		var userid = $('#user_id').val();
		var ans1 = $('#ans1').val();
		var ans2 = $('#ans2').val();

        $.ajax({
                type: 'POST',
                data:
                {
                  'userid': userid,
                  'refid1': refid1,
                  'ans1': ans1,
                  'refid2': refid2,
                  'ans2': ans2,
                },
                url: 'check.helper.php',
                dataType: 'json',
                beforeSend: function()
                {
                },
                success: function(final_result)
                {
                    if(final_result['error'] == 1)
                    {
                      //Error Occured
                      M.toast({html: final_result['errorMsg'], classes: 'red'});
                    }
                    else if(final_result['error'] == 0)
                    {
                     //No Error Occured
                     if(final_result['result'] == 2)
		                  window.location = "resetpassword.php";
		             else
		             {
                    $("#l1").removeClass('indigo');
                    $("#l1").addClass('red');
		             	  $('#errorMsg').html('Sorry, Your answers doesnot match our records');

		             }
                    }
                    else
                    {
                      window.alert("Something is Wrong... Contact Admin");
                    }
                }
              });
    });



});
