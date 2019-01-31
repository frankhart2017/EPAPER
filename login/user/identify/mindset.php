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
      <title>Mindset</title>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../../../css/materialize.min.css"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="../../css/material-icons.css" rel="stylesheet">

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
        <li><a href="#">Home</a></li>
        <li><a href="identify">Identify Interest</a></li>
        <li><a href="../write">Write Paper</a></li>
        <li><a href="profile/">Profile</a></li>
    </ul>


    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card z-depth-2">
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">IDENTIFYING MINDSET</div>
            <div class="card-content">
                <div class="row mindset" style="margin-left: 2%;">
                  <?php

                    $sql = "SELECT * FROM mindset";

                    if($result = mysqli_query($conn, $sql)) {
                      while($row = mysqli_fetch_assoc($result)) {
                        echo "<p><strong>".$row['id'].")&nbsp;".$row['question']."</strong></p>";
                        echo "<br>";
                        if($row['type'] == 0) {
                          echo "
                          <p>
                            <label>
                              <input name='q".$row['id']."' type='radio' value='0'/>
                              <span>Strongly Agree</span>
                            </label>
                            &nbsp;&nbsp;
                            <label>
                              <input name='q".$row['id']."' type='radio' value='1'/>
                              <span>Agree</span>
                            </label>
                            &nbsp;&nbsp;
                            <label>
                              <input name='q".$row['id']."' type='radio' value='2'/>
                              <span>Disagree</span>
                            </label>
                            &nbsp;&nbsp;
                            <label>
                              <input name='q".$row['id']."' type='radio' value='3'/>
                              <span>Strongly Disagree</span>
                            </label>
                          </p>
                          <br>
                          ";
                        } else {
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

            var count = 0;
            var score = 0;

            var fixedMindset = "<p>Your mindset type is: <strong>Strong Fixed Mindset</strong></p> <br> <p style='text-align: justify; margin-left: 2%; margin-right: 2%;'>Fixed mindset upholds the idea that people’s ability is fairly fixed and not open to change. According to such a view, people are either intelligent, sporty, arty, good at maths, etc, or they are not. This mindset also labels people according to personal characteristics. So people are good or bad, caring or selfish and so on.</p>";
            var fixedMindset1 = "<p>Your mindset type is: <strong> Fixed Mindset with some Growth Ideas</strong></p> <br> <p style='text-align: justify; margin-left: 2%; margin-right: 2%;'>This mindset is based on the ‘entity theory’ that it treats human capabilities and characteristics as if they were ‘carved in stone’ and individuals as if they are ‘finished products’. In other words, it views human abilities and behaviours as innate, unchangeable things, like inanimate objects such as tables and chairs.</p>";
            var growthMindset = "<p>Your mindset type is: <strong> Growth Mindset with some Fixed Ideas</strong></p> <br> <p style='text-align: justify; margin-left: 2%; margin-right: 2%;'>The growth mindset has a different starting point. It sees people as essentially malleable. In other words, they are not fixed but have huge potential for growth and development. This mindset accepts that a small minority of people are born with unusual levels of talent or ability (the geniuses). At the other end of the spectrum are people who have such severe learning difficulties that they have some barriers to learning though they still have huge potential to develop skills. So this view asserts that around 95 per cent of the population fall between these two extremes and that with enough motivation, effort and concentration they can become better at almost anything.</p>";
            var growthMindset1 = "<p>Your mindset type is: <strong> Strong Growth Mindset</strong></p> <br> <p style='text-align: justify; margin-left: 2%; margin-right: 2%;'>This mindset works on the ‘incremental theory’ and suggests that that people are capable of making incremental changes in ability and other personal characteristics.</p>";


            for(var i=1; i<=20; i++) {
              if($("input[name=q" + i + "]").is(":checked")) {
                count += 1;
                score += parseInt($("input[name=q" + i + "]:checked").val());
              }
            }

            if(count != 20) {
              M.toast({html: "Mark answer for all questions!", classes: "red"});
            } else {
              if(score <= 0 && score >= 20) {
                $(".mindset").html(fixedMindset);
              } else if(score >= 21 && score <= 33) {
                $(".mindset").html(fixedMindset1);
              } else if(score >= 34 && score <= 44) {
                $(".mindset").html(growthMindset);
              } else if(score >= 45 && score <= 60) {
                $(".mindset").html(growthMindset1);
              }
            }
          });

      </script>

    </body>
  </html>
