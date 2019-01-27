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
      <title>Implementation</title>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../../../css/materialize.min.css"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="../../css/material-icons.css" rel="stylesheet">

      <script type="text/javascript" src="../../../js/jquery-3.1.0.min.js"></script>
      <script type="text/javascript" src="../../../js/materialize.min.js"></script>


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

        <!-- <script src="ckeditor5-build-classic/ckeditor.js"></script> -->
        <!-- <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script> -->
        <script src="ckeditor/ckeditor.js"></script>
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




    <script type='text/javascript'>
        M.AutoInit();

    </script>
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card z-depth-2">
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">IMPLEMENTATION</div>
            <div class="card-content">
                <div class="row mindset" style="margin-left: 2%;">
                  <?php

                    $sql = "SELECT * FROM `write` WHERE `topic` = 'implementation'";
                    $counter = 1;
                    $data = "";
                    if($result = mysqli_query($conn, $sql)) {
                      while($row = mysqli_fetch_assoc($result)) {
                        echo "<p><strong>".$counter.")&nbsp;".$row['question']."</strong></p>";
                        echo "<br>";
                        $name = "editor".$counter;
                        $counter++;
                        echo "
                        <textarea class='ckeditor' name=$name id=$name rows='10' cols'80'>
                        </textarea>
                        <script>
                            CKEDITOR.replace( $name,{
                             } );

                        </script>

                        ";
                        echo "<br>";

                      }
                    }

                  ?>

                  <div class="col s4 m2">
                    <form method="post">
                      <a class="btnsize waves-effect waves-light btn <?php echo $color?>" onclick="myFunction()" id="submit">Save</a>
                    </form>


                  </div>
                  <script>
                  function myFunction(){
                    var data = "";
                    for(var i =1;i<20;i++){
                      var name = "editor"+i;
                      data = data + CKEDITOR.instances[name].getData();
                    }
                    var file = new File("txtFile.txt");
                    file.open(w);
                    file.write(data);
                    file.close();
                    alert(data);

                  }
                  </script>

                </div>

            </div>
            </div>
          </div>
        </div>
      </div>

    </body>
  </html>
