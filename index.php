<?php
    session_start();
    $_SESSION['timeout'] = time();

    if(isset($_SESSION['ROLE']))
    {
        unset($_SESSION['ROLE']);
    }

    $_SESSION['RESETPASSWORD']="notallowtosetpassword";
    $_SESSION['RESETUSER_ID']="";

    include_once("includes/config.php");
    include_once("includes/general.php");
?>
<html>
    <head>
      <!--Import materialize.css-->
      <link rel="icon" href="favicon.ico">
      <title><?php echo $nav_short; ?></title>
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link href="css/material-icons.css" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

       <style>
        .container
        {
           position: relative;
           top: 15%;
        }
        .htitle
        {
          margin-top: 5px;
        }
        .login
        {
            padding: 20px;
            font-size: 1.3em;
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
        .txt
        {
            font-size: 1.1em !important;
         }
          .msg
         {
            text-align: justify;
         }
      </style>
    </head>

  <body>

  <nav>
    <div class="<?php echo $color; ?> nav-wrapper">
      <a href="#!" class="brand-logo hide-on-small-only center"><?php echo $nav_title; ?></a>
      <a href="#!" class="brand-logo hide-on-med-and-up center"><?php echo $nav_short; ?></a>
    </div>
  </nav>

    <div class="container">
      <div class="row">
        <div class="col s12 l4 offset-l4 m5 offset-m2">
          <div class="ploader card z-depth-2">
             <div id="l1" class="login <?php echo $color; ?> center-align white-text"><?php echo $nav_short; ?> SIGN IN</div>
            <div class="card-content">
              <div class="form">
                <div class="row">

                    <div class="htitle col s12 m12 input-field">
                       <input id="userid" type="text" name="userid" class="validate">
                       <label class="grey-text" for="userid">User ID</label>
                    </div>

                    <div class="col s12 m12 input-field">
                       <input id="password" type="password" name="password" class="validate">
                       <label class="grey-text" for="password">Password</label>
                    </div>

                    <div class="col s12 m12">
                      <label>
                        <input id="sp" type="checkbox" />
                        <span class="txt">Show Password</span>
                      </label>
                    </div>

                    <div class="col s12 m12 txtbot">
                      <a class="col s12 m4 btnsize waves-effect waves-light <?php echo $color; ?> btn" id="login">Login</a>
                    </div>

                </div>
              </div>
            </div>
          </div>

          <div class="center-align">
            <a data-target="modal2" class="left waves-effect waves-light grey-text modal-trigger">Options?</a>
            <a class="right waves-effect waves-light grey-text" href="forgot">Forgot Password?</a>
          </div>

        </div>
      </div>
    </div>


    <div id="modal2" class="modal">
        <div class="modal-content center">
            <br>
            <h4 class="center-align"><?php echo $nav_short; ?></h4><br>

              <div class="row">
                <div class="col s12 m12">
                  <ul class="tabs">
                    <li class="tab col s12 m6"><a class="active" href="#test1">About</a></li>
                    <li class="tab col s12 m6"><a href="#test2">Registration</a></li>
                  </ul>
                </div>
                <div id="test2" class="col s12 m12 ">
                    <br><br>
                    <a class="waves-effect waves-light blue btn" href="register">Register</a>
                </div>

                <div id="test1" class="col s12 m12"><br>
                      <p class="msg space-top" id="modal-content-msg"> <?php echo $nav_short; ?> brings to users simplified interpretations of research papers from various fields and aims to familiarize users with the recent concepts to keep pace with rapidly pacing technologies.
                      </p>

                      <div class="row">
                       <!-- <a href="ranks/" class="green white-text chip">Top 100 Users</a> -->
                       <a href="http://care.srmuniv.ac.in" class="red white-text chip">* For any queries contact SRM CENTRE FOR APPLIED RESEARCH IN EDUCATION </a>
                      </div>
                </div>

              </div>

        </div>

    </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="index.js"></script>
    </body>
  </html>
