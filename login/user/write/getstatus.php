<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;

    $USER_ID = $_SESSION['USER_ID'];

    include_once("../../../includes/config.php");

    $topic = $_REQUEST['topic'];

    $sql = "SELECT * FROM `user_write` WHERE `uid` = '$USER_ID'";

    $final_result['colors'] = Array(0, 0, 0, 0, 0, 0, 0, 0);

    if($result = mysqli_query($conn, $sql)) {
      while($row = mysqli_fetch_assoc($result)) {
        $final_result['colors'][(int)$row['topic']] = $row['status'];
      }
    }

    echo json_encode($final_result);
?>
