<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;

    include_once("../../../includes/config.php");

    $userid = $_SESSION['USER_ID'];
    $a1 = $_REQUEST['a1'];
    $a2 = $_REQUEST['a2'];
    $a3 = $_REQUEST['a3'];
    $a4 = $_REQUEST['a4'];
    $a5 = $_REQUEST['a5'];
    $a6 = $_REQUEST['a6'];

    $sql = "INSERT INTO leisure_score(uid, a1, a2, a3, a4, a5, a6) VALUES('$userid', '$a1', '$a2', '$a3', '$a4', '$a5', '$a6')";

    mysqli_query($conn, $sql);

    echo json_encode($final_result);
?>
