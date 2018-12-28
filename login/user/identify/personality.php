<?php
    session_start();
    if(!isset($_SESSION['USER_ID']) || $_SESSION['ROLE'] != 'S')
     {
        echo "ERROR IN SESSION";
        exit;
     }
    $USER_ID=$_SESSION['USER_ID'];
    $_SESSION['TEST_ON'] = "no";

    include_once("../../../includes/config.php");
    include_once("../../../includes/general.php");

?>
<html>
    <head>
      <title>Personality</title>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../../../css/materialize.min.css"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="../../css/material-icons.css" rel="stylesheet">

      <script type="text/javascript" src="../../../js/jquery-3.1.0.min.js"></script>
      <script type="text/javascript" src="../../../js/materialize.min.js"></script>

      <title>IDENTIFY INTEREST</title>

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
        <li><a href="../">Home</a></li>
        <li><a href="index.php">Identify Interest</a></li>
        <li><a href="profile/">Profile</a></li>
    </ul>


    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card z-depth-2">
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">IDENTIFY PERSONALITY</div>
            <div class="card-content">
                <div class="row thinking" style="margin-left: 2%;">
                  <?php

                    // $sql = "SELECT * FROM thinking";
                    //
                    // if($result = mysqli_query($conn, $sql)) {
                    //   while($row = mysqli_fetch_assoc($result)) {
                    //     $split_a = explode("?", $row['a']);
                    //     $split_b = explode("?", $row['b']);
                    //     $split_c = explode("?", $row['c']);
                    //     $split_d = explode("?", $row['d']);
                    //
                    //     $map = Array("CS" => 0, "AS" => 1, "AR" => 2, "CR" => 3);
                    //
                    //     echo "
                    //     <p>
                    //       <label>
                    //         <input class=q".$row['id']." name='q".$row['id']."' type='checkbox' value='".$map[$split_a[1]]."'/>
                    //         <span>".$split_a[0]."</span>
                    //       </label>
                    //       &nbsp;&nbsp;
                    //       <label>
                    //         <input class=q".$row['id']." name='q".$row['id']."' type='checkbox' value='".$map[$split_b[1]]."'/>
                    //         <span>".$split_b[0]."</span>
                    //       </label>
                    //       &nbsp;&nbsp;
                    //       <label>
                    //         <input class=q".$row['id']." name='q".$row['id']."' type='checkbox' value='".$map[$split_c[1]]."'/>
                    //         <span>".$split_c[0]."</span>
                    //       </label>
                    //       &nbsp;&nbsp;
                    //       <label>
                    //         <input class=q".$row['id']." name='q".$row['id']."' type='checkbox' value='".$map[$split_d[1]]."'/>
                    //         <span>".$split_d[0]."</span>
                    //       </label>
                    //     </p>
                    //     <br>
                    //     ";
                    //     }
                    // }

                  ?>

                  <!-- <div class="col s4 m2">
                      <a class="btnsize waves-effect waves-light btn <?php echo $color?>" id="submit">Submit</a>
                  </div> -->

                </div>

            </div>
            </div>
          </div>
        </div>
      </div>

      <script type='text/javascript'>
          M.AutoInit();

          $("#submit").click(function() {

          });

      </script>

    </body>
  </html>
