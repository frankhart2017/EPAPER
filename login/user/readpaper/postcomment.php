<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;

    $USER_ID = $_SESSION['USER_ID'];

    include_once("../../../includes/config.php");

    $pid = $_SESSION['pid'];
    $comment = $_REQUEST['comment'];

    $sql = "INSERT INTO comments(`pid`, `uid`, `comment`) VALUES('$pid', '$USER_ID', '$comment')";

    $result = mysqli_query($conn, $sql);

    if(!$result) {
      $final_result['error'] = 1;
      $final_result['errorMsg'] = "Error, try again later!";
      echo json_encode($final_result);
      return;
    }

    echo json_encode($final_result);
?>
