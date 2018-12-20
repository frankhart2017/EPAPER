<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;

    include_once("../includes/config.php");

    $userid = addslashes(trim($_REQUEST['userid']));
    $password = addslashes(trim($_REQUEST['password']));
    $repassword = addslashes(trim($_REQUEST['repassword']));

    if ($userid == null)
    {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Invalid User ID";
        echo json_encode($final_result);
        return;
    }

    if ($password == null || strlen($password) < 8)
    {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Password should be of aleast 8 characters";
        echo json_encode($final_result);
        return;
    }

    if ($password != $repassword)
    {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Password Mismatch";
        echo json_encode($final_result);
        return;
    }

    $password = md5($password);

    $sql = "UPDATE `user_table` SET `PASSWORD`= '$password' WHERE `USER_ID` LIKE '$userid'";
    $db = mysqli_query($conn,$sql);

    if(!$db) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "INTERNAL ERROR... CONTACT ADMIN";
    }

    $_SESSION['RESETPASSWORD']="notallowtosetpassword";
    $_SESSION['RESETUSER_ID']="";
    echo json_encode($final_result);
?>
