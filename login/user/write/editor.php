<?php
    session_start();
    $_SESSION['timeout'] = time();

    include_once("../../../includes/config.php");
    include_once("../../../includes/general.php");

    $tid = $_SESSION['tid'];

    $sql = "SELECT admin FROM topics WHERE id = $tid";
    $admin = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $admin = $admin['admin'];

    $sql = "SELECT * FROM paper WHERE topic = '$admin' ORDER BY putdate DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    $null = 0;

    $paper_name = "NO PAPERS FOUND";

    if(mysqli_num_rows($result) == 0) {
      $null = 1;
    } else {
      $row = mysqli_fetch_assoc($result);

      $_SESSION['pid'] = $row['id'];

      $date = strtotime($row['putdate']);
      $curDate = time();

      $diff = $curDate - $date;
      $diff = abs(round($diff/(60*60*24)));

      if($diff > 7) {
        $null = 1;
      } else {
        $filename = explode(".", $row['filename']);
        $paper_name = $filename[0];

        $question = $row['question'];

        $inputs = explode(";", $row['inputs']);
        $outputs = explode(";", $row['outputs']);

      }
    }

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Writing</title>
    <link rel="stylesheet" href="http://codemirror.net/lib/codemirror.css">
    <script src="http://codemirror.net/lib/codemirror.js"></script>
    <script src="http://codemirror.net/addon/edit/matchbrackets.js"></script>
    <script src="http://codemirror.net/addon/edit/continuecomment.js"></script>
    <script src="http://codemirror.net/mode/python/python.js"></script>

    <link rel="stylesheet" href="http://codemirror.net/theme/darcula.css">

    <link type="text/css" rel="stylesheet" href="../../../css/materialize.min.css"  media="screen,projection"/>
    <link href="../../../css/material-icons.css" rel="stylesheet">

    <style type="text/css">

      .CodeMirror {
        width: 50%;
        height: 500px;
        margin: 0 auto;
        margin-top: 20px;
        float: left;
        margin-left: 10px;
      }

      .question-div {
        width: 24%;
        float: left;
        margin-top: 20px;
      }

      .question-fill {
        padding: 10px;
        text-align: justify;
      }

      .test-case-fill {
        padding: 10px;
        text-align: left;
      }

      .question-and-tc {
        border: 1px solid grey;
      }

      .run {
        clear: left;
        float: right;
        margin-right: 10%;
      }

      .evaluate {
        float: right;
        margin-right: -13%;
      }

      .run-div {
        float: right;
        width: 24%;
        margin-top: 20px;
      }

      .custom-input {
        border-left: 0;
        border-right: 0;
        border-top: 0;
        margin-top: 10px;
        height: auto;
        overflow-y: hidden;
      }

      .copy-test-case {
        border: none;
        background: #f50057;
        color: white;
      }

      .copy-test-case:focus {
        background: #f50057;
      }

      .output-div {
        width: 24%;
        float:right;
        margin-top: 10px;
      }

      .output {
        border: 1px solid grey;
        height: 350px;
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
           <li><a href="../topic/?q=<?php echo $_SESSION['tid']; ?>">Back</a></li>
           <li><a class="dropdown-trigger" data-target="dropdown1">More Options</a></li>
           <li class="active"><a href="../../../index.php">Logout</a></li>
         </ul>

       </div>
     </nav>

       <!-- Dropdown Structure -->
       <ul id="dropdown1" class="dropdown-content">
           <li><a href="../">Home</a></li>
           <li><a href="../identify/">Identify Interest</a></li>
           <li><a href="../profile/">Profile</a></li>
       </ul>


        </nav>




   </div>

   <div class="container">
     <div class="row">
       <div class="col s12">
         <div class="card z-depth-2">
            <div id="l1" class="login center-align <?php echo $color; ?> white-text"><?php ; ?> ABSTRACT </div>
           <div class="card-content">



                     <?php

                       $sql = 'SELECT * FROM topics ORDER BY topic';

                       if($db = mysqli_query($conn,$sql)) {
                         while($row = mysqli_fetch_assoc($db)) {
                           echo '
                           <a id="1" class="col s8 m4" href="topic/?q='.$row['id'].'">
                             <div class="card hoverable c1">
                               <div class="center-align card-content '.$color.' white-text">
                                 <span class="card-title">'.$row['topic'].'</span>
                               </div>
                             </div>
                           </a>';
                         }
                       }

                     ?>
                   </div>

      <script text="type/javascript">
      window.onload = function () {
          var editableCodeMirror = CodeMirror.fromTextArea(document.getElementById('codesnippet_editable'), {
              mode: "python",
              theme: "darcula",
              lineNumbers: true
          });
        }
      </script>

    </div>

		<!-- javascript -->
		<script type="text/javascript" src="../../../js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="../../../plugin/codemirror/lib/codemirror.js"></script>
    <script type="text/javascript" src="../../../js/materialize.min.js"></script>
    <script type="text/javascript" src="index.js"></script>
	</body>
</html>
