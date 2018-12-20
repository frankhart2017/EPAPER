<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;
    $final_result['result'] = 0;

    $_SESSION['RESETPASSWORD'] = "notallowtoreset";

    include_once("../includes/config.php");

    $userid = addslashes(trim($_REQUEST['userid']));
    $ans1 = addslashes(trim($_REQUEST['ans1']));
    $ans2 = addslashes(trim($_REQUEST['ans2']));

    if ($userid == null || $ans1 == null || $ans2 == null)
    {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Invalid Entry";
        echo json_encode($final_result);
        return;
    }

    $mark = 0;

    $sql = "SELECT * FROM `user_table` WHERE USER_ID = $userid";
    $db = mysqli_query($conn,$sql);

    $marks = 0;

    $row = mysqli_fetch_assoc($db);
    if($ans1 == $row['FORGOT_A_1'] && $ans2 == $row['FORGOT_A_2']) {
      $marks = 2;
    }

    if($marks == 2)
    {
        $_SESSION['RESETPASSWORD'] = "allowtoreset";
        $_SESSION['RESETUSER_ID']  = $userid;
        $final_result['result']    = 2;
    }

    echo json_encode($final_result);
?>
