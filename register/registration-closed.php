<?php
    session_start();
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
           top: 15%;
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
       <li><a href="../index.php">Login</a></li>
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
        <div class="col s12 l6 offset-l3 m10 offset-m1">
          <div class="center card z-depth-2">
             <div id="l1" class="login <?php echo $color; ?> center-align white-text">USER REGISTRATION</div>
               <div class="card-content">
                <div class="center row">
                      
                      <div class="flow-text red-text">
                      Registration is Closed ! <br><br>
                      </div>

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
      <script type="text/javascript" src="index.js"></script>
    </body>
  </html>