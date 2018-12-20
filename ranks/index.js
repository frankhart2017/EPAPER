$(document).ready(function()
{
   M.AutoInit();
   var cid,tid,question_Latex,app_str,i,j,current_element,exam,subject,company,topictag;
   var topiclist = $('#TopicList');
   var tableDiv = $("#tableDiv");
   var levelSelect = $('#levelSelection');
   var scoresrange = 0;
   
 $("#scorerange").change(function() {
     scoresrange = $('#scorerange').val();
     $('#mslabel').html("Score Selected "+scoresrange);
   });


   $('#cid').change(function() 
   {
        cid = $('#cid :selected').val();

        $.ajax({
            type: 'POST',
            data: { 'cid': cid, },
            url: 'gettopic.helper.php',
            success: function(final_result) 
            { 
                topiclist.html(final_result);
                M.AutoInit();

                $('#tid').change(function() 
                {
                    tid = $('#tid :selected').val();
                });
            }
        });

   });

   $('#submit').click(function() 
   {
        $.ajax({
                type: 'POST',
                data: 
                {
                  'cid': cid,
                  'tid': tid,
                  'level': levelSelect.val(),
                  'scoresrange': scoresrange,
                },
                url: 'index.helper.php',
                beforeSend: function()
                {
                  tableDiv.html("");
                },        
                success: function(phpdata) 
                {
                    tableDiv.html(phpdata);
                    $('#table_display_data').DataTable( {
                          "dom": '<"toolbar">frtip'
                      } );
                     //$("div.toolbar").html('<a class="flow-text black-text">VIEW LIST</a>');
                      $("#table_display_data").tableExport();
                },
                error: function() 
                {
                    console.log("Error (Cantact Admin): " + phpdata);
                }
        });

   });


     


});