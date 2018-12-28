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
      <title>Reflection</title>
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
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">IDENTIFY REFLECTION</div>
            <div class="card-content">
                <div class="row reflection" style="margin-left: 2%;">
                  <?php

                    $sql = "SELECT * FROM reflection";

                    if($result = mysqli_query($conn, $sql)) {
                      while($row = mysqli_fetch_assoc($result)) {

                        echo "<p><strong>".$row['id'].")&nbsp;".$row['question']."</strong></p>";
                        echo "<br>";
                        echo "
                        <p>
                          <label>
                            <input name='q".$row['id']."' type='radio' value='3'/>
                            <span>Strongly Agree</span>
                          </label>
                          &nbsp;&nbsp;
                          <label>
                            <input name='q".$row['id']."' type='radio' value='2'/>
                            <span>Agree</span>
                          </label>
                          &nbsp;&nbsp;
                          <label>
                            <input name='q".$row['id']."' type='radio' value='1'/>
                            <span>Disagree</span>
                          </label>
                          &nbsp;&nbsp;
                          <label>
                            <input name='q".$row['id']."' type='radio' value='0'/>
                            <span>Strongly Disagree</span>
                          </label>
                        </p>
                        <br>
                        ";

                        }
                    }

                  ?>

                  <div class="col s4 m2">
                      <a class="btnsize waves-effect waves-light btn <?php echo $color?>" id="submit">Submit</a>
                  </div>

                </div>

            </div>
            </div>
          </div>
        </div>
      </div>

      <script type='text/javascript'>
          M.AutoInit();

          $("#submit").click(function() {

              var checked = 0;
              var sums = [0, 0, 0, 0]

              for(var i=1; i<=13; i+=4) {
                if($("input[name=q" + i + "]").is(":checked")) {
                  sums[0] += $("input[name=q" + i + "]:checked").val();
                  checked += 1;
                }
              }

              for(var i=2; i<=14; i+=4) {
                if($("input[name=q" + i + "]").is(":checked")) {
                  sums[1] += $("input[name=q" + i + "]:checked").val();
                  checked += 1;
                }
              }

              for(var i=3; i<=15; i+=4) {
                if($("input[name=q" + i + "]").is(":checked")) {
                  sums[2] += $("input[name=q" + i + "]:checked").val();
                  checked += 1;
                }
              }

              for(var i=4; i<=16; i+=4) {
                if($("input[name=q" + i + "]").is(":checked")) {
                  sums[3] += $("input[name=q" + i + "]:checked").val();
                  checked += 1;
                }
              }

              if(checked != 16) {
                M.toast({html: "Answer all the questions!", classes: "red"});
              } else {

                var habitual_action = "<p>Habitual Action is that which has been learnt before and though frequent use becomes an activity that is performed automatically or with little conscious thought. Common examplesa are using a keyboard or riding a bicycle. The work of experienced professionals dealing with normal cases or issues can become quite habitual. When they have experienced a particular type of problem many times, their way of dealing with similar cases becomes quite routine.</p>";
                var reflection = "<p>Reflective thinking, is a part of the critical thinking process referring specifically to the processes of analyzing and making judgments about what has happened.</p><p>Reflective thinking is an active, persistent, and careful consideration of a belief or supposed form of knowledge, of the grounds that support that knowledge, and the further conclusions to which that knowledge leads.</p>";
                var understanding = "<p>Understanding means comprehending the meaning, translation, interpolation, and interpretation of instructions and problems. State a problem in one's own words. Construct meaning from instructional messages, including oral, written, and graphic communication.</p>";
                var critical_reflection = "<p>Critical reflection is a reasoning process to make meaning of an experience.  Critical reflection is descriptive, analytical, and critical, and can be articulated in a number of ways such as in written form, orally, or as a demonstration.</p>";

                var topics = ["Habitual Action", "Understanding", "Reflection", "Critical Reflection"];
                var contents = [habitual_action, understanding, reflection, critical_reflection];

                var max = sums[0], maxIdx = 0;

                for(var i=1;i<4;i++) {
                  if(sums[i] > max) {
                    max = sums[i];
                    maxIdx = i;
                  }
                }

                var result = "<div style='text-align: justify; text-justify: inter-word; margin-left: 2%; margin-right: 2%'>";
                result = result + "<p>Your reflection style is: <strong>" + topics[maxIdx] + "</strong></p><br>";
                result = result + contents[maxIdx] + "</div>";

                $(".reflection").html(result);

              }

          });

      </script>

    </body>
  </html>
