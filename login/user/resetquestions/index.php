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
?>
<html>
    <head>
      <title>Reset questions</title>

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
        .cbox
        {
            padding: 2px;
            font-size: 3em;
        }
        .btn
        {
         margin-top: 25px !important;
         min-width: 100%;
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
             <li><a href="#">Home</a></li>
             <li><a href="identify">Identify Interest</a></li>
             <li><a href="../write">Write Paper</a></li>
             <li><a href="profile/">Profile</a></li>
         </ul>


    <div class="container">
      <div class="row">
        <div class="col s12 m12">
          <div class="card z-depth-2">
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">RESET SECURITY QUESTIONS</div>
            <div class="card-content">

              <div class="row">

                <div class="input-field col s12 m8">
                  <input disabled id="userid" placeholder="Type Here" value="<?php echo $USER_ID; ?>" type="text" class="validate">
                  <label for="userid">User ID</label>
                </div>

              </div>

              <div class="row">

              <div class="col s12 m12">
                  <h5>Security Questions</h5><br>

                    <?php
                      $sno = 1;
                      $sql = "SELECT * FROM `security_questions_table` ORDER BY rand() Limit 2";
                      $db = mysqli_query($conn,$sql);
                      if(!$db)
                        die("Failed to Select: ".mysqli_error($conn));
                      $row = null;
                      if(mysqli_num_rows($db) > 0 )
                      {
                        while ($row = mysqli_fetch_assoc($db))
                        {
                          $ques[$sno] = $row['QUESTION'];  $sno = $sno + 1;
                        }
                      }
                    ?>
                  </div>

                  <div class="input-field col s12 m8">
                    <input disabled id="sq1" value="<?php echo $ques[1]; ?>" type="text" class="validate" required="true">
                    <label for="sq1">Question 1</label>
                  </div>

                  <div class="input-field col s12 m4">
                    <input id="ans1"  type="text" class="validate" required="true">
                    <label for="ans1">Answer 1</label>
                  </div>

                  <div class="input-field col s12 m8">
                    <input disabled id="sq2" value="<?php echo $ques[2]; ?>" type="text" class="validate" required="true">
                    <label for="sq2">Question 2</label>
                  </div>

                  <div class="input-field col s12 m4">
                    <input id="ans2"  type="text" class="validate" required="true">
                    <label for="ans2">Answer 2</label>
                  </div>

              </div>

              <div class="row">
                <div class="col s12 m4 right">
                  <a class=" right waves-effect waves-light btn <?php echo $color; ?> z-depth-3" id="btn1">SUBMIT</a>
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
