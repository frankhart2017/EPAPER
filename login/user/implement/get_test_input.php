<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;

    $USER_ID = $_SESSION['USER_ID'];

    include_once("../../../includes/config.php");

    $ino = $_REQUEST['ino'];
    $pid = $_SESSION['pid'];

    $sql = "SELECT inputs FROM paper WHERE id = $pid";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $inputs = explode(";", $row['inputs']);

    $final_result['data'] = $inputs[$ino-1];

    echo json_encode($final_result);
?>
