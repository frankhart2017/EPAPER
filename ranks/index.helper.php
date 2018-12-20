<?php
    include_once("../includes/config.php");

    $cid = addslashes(trim($_REQUEST['cid']));
    $tid = addslashes(trim($_REQUEST['tid']));
    $level = addslashes(trim($_REQUEST['level']));
    $scoresrange = addslashes(trim($_REQUEST['scoresrange']));

    if($level==1) 
    $sql = "SELECT * FROM (SELECT * FROM `status_table` WHERE `CAT_ID` LIKE '$cid' AND `TOPIC_ID` LIKE '$tid' AND `LEVEL` LIKE '1' AND `SCORE` >= $scoresrange ORDER BY SCORE DESC LIMIT 100 ) AS myList ORDER BY SCORE DESC";
    else if($level==2) 
    $sql = "SELECT * FROM (SELECT * FROM `status_table` WHERE `CAT_ID` LIKE '$cid' AND `TOPIC_ID` LIKE '$tid' AND `LEVEL` LIKE '2' AND `SCORE` >= $scoresrange ORDER BY SCORE DESC LIMIT 100 ) AS myList ORDER BY SCORE DESC";    
    else if($level==3) 
    $sql = "SELECT * FROM (SELECT * FROM `status_table` WHERE `CAT_ID` LIKE '$cid' AND `TOPIC_ID` LIKE '$tid' AND `LEVEL` LIKE '3' AND `SCORE` >= $scoresrange ORDER BY SCORE DESC LIMIT 100 ) AS myList ORDER BY SCORE DESC";

    $lname="LEVEL_".$level;

    $db = mysqli_query($conn,$sql);
    if(!$db) 
          die("Failed to Insert 1: ".mysqli_error($conn));
    if(mysqli_num_rows($db) == 0) {
       echo "
        <div class=\"animated jello \">
         <img id=\"errorDiv\" class=\"center-block\" src=\"../images/no-results.png?".rand(10,100)."\">

          <br><h5 class=\"center-align ca\">No Results found!</h5>
        </div>
        ";
        return;
    }

    $count = 0;
    echo "<table id=\"table_display_data\" class=\"bordered centered highlight\">
    <thead class=\"indigo white-text\">
    <tr>
    <th>Top No</th>
    <th>User ID</th>
    <th>Name</th>
    <th>Level</th>
    <th>Score</th>
    </tr>
    </thead><tbody>";
    if(mysqli_num_rows($db) > 0) {
        while($row = mysqli_fetch_assoc($db)) {
            $count++;
            echo "<tr>";
            echo "<td>".$count."</td>";
            echo "<td>".$row['USER_ID']."</td>";
            
            $id=$row['USER_ID'];
            $sql2 = "SELECT * FROM `users_table` WHERE `USER_ID` LIKE '$id'";
            $db2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($db2);
            echo "<td>".$row2['FIRST_NAME']."</td>";

            echo "<td>".$level."</td>";
            echo "<td>".round($row['SCORE'])."%"."</td>";
            echo "</tr>";
        }
    }
    echo "</tbody><table>";
?>