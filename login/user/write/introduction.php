<?php
    session_start();
    if(!isset($_SESSION['USER_ID']) || $_SESSION['ROLE'] != 'S')
     {
        echo "ERROR IN SESSION";
        exit;
     }
    $USER_ID = strtoupper($_SESSION['USER_ID']);
    $_SESSION['TEST_ON'] = "no";

    include_once("../../../includes/config.php");
    include_once("../../../includes/general.php");

    include("encrypt.php");

    $topic = '1';
    $topicName = 'introduction';
    $size = 12;

    if(isset($_POST['save'])) {
      if(!empty($_POST['passcode'])) {
        $text = "";
        for($i=1; $i<=$size; $i++) {
          $text .= dec_enc("encrypt", $_POST['editor'.$i], $_POST['passcode']) . "~+~";
        }

        $sql = "UPDATE `user_write` SET `status` = '2', `text` = '$text' WHERE `topic` = '$topic' AND `uid` = '$USER_ID'";
        if(mysqli_query($conn, $sql)) {
          echo "<script> alert('Saved successfully!'); </script>";
          echo "<script> location.href = 'index.php'; </script>";
        } else {
          echo mysqli_error($conn);
        }

      } else {
        echo "<script> alert('Enter secret key!'); </script>";
      }
    }

    function displayForm($text = Array()) {
      include("../../../includes/config.php");
      include("../../../includes/general.php");

      global $topicName;

      $sql = "SELECT * FROM `write` WHERE `topic` = '$topicName'";
      $counter = 1;
      $data = "";
      $i = 0;

      if($result = mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<p><strong>".$counter.")&nbsp;".$row['question']."</strong></p>";
          echo "<br>";
          $name = "editor".$counter;
          $counter++;
          echo "<form method='post'>
          <textarea class='ckeditor' name=$name id=$name rows='10' cols'80'>";
          if(sizeof($text) > 0) {
            echo $text[$i];
            $i++;
          }
          echo "
          </textarea>
          <script>
              CKEDITOR.replace( $name,{
               } );

          </script>

          ";
          echo "<br>";

        }
      }

      echo '
          <div class="input-field col s8 m4">
            <input name="passcode" id="passcode" type="text" class="validate" autocomplete="off">
            <label for="passcode">Secret key</label>
          </div>
          <div class="col s4 m2">
            <button name="save" class="btnsize waves-effect waves-light btn '.$color.'"  id="submit" >Save</button>
          </div>
        </form>';
    }

    function unsave() {
      include("../../../includes/config.php");
      include("../../../includes/general.php");

      $USER_ID = strtoupper($_SESSION['USER_ID']);
      global $topic;
      global $topicName;

      $sql = "UPDATE `user_write` SET `status` = '1', `text` = '' WHERE `topic` = '$topic' AND `uid` = '$USER_ID'";
      mysqli_query($conn, $sql);

      echo "<script> location.href = '$topicName.php'; </script>";
    }

    if(isset($_POST['lost-file'])) {
      unsave();
    }

    if(isset($_POST['submit'])) {
      if(!empty($_POST['secret-key'])) {
        $sql = "SELECT `text` FROM `user_write` WHERE `topic` = '$topic' AND `uid` = '$USER_ID'";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

        $text = $row['text'];

        $text_arr = explode("~+~", $text);
        for($i=0; $i<$size; $i++) {
          $text_arr[$i] = dec_enc("decrypt", $text_arr[$i], $_POST['secret-key']);
        }

        $_SESSION['display'] = 1;
        $_SESSION['text_arr'] = $text_arr;

      } else {
        echo "<script> alert('Enter secret key!'); </script>";
      }
    }

