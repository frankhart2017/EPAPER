<?php
    session_start();    
    $final_result = Array();
    $final_result['error'] = 0;
  
    include_once(__DIR__."/includes/config.php");


    $userid = trim(mysqli_real_escape_string($conn,$_REQUEST['userid']));
    $password = trim(mysqli_real_escape_string($conn,md5($_REQUEST['password'])));

   $sql = "SELECT * FROM user_table WHERE USER_ID = '$userid' AND PASSWORD = '$password'";

   $db = mysqli_query($conn,$sql);

    if(!$db) 
          die("Failed to Insert: ".mysqli_error($conn));

    if(mysqli_num_rows($db) > 0) 
    {
        if(mysqli_query($conn,$sql)) 
        {
              $row = mysqli_fetch_assoc($db);
              $_SESSION['USER_ID'] = $row['USER_ID'];
              $_SESSION['FIRST_NAME'] = $row['FIRST_NAME'];
              $_SESSION['LAST_NAME'] = $row['LAST_NAME'];
              $_SESSION['DEPARTMENT'] = $row['DEPARTMENT'];
              $_SESSION['ROLE'] = $row['ROLE'];
              echo $row['ROLE'];
        }
          
    } 
    else 
    {
        echo 0;
    }

?>