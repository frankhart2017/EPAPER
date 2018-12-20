<?php
    session_start();
    if(!isset($_SESSION['USER_ID']) || $_SESSION['ROLE'] != 'A')
     {
        echo "ERROR IN SESSION";
        exit;
     }
    include_once("../../../includes/config.php");
    include_once("../../../includes/general.php");

    $username = $_SESSION['USER_ID'];
    $sql = "SELECT * FROM `user_table` WHERE `USER_ID` LIKE '$username'";
    $db = mysqli_query($conn,$sql);
    if(!$db)
      die("Failed to Load: ".mysqli_error($conn));
    $row = mysqli_fetch_assoc($db);
    $firstname = $row['FIRST_NAME'];
    $lastname = $row['LAST_NAME'];
    $dept = $row['DEPARTMENT'];
    $mailid = $row['EMAIL_ID'];
    $mobile = $row['MOBILE'];
?>
<html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../../../css/materialize.min.css"  media="screen,projection"/>
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

        </style>
    </head>

    <body>

      <nav>
         <div class="<?php echo $color; ?> nav-wrapper">
           <a href="#!" class="brand-logo hide-on-small-only center"><?php echo $nav_title; ?></a>
           <a href="#!" class="brand-logo hide-on-med-and-up center"><?php echo $nav_short; ?></a>
           <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

           <ul id="nav-mobile" class="right hide-on-med-and-down">
             <li><a class="dropdown-trigger" data-target="dropdown1">More Options</a></li>
             <li class="active"><a href="../../../index.php">Logout</a></li>
           </ul>

         </div>
       </nav>

     <!-- Dropdown Structure -->
     <ul id="dropdown1" class="dropdown-content">
       <li><a href="../">Home</a></li>
       <li><a href="#">Profile</a></li>
     </ul>


    <div class="container">
      <div class="row">
        <div class="col s12 m12">
          <div class="card z-depth-2">
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">PROFILE HOME</div>
            <div class="card-content">

                <div id="info" class="row">

                 <div class="">
                  <i class=" col s12 m12 center indigo-text large material-icons ">account_box</i>
                  <div id="uname" class=" col s12 m12 txtbot center  "><?php echo $firstname." ".$lastname; ?></div>
                </div>

                 <div class=" col s12 m12">
                    <br>
                     <div class="input-field col s12 m6">
                          <input disabled id="username" value="<?php echo $username; ?>" type="text"  name="username" class="validate">
                          <label  for="username"> User ID</label>
                        </div>

                         <div class="input-field col s12 m6">
                          <input disabled id="dept" value="<?php echo $dept; ?>" type="text"  class="validate">
                          <label  for="dept">Department</label>
                        </div>
                        <div class="input-field col s12 m6">
                          <input id="password" placeholder="Type Here" type="password" class="validate">
                          <label for="password">Password</label>
                        </div>

                        <div class="input-field col s12 m6">
                          <input id="repassword" placeholder="Type Here" type="password" class="validate">
                          <label for="repassword">Repeat Password</label>
                        </div>

                         <div class="input-field col s12 m6">
                          <input id="fname" value="<?php echo $firstname; ?>" type="text"  class="validate">
                          <label  for="fname">First Name</label>
                        </div>

                        <div class="input-field col s12 m6">
                          <input id="lname" value="<?php echo $lastname; ?>" type="text" class="validate">
                          <label for="lname">Last Name</label>
                        </div>

                        <div class="input-field col s12 m6">
                          <input id="email" value="<?php echo $mailid; ?>" type="text" name="email"  class="validate">
                          <label  for="email">Email ID</label>
                        </div>

                        <div class="input-field col s12 m6">
                          <input id="phone" value="<?php echo $mobile; ?>" type="text" class="validate">
                          <label   for="role">Mobile</label>
                        </div>

                      </div>
                      <div class="row col s12 m12 center">
                        <a class="btnsize waves-effect waves-light btn z-depth-3 <?php echo $color; ?>" id="btn1">UPDATE</a>
                      </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../../../js/jquery-3.1.0.min.js"></script>
      <script type="text/javascript" src="../../../js/materialize.min.js"></script>
      <script type="text/javascript" src="index.js"></script>
    </body>
  </html>
