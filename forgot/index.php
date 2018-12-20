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
            margin-top: 25px;
            min-width: 100%  !important;
        }
        .btnsize2
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
        <div class="col s12 m12">
          <div class="card z-depth-2">
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">FORGOT PASSWORD</div>
            <div class="card-content">
              

              <div class="row">
              <i class="txt col s12 m12 center indigo-text large material-icons ">lock</i>
           

                <div class="input-field col s12 m8">
                  <input id="user_id" placeholder="Type Here" type="text" class="validate" required="true">
                  <label for="user_id">Enter User ID</label>
                </div>

              <div class="col s12 m4">
                <a class=" btnsize waves-effect waves-light btn <?php echo $color; ?> z-depth-2" id="forgot">SUBMIT</a>
              </div>

             </div>


             <div id="ques" class="row">
              <div class="col s12 m12">

                <div id="cmtlist black-text">

                  <h5>Security Questions</h5><br>

                  <div class="input-field col s12 m8">
                    <input disabled id="sq1" type="text" class="validate" required="true">
                    <label for="sq1">Question 1</label>
                  </div>

                  <div class="input-field col s12 m4">
                    <input id="ans1"  type="text" class="validate" required="true">
                    <label for="ans1">Answer 1</label>
                  </div>

                  <div class="input-field col s12 m8">
                    <input disabled id="sq2" type="text" class="validate" required="true">
                    <label for="sq2">Question 2</label>
                  </div>

                  <div class="input-field col s12 m4">
                    <input id="ans2"  type="text" class="validate" required="true">
                    <label for="ans2">Answer 2</label>
                  </div>                  
                  <div class="row"><br></div>
                  </div>


                  <div class="row">
                    <div class="col s8 left"><h5 id="errorMsg" class="center-align red-text"></h5></div>
                    <div class="col s4  right"><a class="btnsize2 waves-effect waves-light btn <?php echo $color; ?> z-depth-2" id="check">SUBMIT</a></div>
                  </div>


              
                <br>
                

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
        