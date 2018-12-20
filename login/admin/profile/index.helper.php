<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;

    include_once("../../../includes/config.php");

    $userid = trim($_REQUEST['userid']);
    $fname = trim($_REQUEST['fname']);
    $lname = trim($_REQUEST['lname']);
    $password = trim($_REQUEST['password']);
    $repassword = trim($_REQUEST['repassword']);
    $phone = trim($_REQUEST['phone']);
    $email = trim($_REQUEST['email']);

    $final_result['error'] = 0;

    $sql = "SELECT * FROM `user_table` WHERE user_id = '$userid'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    if($password != null) {
      if (strlen($password) < 8) {
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
    }

    $query = "SELECT * FROM `user_table` WHERE `USER_ID` = '$userid'";

    $row = mysqli_fetch_assoc(mysqli_query($conn, $query));

    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "First Name can have only letters";
        echo json_encode($final_result);
        return;
    }

     if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Last Name can have only letters";
        echo json_encode($final_result);
        return;
    }

     if (strlen($phone) !=10) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Invalid Mobile Number";
        echo json_encode($final_result);
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Invalid Email ID";
        echo json_encode($final_result);
        return;
    }

    if($password != $repassword) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "Passwords do not match!";
        echo json_encode($final_result);
        return;
    }

    if(strlen($password) == 0) {
      $password = $row['PASSWORD'];
    } else {
      $password = md5($password);
    }

    $sql = "UPDATE `user_table` SET `PASSWORD`='$password',FIRST_NAME='$fname',LAST_NAME='$lname',MOBILE='$phone', EMAIL_ID = '$email' WHERE `USER_ID` LIKE '$userid'";

    $db = mysqli_query($conn,$sql);

    if(!$db) {
        $final_result['error'] = 1;
        $final_result['errorMsg'] = "INTERNAL ERROR... CONTACT ADMIN";
    }


    echo json_encode($final_result);
?>