?>
<html>
    <head>
      <title><?php echo ucfirst($topicName); ?></title>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../../../css/materialize.min.css"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="../../css/material-icons.css" rel="stylesheet">

      <script type="text/javascript" src="../../../js/jquery-3.1.0.min.js"></script>
      <script type="text/javascript" src="../../../js/materialize.min.js"></script>


      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

       <style>
        .container
        {
           position: relative;
           top: 5%;
        }
         .htitle
        {
          margin-top: 5px;
        }
        .login
        {
            padding: 20px;
            font-size: 1.5em;
            margin-bottom: 0px;
        }
        .fontsize
        {
           font-size: 1rem !important;
        }
        .fontsizetxt
        {
          margin-top: 0px !important;
           font-size: 0.8rem !important;
        }
        .padbot
        {
          margin-bottom: 0px !important;
          margin-top: 0px !important;
        }
        .txtbot
        {
           padding-top: 20px !important;
        }
        .text
        {
            font-size: 1.2em;
        }
        .title
        {
            font-size: 1em;
            margin-bottom: 0px;
        }
        .btnsize
        {
            min-width: 100%  !important;
          margin-top: 25px;
        }
        .cbox
        {
            padding: 2px;
            font-size: 3em;
        }
        .btnc
        {
         margin-top: 25px !important;
        }
        .c1
        {
          text-align: justify;
          cursor: pointer;
         }
        .countno
        {
          font-size: 2em;
        }

        .notification-badge {
            position: relative;
            right: -25px;
            top: -75px;
            color: #00796b;
            font-weight: bold;
            background-color: white;;
            margin: 0 -.8em;
            border-radius: 50%;
            padding: 5px 10px;
        }

        .notifi:hover {
          background: none;
        }

        ul.drop-notifi{
            width:30% !important;
        }

        span {
          color: black;
        }

        </style>

        <!-- <script src="ckeditor5-build-classic/ckeditor.js"></script> -->
        <!-- <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script> -->
        <script src="ckeditor/ckeditor.js"></script>
    </head>

    <body>

 <nav>
    <div class="<?php echo $color; ?> nav-wrapper">
      <a href="#!" class="brand-logo hide-on-small-only center"><?php echo $nav_title; ?></a>
      <a href="#!" class="brand-logo hide-on-med-and-up center"><?php echo $nav_short; ?></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Back</a></li>
        <li><a class="dropdown-trigger" data-target="dropdown1">More Options</a></li>
        <li class="active"><a href="../../../index.php">Logout</a></li>
      </ul>

    </div>
  </nav>

    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#">Home</a></li>
        <li><a href="identify">Identify Interest</a></li>
        <li><a href="index.php">Write Paper</a></li>
        <li><a href="profile/">Profile</a></li>
    </ul>

    <script type='text/javascript'>
        M.AutoInit();

    </script>
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card z-depth-2">
             <div id="l1" class="login center-align <?php echo $color; ?> white-text"><?php echo strtoupper($topicName); ?></div>
            <div class="card-content">
                <div class="row mindset" style="margin-left: 2%;">
                  <?php

                    $sql = "SELECT `status` FROM `user_write` WHERE `uid` = '$USER_ID' and `topic` = '$topic'";

                    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

                    $display = 0;
                    if(!empty($_SESSION['display']))
                      $display = $_SESSION['display'];

                    if($row['status'] == '2' && $display != 1) {
                      echo '<div class="col s14 m8">
                        <form method="post" style="text-align: center;" enctype="multipart/form-data">
                          <div class="input-field col s8 m6">
                            <input name="secret-key" id="pname" placeholder="Enter secret key" type="text" class="validate" data-length="200" autocomplete="off" autofocus>
                            <label for="pname">Secret Key</label>
                            <button name="submit" class="btnsize waves-effect waves-light-btn btn '.$color.'">Submit</button>
                          </div>
                        </form>
                      </div>';
                      echo '<div class="col s4 m2" style="text-align: center;">
                        <form method="post">
                          <button name="lost-file" class="btnsize waves-effect waves-light btn '.$color.'">Lost key</button>
                        </form>
                      </div>';
                    } else {
                      if(!empty($_SESSION['text_arr']))
                        displayForm($_SESSION['text_arr']);
                      else
                        displayForm();
                    }

                  ?>

                </div>

            </div>
            </div>
          </div>
        </div>
      </div>

    </body>
  </html>
