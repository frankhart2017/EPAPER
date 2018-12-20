<?php
    session_start();
    include_once("../includes/config.php");
    include_once("../includes/general.php");


// id 0 then, cannot register
// if 1 the, can register
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
            min-width: 30%  !important;
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
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">USER REGISTRATION</div>
            <div class="card-content">

              <div class="row">

                <div class="input-field col s12 m6">
                  <input id="user_id" placeholder="Type Here" type="text" class="validate" required="true">
                  <label for="user_id">User ID</label>
                </div>

             </div>

           <div class="row">

              <div class="input-field col s12 m6">
                 <input id="password" type="password" class="validate" required="true" data-length="8">
                  <label for="password">Password</label>
              </div>

               <div class="input-field col s12 m6">
                  <input id="repassword" type="password" class="validate" required="true" data-length="8">
                  <label for="repassword">Repeat Password</label>
               </div>

                <div class="input-field col s12 m6">
                  <input id="fname" type="text" class="validate" required="true" data-length="20">
                  <label for="fname">First Name</label>
                </div>

                <div class="input-field col s12 m6">
                  <input id="lname" type="text" class="validate" required="true" data-length="20">
                  <label for="lname">Last Name</label>
                </div>

                <div class="input-field col s12 m6">
                  <select id="dept" required="true">
                    <?php
                      $sql = "SELECT * FROM `dept_table` ORDER BY `DEPT_ID`";
                      $db = mysqli_query($conn,$sql);
                      if(!$db)
                        die("Failed to Select: ".mysqli_error($conn));
                      $row = null;
                      if(mysqli_num_rows($db) > 0 )
                      {
                        while ($row = mysqli_fetch_assoc($db))
                        {
                          echo "<option value=".$row['DEPT_ID'].">".$row['DEPT_NAME']."</option>";
                        }
                      }
                    ?>
                  </select>
                  <label for="dept">Department</label>
                </div>

                <div class="input-field col s12 m6">
                  <input id="mobile" type="text" class="validate" required="true" data-length="10">
                  <label for="mobile">Phone Number</label>
                </div>

                <div class="input-field col s12 m12">
                  <input id="email" type="email" class="validate" data-length="50">
                  <label for="email" data-error="Invalid Email ID" data-success="Perfect">Email</label>
                </div>

                <div class="col s12 m12">
                  <h5>Security Questions</h5><br>

                    <?php
                      $ques = Array();
                      $sql = "SELECT * FROM `security_questions_table` ORDER BY rand() Limit 2";
                      $db = mysqli_query($conn,$sql);
                      if(!$db)
                        die("Failed to Select: ".mysqli_error($conn));
                      $row = null;
                      if(mysqli_num_rows($db) > 0 )
                      {
                        while ($row = mysqli_fetch_assoc($db))
                        {
                          array_push($ques, $row['QUESTION']);
                        }
                      }


                    ?>
                  </div>

                  <div class="input-field col s12 m8">
                    <input disabled id="sq1" value="<?php echo $ques[0]; ?>" type="text" class="validate" required="true">
                    <label for="sq1">Question 1</label>
                  </div>

                  <div class="input-field col s12 m4">
                    <input id="ans1"  type="text" class="validate" required="true">
                    <label for="ans1">Answer 1</label>
                  </div>

                  <div class="input-field col s12 m8">
                    <input disabled id="sq2" value="<?php echo $ques[1]; ?>" type="text" class="validate" required="true">
                    <label for="sq2">Question 2</label>
                  </div>

                  <div class="input-field col s12 m4">
                    <input id="ans2"  type="text" class="validate" required="true">
                    <label for="ans2">Answer 2</label>
                  </div>

            </div>

             <div class="row">
              <div class="col s12 m12 center">
                <a class=" btnsize waves-effect waves-light btn-large <?php echo $color; ?> z-depth-3" id="register">REGISTER</a>
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
