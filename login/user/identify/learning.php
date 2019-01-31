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
      <title>Learning</title>
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
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">IDENTIFY LEARNING STYLE</div>
            <div class="card-content">
                <div class="row learning" style="margin-left: 2%;">
                  <?php

                    $sql = "SELECT * FROM learning";

                    if($result = mysqli_query($conn, $sql)) {
                      while($row = mysqli_fetch_assoc($result)) {
                        echo "<p><strong>".$row['id'].")&nbsp;".$row['question']."</strong></p>";
                        echo "<br>";
                        echo "
                        <p>
                          <label>
                            <input name='q".$row['id']."' type='radio' value='a'/>
                            <span>".$row['a']."</span>
                          </label>
                          &nbsp;&nbsp;
                          <label>
                            <input name='q".$row['id']."' type='radio' value='b'/>
                            <span>".$row['b']."</span>
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

          function a_b_sum(first, last) {
            var values = [0, 0];
            for(var i=first; i<=last; i+=4) {
              if($("input[name=q" + i + "]").is(":checked")) {
                if($("input[name=q" + i + "]:checked").val() == "a")
                  values[0] += 1;
                else
                  values[1] += 1;
              }
            }
            return values;
          }

          function scoring(score, char1, char2, dominant) {
            if(score >= 1 && score <= 3)
              return "You are fairly well balanced between <strong>" + char1 + "</strong> and <strong>" + char2 + "</strong>";
            else if(score >= 5 && score <= 7)
              return "You have a moderate preference for <strong>" + dominant + "</strong> and will learn more easily in a teaching environment that favours " + dominant;
            else
              return "You hava a very strong preference for <strong>" + dominant + "</strong>. You may have real difficulty learning in an environment that does not support " + dominant;
          }

          $("#submit").click(function() {

            var first = a_b_sum(1, 41);
            var second = a_b_sum(2, 42);
            var third = a_b_sum(3, 43);
            var fourth = a_b_sum(4, 44);

            var first_score = first[0], second_score = first[0], third_score = first[0], fourth_score = first[0];
            var first_idx = 0, second_idx = 2, third_idx = 4, fourth_idx = 6;
            var first_char = "active", second_char = "sensing", third_char = "visual", fourth_char = "sequential";

            if(first[0] + first[1] + second[0] + second[1] + third[0] + third[1] + fourth[0] + fourth[1] != 44) {
              M.toast({html: "Answer all the questions!", classes: "red"});
            } else {
              if(first[0] < first[1]) {
                first_score = first[1];
                first_idx = 1;
                first_char = "reflective";
              }

              if(second[0] < second[1]) {
                second_score = second[1];
                second_idx = 3;
                second_char = "intuitive";
              }

              if(third[0] < third[1]) {
                third_score = third[1];
                third_idx = 5;
                third_char = "verbal";
              }

              if(fourth[0] < fourth[1]) {
                fourth_score = fourth[1];
                fourth_idx = 7;
                third_char = "global";
              }

              var result = "<div style='text-align: justify; text-justify: inter-word: margin-left: 2%; margin-right: 2%;'><p>" + scoring(first_score, "active", "reflective", first_char) + "</p><br>";
              result = result + "<p>" + scoring(second_score, "sensing", "intuitive", second_char) + "</p><br>";
              result = result + "<p>" + scoring(third_score, "visual", "verbal", third_char) + "</p><br>";
              result = result + "<p>" + scoring(fourth_score, "sequential", "global", fourth_char) + "</p><br>";

              $(".learning").html(result);

              var active = "<p><strong><u>Active learners</u></strong> understand new information by doing something with it. Active learners are keen to try out and experiment with the new information and often enjoy group work because this enables them to do active things. Sitting through lectures, with nothing to actually get involved in, can be particularly difficult for active learners.</p><p>If you have a strong preference for active learning you need to be aware of the potential dangers of jumping into things prematurely without thinking them through.</p><p>As an active learner you will learn most effectively when you are actively discussing, problem solving and finding things to do with new information.</p>";
              var reflective = "<p><strong><u>Reflective learners</u></strong> prefer to think about new information first before acting on it. They often prefer to think through problems first on their own rather than discussing it in groups. Sitting through lectures can be difficult for reflective learners who often like to have some time out to think through new information.</p><p>If you have a strong preference for reflective learning you need to aware of the potential dangers of spending too much time thinking about something rather than actually getting it done.</p><p>As a reflective learner you will learn best when you allocate time for thinking about and digesting new information. It may also be helpful to stop and periodically review new work, write summaries and think of possible questions about new information.</p>";
              var sensing = "<p><strong><u>Sensing learners</u></strong> like learning facts and solving problems by well-established methods. They are generally careful, practical and patient and like new knowledge to have some connection to the real world. If you have a strong preference for sensing learning you need to be aware of the potential dangers of relying too much on memorisation and familiar methods and not concentrate enough on understanding and innovative thinking.</p><p>As a sensing learner you will learn most effectively when you understand how abstract and theoretical work relates to the real world. You may need to seek information from texts; lecturers, tutors and friends of specific examples of how new concepts apply in practice.</p><p>Your careful and patient approach will help you with problem solving but to be most effective as a learner and problem solver, you will also have to function as an intuitive learner at times.</p>";
              var intuitive = "<p><strong><u>Intuitive learners</u></strong> prefer discovering new relationships and can be innovative in their approach to problem solving. Intuitive learners tend to work faster and dislike repetition and work, which involves a lot of memorisation and routine calculations.</p><p>If you have a strong preference for intuitive learning you need to aware of the potential dangers of missing important details or making careless mistakes in calculations or hands-on work.</p><p>As an intuitive learner you will discover that many lectures will suit your learning style by encouraging creative and innovative thinking.  When lectures and tutorials involve memorisation and repetition, you may need to be careful that you don't get bored and overlook details. In other words, to be an effective learner and problem solver, you will also have to function as a sensing learner at times.</p>";
              var visual = "<p><strong><u>Visual learners</u></strong> need to see the teacher's body language, facial expression to fully understand the content of a lesson. They prefer sitting at the front of the class to avoid visual obstructions. They think in pictures and learn best from visual displays including: diagrams, illustrated books, transparencies, videos, flipcharts.  During a lecture, visual learners prefer to take detailed notes to absorb information.</p><p>If you are a visual learner, try to find diagrams, sketches, schematics, photographs, flow charts, of course material that is normally verbal, see if any video files of the course material are available. Prepare a mind-map by listing key points. Color-code your notes with a highlighter.</p>";
              var verbal = "<p><strong><u>Verbal learners</u></strong> learn best through verbal lectures, discussions, talking things through and listening to what others have to say. They interpret the underlying meanings of speech through listening to tone of voice, pitch, speed and other nuances. Written information may have little meaning until it is heard. These learners often benefit from reading text aloud and using a mp3 player.</p><p>If you are a verbal leaner, write summary or outlines of course material in your own words. Working in groups can be particularly effective: you gain understanding of material by hearing classmates' explanations and you learn even more when you do the explaining.</p>";
              var sequential = "<p><strong><u>Sequential learners</u></strong> understand new information in linear steps where each step follows logically from the previous one.</p><p>If you have a strong preference for sequential learning you may have trouble relating the specifics of a subject to other areas of the subject or to different subjects. Many courses are taught in a sequential manner and this will suit you but when you encounter a lecturer who jumps around to different topics or skips steps you may need to compensate for this by reviewing and revising your notes in a logical order. You could also ask questions about these missing steps in lectures or tutorials. You may also strengthen your global learning skills by always trying to relate new information to things you already know and to the big picture of a course or subject.</p>";
              var Global = "<p><strong><u>Global learners</u></strong> tend to learn in large jumps by absorbing material in a random order without necessarily seeing any connections until they have grasped the whole concept.</p><p>If you have a strong preference for global learning you may find a new topic frustrating until you have the whole picture and can see where the topic fits in and relates to your existing knowledge.</p><p>Some techniques that assist global learners involve skimming chapters and notes to gain an overview and immersion in a whole subject rather than spending short study times on a range of subjects. For global learners, it helps to get the big picture more quickly so you may wish to pay particular attention to the opening remarks of a lecture or to ask questions that help you understand the relevance of the new information.</p>";

              var arr = [active, reflective, sensing, intuitive, visual, verbal, sequential, Global];

              result = result + arr[first_idx] + "<br>" + arr[second_idx] + "<br>" + arr[third_idx] + "<br>" + arr[fourth_idx] + "<br></div>";

              $(".learning").html(result);

            }

          });

      </script>

    </body>
  </html>
