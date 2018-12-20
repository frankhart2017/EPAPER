<?php
    session_start();

    if($_SESSION['RESETPASSWORD'] != "allowtoreset")
    {
        echo "Perimission Denied";
        exit;
    }

    $user_id =  $_SESSION['RESETUSER_ID'];

    include_once("../includes/config.php");
    include_once("../includes/general.php");
?>
<html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <link href="../css/material-icons.css" rel="stylesheet">

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
        .login {
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
            min-width: 100%  !important;
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
      </ul>

      <ul class="sidenav" id="mobile-demo">
       <li><a href="../index.php">Login</a></li>
      </ul>

    </div>
  </nav>

    <!-- Dropdown Structure -->
      <ul id="dropdown1" class="dropdown-content">
       <li><a href="../index.php">Login</a></li>
      </ul>

    <div class="container">
      <div class="row">
        <div class="col s12 l4 offset-l4 m5 offset-m2">
          <div class="card z-depth-2">
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">RESET PASSWORD</div>
            <div class="card-content">

              <div class="row">

              <i class="txt col s12 m12 center indigo-text Medium material-icons ">lock_open</i>


                <div class="input-field col s12 m12 hide">
                  <input id="userid" value="<?php echo $user_id; ?>" type="text" class="validate" required="true">
                  <label for="userid">userid</label>
                </div>


                <div class="input-field col s12 m12">
                  <input id="password" type="password" class="validate" required="true">
                  <label for="password">New password</label>
                </div>

                <div class="input-field col s12 m12">
                  <input id="repassword" type="password" class="validate" required="true">
                  <label for="repassword">Re-type password</label>
                </div>

              <div class="col s12 m12">
                <a class=" btnsize waves-effect waves-light btn <?php echo $color; ?> z-depth-2" id="btn1">SUBMIT</a>
              </div>

             </div>

            </div>
          </div>
        </div>
      </div>
    </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery-3.1.0.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="resetpassword.js"></script>
    </body>
  </html>
