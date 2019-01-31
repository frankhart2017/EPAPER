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
      <title>Leisure</title>
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
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">IDENTIFY LEISURE INTEREST</div>
            <div class="card-content">
                <div class="row learning" style="margin-left: 2%;">
                  <?php

                    $sql = "SELECT * FROM leisure";

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

              var first_arr = [2, 8, 10, 17, 21, 30];
              var checked = 0, first_sum = 0, second_sum = 0, third_sum = 0, fourth_sum = 0, fifth_sum = 0, sixth_sum = 0;

              for(var i=0; i<first_arr.length; i++) {
                if($("input[name=q" + first_arr[i] + "]").is(":checked")) {
                  first_sum += parseInt($("input[name=q" + first_arr[i] + "]:checked").val());
                  checked += 1;
                }
              }

              var second_arr = [1, 7, 15, 18, 23, 26];

              for(var i=0; i<second_arr.length; i++) {
                if($("input[name=q" + second_arr[i] + "]").is(":checked")) {
                  second_sum += parseInt($("input[name=q" + second_arr[i] + "]:checked").val());
                  checked += 1;
                }
              }

              var third_arr = [5, 13, 22, 24, 31, 33];

              for(var i=0; i<third_arr.length; i++) {
                if($("input[name=q" + third_arr[i] + "]").is(":checked")) {
                  third_sum += parseInt($("input[name=q" + third_arr[i] + "]:checked").val());
                  checked += 1;
                }
              }

              var fourth_arr = [3, 9, 28, 32, 35, 36];

              for(var i=0; i<fourth_arr.length; i++) {
                if($("input[name=q" + fourth_arr[i] + "]").is(":checked")) {
                  fourth_sum += parseInt($("input[name=q" + fourth_arr[i] + "]:checked").val());
                  checked += 1;
                }
              }

              var fifth_arr = [11, 14, 16, 20, 25, 29];

              for(var i=0; i<fifth_arr.length; i++) {
                if($("input[name=q" + fifth_arr[i] + "]").is(":checked")) {
                  fifth_sum += parseInt($("input[name=q" + fifth_arr[i] + "]:checked").val());
                  checked += 1;
                }
              }

              var sixth_arr = [4, 6, 12, 19, 27, 34];

              for(var i=0; i<sixth_arr.length; i++) {
                if($("input[name=q" + sixth_arr[i] + "]").is(":checked")) {
                  sixth_sum += parseInt($("input[name=q" + sixth_arr[i] + "]:checked").val());
                  checked += 1;
                }
              }

              if(checked != 36) {
                M.toast({html: "Answer all the questions!", classes: "red"});
              } else {

                $.ajax({
                  type: 'POST',
                  data:
                  {
                    'a1': first_sum,
                    'a2': second_sum,
                    'a3': third_sum,
                    'a4': fourth_sum,
                    'a5': fifth_sum,
                    'a6': sixth_sum,
                  },
                  url: 'add_leisure_score.php',
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
                        M.toast({html: "Continue to work interest test and find your results!"});
                      }
                      else
                      {
                        window.alert("Something is Wrong... Contact Admin");
                      }
                  }
                });
              }

          });

      </script>

    </body>
  </html>
