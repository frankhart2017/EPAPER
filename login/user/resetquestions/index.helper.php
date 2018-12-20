<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;

    include_once("../../../includes/config.php");

    $userid = addslashes(trim($_REQUEST['userid']));
    $sq1 = addslashes(trim($_REQUEST['sq1']));
    $ans1 = addslashes(trim($_REQUEST['ans1']));
    $sq2 = addslashes(trim($_REQUEST['sq2']));
    $ans2 = addslashes(trim($_REQUEST['ans2']));

    $final_result['error'] = 0;

    if ($userid == null || $sq1 == null || $ans1 == null || $sq2 == null || $ans2 == null )
    {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Invalid Entry";
        echo json_encode($final_result);
        return;
    }

    $sql = "UPDATE `user_table` SET `FORGOT_Q_1` = '$sq1', `FORGOT_A_1` = '$ans1', `FORGOT_Q_2` = '$sq2', `FORGOT_A_2` = '$ans2' WHERE `USER_ID` = '$userid'";
    $db = mysqli_query($conn, $sql);

    if(!$db)
    {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "INTERNAL ERROR... CONTACT ADMIN";
    }

    echo json_encode($final_result);
?>
