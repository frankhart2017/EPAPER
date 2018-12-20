<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;

    include_once("../includes/config.php");

    $userid = addslashes(trim($_REQUEST['userid']));

    if ($userid == null)
    {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Invalid Entry";
        echo json_encode($final_result);
        return;
    }

    $sql = "SELECT * FROM `user_table` WHERE USER_ID LIKE '$userid'";
    $db = mysqli_query($conn,$sql);

    $sno = 0;

    $QUESTION = Array();
    $REF_ID = Array();

    if(mysqli_num_rows($db) > 0)
    {
        if(mysqli_query($conn,$sql))
        {
            while($row = mysqli_fetch_assoc($db))
            {
                array_push($QUESTION, $row['FORGOT_Q_1']);
                array_push($QUESTION, $row['FORGOT_Q_2']);
            }
         }
     }
     else
        $final_result['error'] = 1;

    $final_result['QUESTION'] = $QUESTION;

    echo json_encode($final_result);
?>
