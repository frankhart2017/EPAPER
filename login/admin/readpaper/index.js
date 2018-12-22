$(document).ready(function() {
  M.AutoInit();

  $("#add").click(function() {

      var comment = $("#comment").val();

      if(!comment) {
        M.toast({html: "Cannot post empty comment!", classes:'red'});
      }

      else {
        $.ajax({
            type: 'POST',
            data: { 'comment': comment, },
            url: 'postcomment.php',
            dataType: 'json',
            success: function(codedata)
            {
                if(codedata['error'] == 1) {
                  M.toast({html: codedata['errorMsg'], classes: 'red'});
                } else if(codedata['error'] == 0) {
                  window.alert('Comment posted successfully!');
                  window.location.reload();
                } else {
                  M.toast({html: "Error, contact admin!", classes: 'red'});
                }
            }
        });
      }

  });
});
