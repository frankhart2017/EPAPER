<?php
    include_once("../includes/config.php");

    $cid = $_REQUEST['cid'];

    $sql = "SELECT * FROM `category_table` WHERE CAT_ID LIKE '$cid' ";
    $db = mysqli_query($conn,$sql);
    if(!$db) die("Failed to Insert: ".mysqli_error($link));

    echo '<div class="input-field col s12 m4">
           <select id="tid">
            <option selected disabled value="">Choose Topic</option>
           ';

    if(mysqli_num_rows($db) > 0) 
    {
        while($row = mysqli_fetch_assoc($db))
        {
            $temp1 = $row['TOPIC_ID'];
            $temp2 = $row['TOPIC_NAME'];
            echo "<option value=\"".$temp1."\">".$temp2."</option>";
        }
    }

    echo '</select><label>Choose Topic</label></div>';
   ?>