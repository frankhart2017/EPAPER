<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;

    include_once("../includes/config.php");

    $userid = addslashes(trim($_REQUEST['userid']));
    $fname = addslashes(trim($_REQUEST['fname']));
    $lname = addslashes(trim($_REQUEST['lname']));
    $password = addslashes(trim($_REQUEST['password']));
    $repassword = addslashes(trim($_REQUEST['repassword']));
    $mobile = addslashes(trim($_REQUEST['mobile']));
    $dept = addslashes(trim($_REQUEST['dept']));
    $email = addslashes(trim($_REQUEST['email']));
    $deptval = addslashes(trim($_REQUEST['deptval']));

    $sq1 = addslashes(trim($_REQUEST['sq1']));
    $ans1 = addslashes(trim($_REQUEST['ans1']));
    $sq2 = addslashes(trim($_REQUEST['sq2']));
    $ans2 = addslashes(trim($_REQUEST['ans2']));

    $final_result['error'] = 0;

    $sql_check = "SELECT * FROM `user_table` WHERE USER_ID = '$userid'";
    $db_check = mysqli_query($conn,$sql_check);
    if(!$db_check)
        die("Failed to Insert: ".mysqli_error($conn));

    if(mysqli_num_rows($db_check) > 0) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "User ID Already Exist";
        echo json_encode($final_result);
        return;
    }

    if($userid == null || strlen($userid) != 15 && strlen($userid) != 7) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Invalid User ID";
        echo json_encode($final_result);
        return;
    }

    if(strpos($userid," ") !== false) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "White Spaces are not allowed in User ID";
        echo json_encode($final_result);
        return;
    }

     if ($password == null || strlen($password) < 8) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Password should be of aleast 8 characters";
        echo json_encode($final_result);
        return;
    }

    if ($password != $repassword) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Password Mismatch";
        echo json_encode($final_result);
        return;
    }

    if ($fname == null || !preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Invalid First Name";
        echo json_encode($final_result);
        return;
    }

     if ($lname == null || !preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Invalid Last Name";
        echo json_encode($final_result);
        return;
    }

    if ($mobile == null || strlen($mobile) !=10)
    {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Invalid Phone Number :".$mobile;
        echo json_encode($final_result);
        return;
    }

    if ($sq1 == null || $ans1 == null || $sq2 == null || $ans2 == null )
    {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Invalid Security Question Answers";
        echo json_encode($final_result);
        return;
    }

    $password = md5($password);

    $sql = "INSERT INTO `user_table` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL_ID`, `MOBILE`, `ROLE`, `PASSWORD`, `DEPARTMENT`, `FORGOT_Q_1`, `FORGOT_A_1`, `FORGOT_Q_2`, `FORGOT_A_2`) VALUES ('$userid', '$fname', '$lname', '$email', '$mobile', 'S', '$password', '$dept', '$sq1', '$ans1', '$sq2', '$ans2')";
    $db = mysqli_query($conn,$sql);

    echo json_encode($final_result);
?>
