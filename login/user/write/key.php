<?php
    session_start();
    if(!isset($_SESSION['USER_ID']) || $_SESSION['ROLE'] != 'S')
     {
        echo "ERROR IN SESSION";
        exit;
     }
    $USER_ID = strtoupper($_SESSION['USER_ID']);
    $_SESSION['TEST_ON'] = "no";

    include_once("../../../includes/config.php");
    include_once("../../../includes/general.php");

    include("encrypt.php");

    if(isset($_POST['extract'])) {
      if($_POST["abstract"]==""){
        print_r("type");
      }
      else {
        $sql = "SELECT * FROM `user_write` WHERE `uid` = '$USER_ID'";

        $text_arr = Array("abstract" => "", "introduction" => "", "analysis" => "", "design" => "",
        "development" => "", "implement" => "", "evaluation" => "", "conclusion" => "");

        $id_to_text = Array("abstract", "introduction", "analysis", "design", "development", "implement", "evaluation", "conclusion");

        if($result = mysqli_query($conn, $sql)) {
          while($row = mysqli_fetch_assoc($result)) {

            //$text_arr[$id_to_text[$row["topic"]]] = $row["text"];



            $s = $row['topic'];
            //print_r($id_to_text[$s]);
            $s1 = $id_to_text[$s];
            $text_arr = explode("~+~", $row['text']);


            for($i=0; $i<sizeof($text_arr); $i++) {
              $text_arr[$i] = dec_enc("decrypt", $text_arr[$i], $_POST[$s1]);
              //print_r($text_arr[$i]);
            }
            $string = implode('', $text_arr);
            $a[$row['topic']] = $string;


          }
          ksort($a);

      }
  }
//   for($i = 0;$i<8;$i++){
//   print_r($a[$i]);
// }
print_r($a[1]);
  $paper = "\documentclass{article}
  \usepackage{graphicx}

  \begin{document}

  \title{Introduction to \LaTeX{}}
  \author{Author's Name}

  \maketitle

  \begin{abstract}
  `0`
  \end{abstract}

  \section{introduction}
  `1`

  \section{analysis}
  `2`

  \section{design}
  `3`

  \section{development}
  `4`

  \section{implement}
  `5`

  \section{evaluation}
  `6`

  \section{conclusion}
  `7`

  \end{document}";
  for($i=0;$i<8;$i++){
    $pos = strpos($paper, "`".(string)$i."`");
    $paper = substr_replace($paper, $a[$i], $pos,3);
  }
  $string_array = explode("<p>",$paper);
  $paper = implode("",$string_array);
  $string_array = explode("</p>",$paper);
  $paper = implode("",$string_array);

  $myfile = fopen("testfile.txt", "w");
    fwrite($myfile, $paper);
    fclose($myfile);
    if (file_exists($myfile)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($myfile).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($myfile));
        readfile($myfile);
        exit;
    }
}

?>
<html>
    <head>
      <title>Enter Keys</title>
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
        <li><a href="#">Home</a></li>
        <li><a href="identify">Identify Interest</a></li>
        <li><a href="index.php">Write Paper</a></li>
        <li><a href="profile/">Profile</a></li>
    </ul>

    <script type='text/javascript'>
        M.AutoInit();

    </script>
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card z-depth-2">
             <div id="l1" class="login center-align <?php echo $color; ?> white-text">ENTER KEYS</div>
            <div class="card-content">
                <div class="row mindset" style="margin-left: 2%;">

                  <form method="post">
                    <div class="input-field col s12 m6">
                      <input id="email" type="text" name="abstract"  class="validate">
                      <label  for="email">Abstract Key</label>
                    </div>


                    <div class="input-field col s12 m6">
                      <input id="email" type="text" name="introduction"  class="validate">
                      <label  for="email">Introduction Key</label>
                    </div>

                    <div class="input-field col s12 m6">
                      <input id="email" type="text" name="analysis"  class="validate">
                      <label  for="email">Analysis Key</label>
                    </div>

                    <div class="input-field col s12 m6">
                      <input id="email" type="text" name="design"  class="validate">
                      <label  for="email">Design Key</label>
                    </div>

                    <div class="input-field col s12 m6">
                      <input id="email" type="text" name="development"  class="validate">
                      <label  for="email">Development Key</label>
                    </div>

                    <div class="input-field col s12 m6">
                      <input id="email" type="text" name="implement"  class="validate">
                      <label  for="email">Implement Key</label>
                    </div>

                    <div class="input-field col s12 m6">
                      <input id="email" type="text" name="evaluation"  class="validate">
                      <label  for="email">Evaluation Key</label>
                    </div>

                    <div class="input-field col s12 m6">
                      <input id="email" type="text" name="conclusion"  class="validate">
                      <label  for="email">Conclusion Key</label>
                    </div>

                    <div class="row col s12 m12 center">
                      <button class="right col s12 m4 btnsize waves-effect waves-light btn <?php echo $color; ?>" name="extract" id="btn1">EXTRACT</button>
                    </div>
                  </form>

                </div>

            </div>
            </div>
          </div>
        </div>
      </div>

    </body>
  </html>
