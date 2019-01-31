<?php
    session_start();
    if(!isset($_SESSION['USER_ID']) || $_SESSION['ROLE'] != 'S')
     {
        echo "ERROR IN SESSION";
        exit;
     }
    include_once("../../../includes/config.php");
    include_once("../../../includes/general.php");

    $USER_ID = $_SESSION['USER_ID'];
    $_SESSION['TEST_ON'] = "no";

    $tid = $_SESSION['tid'];

    $sql = "SELECT admin FROM topics WHERE id = $tid";
    $admin = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $admin = $admin['admin'];

?>
<html>
    <head>
      <title>Archives</title>

      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../../../css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../../../css/buttons.css"  media="screen,projection"/>
      <link href="../../../css/material-icons.css" rel="stylesheet">

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
            color: #303f9f ;
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
        .title
        {
            font-size: 1em;
            color: #43a047;
            margin-bottom: 0px;
        }
        .btnsize
        {
          min-width: 40%  !important;
          margin-top: 20px;
        }
        .center-fix
        {
          margin-top: 10px;
         }
         .row-fix
         {
          margin-top: 0px;
        }
        #question1
        {
            font-size: 1.4em;
            width: 100%;
            height : 10%;
            border-color: #9e9e9e;
            border-top: none;
            border-right: none;
            border-left: none;
         }
        .ebtn
        {
          margin-top: 40px;
          height: 40px;
         }
         #preview
         {
          text-align: justify;
          }
        .tabs .tab a
        {
          background-color:#3949ab ;
          color: white;
        }
        .btn:hover
        {
          opacity: 0.5;
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
             <li><a href="../topic/?q=<?php echo $_SESSION['tid']; ?>">Back</a></li>
             <li><a class="dropdown-trigger" data-target="dropdown1">More Options</a></li>
             <li class="active"><a href="../../../index.php">Logout</a></li>
           </ul>

         </div>
       </nav>

         <!-- Dropdown Structure -->
         <ul id="dropdown1" class="dropdown-content">
             <li><a href="#">Home</a></li>
             <li><a href="identify">Identify Interest</a></li>
             <li><a href="../write">Write Paper</a></li>
             <li><a href="profile/">Profile</a></li>
         </ul>


    <div class="container">
      <div class="row">
        <div class="col s12 m12">
          <div class="card z-depth-2">
             <div id="l1" class="login center-align <?php echo $color; ?> white-text"><?php echo strtoupper($_SESSION['tname'])." ARCHIVES"; ?></div>
            <div class="card-content">

              <div class="row">
                <ol>
                  <?php

                    $sql = "SELECT * FROM paper WHERE topic='$admin' ORDER BY putdate";

                    $curDate = time();

                    $empty = 0;

                    if($result = mysqli_query($conn,$sql)) {
                      while($row = mysqli_fetch_assoc($result)) {
                        $date = strtotime($row['putdate']);
                        $diff = $curDate - $date;
                        $diff = abs(round($diff/(60*60*24)));

                        if($diff > 7) {
                          $empty = 1;

                          $filenames = explode(".", $row['filename']);
                          $pname = $filenames[0];

                          $id = $row['id'];

                          echo "<li><a href='../readoldpaper/?q=$id'>".strtoupper($pname)."</a></li>";
                        }
                      }
                    }

                    if($empty == 0) {
                      echo "<p>No old papers!</p>";
                    }

                  ?>
                </ol>
              </div>

          </div>
        </div>
      </div>
    </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../../../js/jquery-3.1.0.min.js"></script>
      <script type="text/javascript" src="../../../js/jquery.blockUI.js"></script>
      <script type="text/javascript" src="../../../js/materialize.min.js"></script>
      <script type="text/javascript" src="index.js"></script>
    </body>
  </html>
