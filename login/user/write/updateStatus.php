<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;

    $USER_ID = strtoupper($_SESSION['USER_ID']);

    include_once("../../../includes/config.php");

    $topic = $_REQUEST['topic'];

    $sql = "UPDATE `user_write` SET `status` = '2' WHERE `uid` = '$USER_ID' AND `topic` = '$topic'";

    $result = mysqli_query($conn, $sql);

    if(!$result) {
      $final_result['error'] = 1;
      $final_result['errorMsg'] = "Error, contact admin!";
      echo json_encode($final_result);
      return;
    }

    echo json_encode($final_result);
?>
