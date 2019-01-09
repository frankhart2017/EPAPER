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
      <title>Work</title>
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
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">IDENTIFY WORK INTEREST</div>
            <div class="card-content">
                <div class="row work" style="margin-left: 2%;">
                  <?php

                    $sql = "SELECT * FROM work";

                    if($result = mysqli_query($conn, $sql)) {
                      while($row = mysqli_fetch_assoc($result)) {
                        echo "<p><strong>".$row['id'].")&nbsp;".$row['question']."</strong></p>";
                        echo "<br>";
                        echo "
                        <p>
                          <label>
                            <input name='q".$row['id']."' type='radio' value='1'/>
                            <span>Not at all</span>
                          </label>
                          &nbsp;&nbsp;
                          <label>
                            <input name='q".$row['id']."' type='radio' value='2'/>
                            <span>To a slight degree</span>
                          </label>
                          &nbsp;&nbsp;
                          <label>
                            <input name='q".$row['id']."' type='radio' value='3'/>
                            <span>To a moderate degree</span>
                          </label>
                          &nbsp;&nbsp;
                          <label>
                            <input name='q".$row['id']."' type='radio' value='4'/>
                            <span>To a high degree</span>
                          </label>
                          &nbsp;&nbsp;
                          <label>
                            <input name='q".$row['id']."' type='radio' value='5'/>
                            <span>To a very high degree</span>
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

              var first_arr = [5, 14, 17, 21, 28, 35];
              var checked = 0, first_sum = 0, second_sum = 0, third_sum = 0, fourth_sum = 0, fifth_sum = 0, sixth_sum = 0;

              for(var i=0; i<first_arr.length; i++) {
                if($("input[name=q" + first_arr[i] + "]").is(":checked")) {
                  first_sum += parseInt($("input[name=q" + first_arr[i] + "]:checked").val());
                  checked += 1;
                }
              }

              var second_arr = [6, 10, 12, 23, 31, 34];

              for(var i=0; i<second_arr.length; i++) {
                if($("input[name=q" + second_arr[i] + "]").is(":checked")) {
                  second_sum += parseInt($("input[name=q" + second_arr[i] + "]:checked").val());
                  checked += 1;
                }
              }

              var third_arr = [2, 7, 18, 22, 26, 33];

              for(var i=0; i<third_arr.length; i++) {
                if($("input[name=q" + third_arr[i] + "]").is(":checked")) {
                  third_sum += parseInt($("input[name=q" + third_arr[i] + "]:checked").val());
                  checked += 1;
                }
              }

              var fourth_arr = [3, 16, 20, 25, 27, 30];

              for(var i=0; i<fourth_arr.length; i++) {
                if($("input[name=q" + fourth_arr[i] + "]").is(":checked")) {
                  fourth_sum += parseInt($("input[name=q" + fourth_arr[i] + "]:checked").val());
                  checked += 1;
                }
              }

              var fifth_arr = [1, 8, 13, 15, 24, 29];

              for(var i=0; i<fifth_arr.length; i++) {
                if($("input[name=q" + fifth_arr[i] + "]").is(":checked")) {
                  fifth_sum += parseInt($("input[name=q" + fifth_arr[i] + "]:checked").val());
                  checked += 1;
                }
              }

              var sixth_arr = [4, 9, 11, 19, 32, 36];

              for(var i=0; i<sixth_arr.length; i++) {
                if($("input[name=q" + sixth_arr[i] + "]").is(":checked")) {
                  sixth_sum += parseInt($("input[name=q" + sixth_arr[i] + "]:checked").val());
                  checked += 1;
                }
              }

              var a_array = [];

              if(checked != 36) {
                M.toast({html: "Answer all the questions!", classes: "red"});
              } else {

                $.ajax({
                  type: 'POST',
                  url: 'fetch_leisure_score.php',
                  dataType: 'json',
                  success: function(codedata)
                  {
                      if(codedata['error'] == 1)
                      {
                        //Error Occured
                        M.toast({html: codedata['errorMsg']});
                      }
                      else if(codedata['error'] == 0)
                      {
                        a_array = codedata['data'];
                      }
                      else
                      {
                        window.alert("Something is Wrong... Contact Admin");
                      }
                  },
                  async: false
                });

              }

              averages = [(first_sum+parseInt(a_array[0]))/2, (second_sum+parseInt(a_array[1]))/2, (third_sum+parseInt(a_array[2]))/2, (fourth_sum+parseInt(a_array[3]))/2, (fifth_sum+parseInt(a_array[4]))/2, (sixth_sum+parseInt(a_array[5]))/2];

              var max = averages[0], maxIdx = 0;

              for(var i=1; i<averages.length; i++) {
                if(averages[i] > max) {
                  max = averages[i];
                  maxIdx = i;
                }
              }

              var conventional = "<p><strong><u>Conventional</strong></u> orientation people generally like to be involved in activities that follow set procedures and routines. They like to work with data and details, have clerical or numerical ability, and carry out tasks in great detail. They are often described as being conforming, practical, careful, obedient, thrifty, efficient, orderly, conscientious, and persistent. They often prefer orderly, systematic work. Their work tasks often include keeping records, and organizing written and numerical materials according to a plan. They like to see things run efficiently and smoothly, which means they will pay attention to administrative details. They generally enjoy keeping accurate records, organizing, working with numbers, and using a computer.</p>";
              var realistic = "<p><strong><u>Realistic</strong></u> orientation people generally prefer hands-on activities, and tend to focus on things in the physical world. They typically enjoy working with tools or machines, and often gravitate towards careers that can be performed outdoors. They are often described as being frank, genuine, humble, practical, natural, and persistent. People in the realistic category often prefer to work with objects and things. They are likely to enjoy creating things with their hands and using tools and machines. Some prefer large, powerful machines like tractors, while others prefer precision machinery such as X-ray or electronic equipment. People in this category generally enjoy being physically active, repairing equipment, rebuilding cars, fixing electrical things, solving mechanical problems, playing sports, working outdoors etc.</p>";
              var investigative = "<p><strong><u>Investigative</strong></u> orientation people like to be involved in activities that have to do with ideas and thinking; these are people who like to observe, learn, investigate, analyze, evaluate, or solve problems. They like to search for facts and figure out problems mentally. They prefer working with ideas rather than with people or things. They are often described as being analytical, curious, methodical, rational, cautious, independent, precise, reserved, complex, intellectual, and modest. People in the investigative category often have a strong desire to understand cause and effect, and solve puzzles and problems. They often work in jobs that are scientific in nature. Their work often involves the analysis of data, using formulas, graphs and numbers. Investigative types typically prefer to work independently, and with minimum supervision. People in this category generally enjoy using computers, solving math problems, interpreting formulas, and thinking abstractly.</p>";
              var leading = "<p><strong><u>Leading</strong></u> orientation people like to influence others. They tend to enjoy persuading others to see their point of view. They often like to work with people and ideas, rather than things. They are often described as being adventurous, energetic, optimistic, agreeable, extroverted, popular, sociable, self-confident, and ambitious. People in the enterprising category often prefer activities selling and promoting. They enjoy influencing others and being in a leadership position. They often use their skills to influence others. They often like competitive activities and are often self-confident, talkative and energetic. They generally enjoy discussing politics, selling and promoting, having power and status, giving talks and speeches, and leading groups.</p>";
              var artistic = "<p><strong><u>Artistic</strong></u> orientation people tend to be creative and intuitive, and enjoy activities like writing, painting, sculpturing, playing a musical instrument, performing, etc. They enjoy working in an unstructured environment where they can use their imagination and creativity. They are most often described as being: open, imaginative, original, intuitive, emotional, independent, idealistic, and unconventional. People in the artistic category prefer to be expressive. They like the opportunity to create new things and be innovative. They typically do not like structure or conformity. They prefer to use their imagination and be creative. People in this category generally enjoy activities such as: writing, poetry, photography, designing, singing, acting, dancing, painting, attending theaters and exhibits, and reading.</p>";
              var social = "<p><strong><u>Social</strong></u> orientation people enjoy helping and advising people. They tend to be concerned about other peoples welfare. They promote learning and personal development and are very interested in human relationships. They are often described as being helpful, responsible, warm, cooperative, idealistic, sociable, tactful, friendly, kind, sympathetic, generous, patient, and understanding. People in the social category prefer to work with others. They tend to be highly verbal, express themselves well, and get along well in groups. Social types typically prefer the team approach to problem solving. People in the social category often describe themselves as cooperative, friendly, and understanding. They generally enjoy teaching, caring for others, volunteering, mediating disputes, meeting new people, and working in groups.</p>";

              var content = [conventional, realistic, investigative, leading, artistic, social];
              var topics = ["Conventional", "Realistic", "Investigative", "Leadning", "Artistic", "Social"];

              var result = "<div style='text-align: justify; text-justify: inter-word; margin-left: 2%; margin-right: 2%'>";
              result = result + "<p>You are a: <strong>" + topics[maxIdx] + "</strong> person.</p><br>";
              result = result + content[maxIdx];

              $(".work").html(result);

          });

      </script>

    </body>
  </html>
