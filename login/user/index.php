<?php
    session_start();
    if(!isset($_SESSION['USER_ID']) || $_SESSION['ROLE'] != 'S')
     {
        echo "ERROR IN SESSION";
        exit;
     }
    $USER_ID=$_SESSION['USER_ID'];
    $_SESSION['TEST_ON'] = "no";

    $NAME = strtoupper($_SESSION['FIRST_NAME']." ".$_SESSION['LAST_NAME']);

    include_once("../../includes/config.php");
    include_once("../../includes/general.php");

?>
<html>
    <head>
      <title><?php echo $NAME; ?></title>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
      <link href="../../css/material-icons.css" rel="stylesheet">

      <title>HOME</title>

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

        </style>
    </head>

    <body>

 <nav>
    <div class="<?php echo $color; ?> nav-wrapper">
      <a href="#!" class="brand-logo hide-on-small-only center"><?php echo $nav_title; ?></a>
      <a href="#!" class="brand-logo hide-on-med-and-up center"><?php echo $nav_short; ?></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="dropdown-trigger notifi" href="#!" data-activates="notification" data-target="dropdown-notification" data-constrainWidth="false" >
          <i class="material-icons white-text n">notifications</i>
            <?php

              $sql = "SELECT * FROM notification WHERE uid = '$USER_ID'";

              $result = mysqli_query($conn,$sql);

              $count = mysqli_num_rows($result);

              if($count > 0) {
                echo '<small class="notification-badge">';
                echo $count;
                echo '</small>';
              }

            ?>
        </a>
      </li>
        <li><a class="dropdown-trigger" data-target="dropdown1">More Options</a></li>
        <li class="active"><a href="../../index.php">Logout</a></li>
      </ul>

    </div>
  </nav>

    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#">Home</a></li>
        <li><a href="identify">Identify Interest</a></li>
        <li><a href="write">Write Paper</a></li>
        <li><a href="profile/">Profile</a></li>
    </ul>

    <ul id='dropdown-notification' class='dropdown-content drop-notifi'>
      <?php

        $sql = "SELECT * FROM notification WHERE uid = '$USER_ID'";

        if(mysqli_num_rows(mysqli_query($conn, $sql)) == 0) {
          echo "<li><a href='#'>No notifications!</a></li>";
        } else {
          if($result = mysqli_query($conn, $sql)) {
            while($row = mysqli_fetch_assoc($result)) {
              echo "<li><a href='#'><strong>".$row['notif']."</strong></a></li>";
            }
          }
          $sql = "DELETE FROM notification WHERE uid = '$USER_ID'";
          mysqli_query($conn, $sql);
        }

      ?>
    </ul>

    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card z-depth-2">
             <div id="l1" class="login center-align <?php echo $color; ?> white-text"><?php echo $NAME; ?> HOME </div>
            <div class="card-content">

                    <div class="row">
                      <p style="font-size: 120%; margin-left: 10px; font-weight: bold;">Choose topic:</p>

                      <?php

                        $sql = 'SELECT * FROM topics ORDER BY topic';

                        if($db = mysqli_query($conn,$sql)) {
                          while($row = mysqli_fetch_assoc($db)) {
                            echo '
                            <a id="1" class="col s8 m4" href="topic/?q='.$row['id'].'">
                              <div class="card hoverable c1">
                                <div class="center-align card-content '.$color.' white-text">
                                  <span class="card-title">'.$row['topic'].'</span>
                                </div>
                              </div>
                            </a>';
                          }
                        }

                      ?>
                    </div>

            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../../js/jquery-3.1.0.min.js"></script>
      <script type="text/javascript" src="../../js/materialize.min.js"></script>
      <script type="text/javascript" src="index.js"></script>
    </body>
  </html>
