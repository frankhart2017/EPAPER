<?php
    session_start();
    $final_result = Array();
    $final_result['error'] = 0;

    include_once("../../../includes/config.php");

    $userid = $_SESSION['USER_ID'];

    $sql = "SELECT * FROM leisure_score WHERE uid = '$userid'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    $final_result['data'] = Array($row['a1'], $row['a2'], $row['a3'], $row['a4'], $row['a5'], $row['a6']);

    echo json_encode($final_result);
?>
