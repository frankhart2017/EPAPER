$(document).ready(function()
{
  M.AutoInit();

  $("#test1").click(function() {
    $.ajax({
          type: 'POST',
          data: { 'ino': '1', },
          url: 'get_test_input.php',
          dataType: 'json',
          success: function(codedata)
          {
              if(codedata['error'] == 1) {
                M.toast({html: codedata['errorMsg'], classes: 'red'});
              } else if(codedata['error'] == 0) {
                $("#test-input").html(codedata['data']);
              } else {
                M.toast({html: 'Error... contact admin!', classes: 'red'});
              }
          }
      });
  });

  $("#test2").click(function() {
    $.ajax({
          type: 'POST',
          data: { 'ino': '2', },
          url: 'get_test_input.php',
          dataType: 'json',
          success: function(codedata)
          {
              if(codedata['error'] == 1) {
                M.toast({html: codedata['errorMsg'], classes: 'red'});
              } else if(codedata['error'] == 0) {
                $("#test-input").html(codedata['data']);
              } else {
                M.toast({html: 'Error... contact admin!', classes: 'red'});
              }
          }
      });
  });

});
