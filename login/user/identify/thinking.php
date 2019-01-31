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
      <title>Thinking</title>
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
        <li><a href="#">Home</a></li>
        <li><a href="identify">Identify Interest</a></li>
        <li><a href="../write">Write Paper</a></li>
        <li><a href="profile/">Profile</a></li>
    </ul>


    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card z-depth-2">
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">IDENTIFY THINKING STYLE</div>
            <div class="card-content">
                <div class="row thinking" style="margin-left: 2%;">
                  <?php

                    $sql = "SELECT * FROM thinking";

                    if($result = mysqli_query($conn, $sql)) {
                      while($row = mysqli_fetch_assoc($result)) {
                        $split_a = explode("?", $row['a']);
                        $split_b = explode("?", $row['b']);
                        $split_c = explode("?", $row['c']);
                        $split_d = explode("?", $row['d']);

                        $map = Array("CS" => 0, "AS" => 1, "AR" => 2, "CR" => 3);

                        echo "
                        <p>
                          <label>
                            <input class=q".$row['id']." name='q".$row['id']."' type='checkbox' value='".$map[$split_a[1]]."'/>
                            <span>".$split_a[0]."</span>
                          </label>
                          &nbsp;&nbsp;
                          <label>
                            <input class=q".$row['id']." name='q".$row['id']."' type='checkbox' value='".$map[$split_b[1]]."'/>
                            <span>".$split_b[0]."</span>
                          </label>
                          &nbsp;&nbsp;
                          <label>
                            <input class=q".$row['id']." name='q".$row['id']."' type='checkbox' value='".$map[$split_c[1]]."'/>
                            <span>".$split_c[0]."</span>
                          </label>
                          &nbsp;&nbsp;
                          <label>
                            <input class=q".$row['id']." name='q".$row['id']."' type='checkbox' value='".$map[$split_d[1]]."'/>
                            <span>".$split_d[0]."</span>
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

          $(".q1").on("change", function(evt) {
            console.log("check");
            if($("input[name=q1]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q2").on("change", function(evt) {
            console.log("check");
            if($("input[name=q2]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q3").on("change", function(evt) {
            console.log("check");
            if($("input[name=q3]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q4").on("change", function(evt) {
            console.log("check");
            if($("input[name=q4]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q5").on("change", function(evt) {
            console.log("check");
            if($("input[name=q5]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q6").on("change", function(evt) {
            console.log("check");
            if($("input[name=q6]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q7").on("change", function(evt) {
            console.log("check");
            if($("input[name=q7]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q8").on("change", function(evt) {
            console.log("check");
            if($("input[name=q8]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q9").on("change", function(evt) {
            console.log("check");
            if($("input[name=q9]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q10").on("change", function(evt) {
            console.log("check");
            if($("input[name=q10]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q11").on("change", function(evt) {
            console.log("check");
            if($("input[name=q11]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q12").on("change", function(evt) {
            console.log("check");
            if($("input[name=q12]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q13").on("change", function(evt) {
            console.log("check");
            if($("input[name=q13]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q14").on("change", function(evt) {
            console.log("check");
            if($("input[name=q14]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $(".q15").on("change", function(evt) {
            console.log("check");
            if($("input[name=q15]:checked").length >= 3) {
              this.checked = false;
              M.toast({html: "Cannot select more than two", classes: "red"});
            }
          });

          $("#submit").click(function() {
            var values = [0, 0, 0, 0];

            for(var i=1; i<=15; i++) {
              var val = $("input[name=q" + i + "]:checked").map(function(_, el) {
                return $(el).val();
              }).get();
              values[val[0]] += 1;
              values[val[1]] += 1;
            }

            var max = values[0], maxIdx = 0;

            for(i=1; i<4; i++) {
              if(values[i] > max) {
                max = values[i];
                maxIdx = i;
              }
            }

            val_to_str = ["Concrete Sequential", "Abstract Sequential", "Abstract Random", "Concrete Random"];

            var result = "";

            if(val_to_str[maxIdx] == "Concrete Sequential") {
              result = "<p><strong><u>Concrete Sequential</u></strong> thinkers are based on reality; They process information in an order, sequential and linear way. To them, 'reality' consists of what they can detect through their physical sense of sight, touch, sound, taste and smell. They notice and recall details easily and remember facts, specific information, formulas and rules with ease. 'Hands on' is a good way of learning for these people.</p><p>If you're CS, build on your strengths with more details. Breakdown your learning material into specific steps. Set up quiet learning environments.</p>";
            } else if(val_to_str[maxIdx] == "Abstract Random") {
              result = "<p><strong><u>Abstract Random</strong></u> thinkers organise information through reflection and thrive in unstructured, peopleoriented environments. The 'real' world for abstract random learners is the world of feelings and emotions. The AR's mind absorbs ideas, information and impressions and organises them through reflection. They remember best if information is personalised. They feel constricted when they're subjected to a very structured environment.</p><p>If you're an AR, use your natural ability to work with others. Recognise how strongly emotions influence your concentration. Build on your strength of learning by association. Look at the big picture first. Be careful to allow enough time to finish the learning job. Remind yourself to do things through plenty of visual clues, such as coloured stickers pasted up where you'll see them.</p>";
            } else if(val_to_str[maxIdx] == "Concrete Random") {
              result = "<p><strong><u>Concrete Random</strong></u> thinkers are experimenters; they're based on reality, but are willing to take more of a trialanderror approach. Because of this, they often make the intuitive leaps necessary for true creative thought. They have a strong need to find alternatives and do things in their own way.</p><p>If you're a CR, use your divergent thinking ability. Believe that it's good to see things from more than one viewpoint. Put yourself in a position to solve problems. But give yourself deadlines. Accept your need for change. Try and work with people who value divergent thinking.</p>";
            } else {
              result = "<p><strong><u>Abstract Sequential</strong></u> thinkers love the world of theory and abstract thought. They like to think in concepts and analyse information. They make great philosophers and research scientists. 'It's easy for them to zoom in on what's important, such as key points and significant details. Their thinking processes are logical, rational and intellectual. A favourite activity for abstract sequentials is reading, and when learning needs to be researched they are very thorough at it. Generally they prefer to work alone rather than in groups. If you're an AS, give yourself exercises in logic. Feed your intellect. Steer yourself toward highly structured situations.</p>";
            }

            result = "You thinking style is: <strong>" + val_to_str[maxIdx] + "</strong></p><br>" + result;

            $(".thinking").html("<div style='text-align: justify; text-justify: inter-word; margin-left: 2%; margin-right: 2%;'>" + result + "</div>");

          });

      </script>

    </body>
  </html>
