<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;

    include_once("../../../includes/config.php");

    $userid = trim($_REQUEST['userid']);

    $sql = "DELETE FROM user_table WHERE USER_ID = '$userid'";
    $result = mysqli_query($conn, $sql);

    if(!$result) {
      $final_result['error'] = 1;
      $final_result['errorMsg'] = "Error, try again later!";
      echo json_encode($final_result);
      return;
    }

    echo json_encode($final_result);
?>
