<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;

    $USER_ID = $_SESSION['USER_ID'];

    include_once("../../../includes/config.php");

    $topic = $_REQUEST['topic'];

    $sql = "SELECT `id` FROM `user_write` WHERE `uid` = '$USER_ID' AND `topic` = '$topic'";

    if(mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
      echo json_encode($final_result);
      return;
    }

    $sql = "INSERT INTO user_write(`uid`, `topic`, `status`) VALUES('$USER_ID', '$topic', '1')";

    $result = mysqli_query($conn, $sql);

    if(!$result) {
      $final_result['error'] = 1;
      $final_result['errorMsg'] = "Error, contact admin!";
      echo json_encode($final_result);
      return;
    }

    echo json_encode($final_result);
?>
