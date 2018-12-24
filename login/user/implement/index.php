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
		<title>Implement</title>
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
           <li><a href="../profile/">Profile</a></li>
       </ul>

    <div>

      <div class="question-div">
        <nav>
          <div class="<?php echo $color; ?> nav-wrapper">
            <a href="#!" class="brand-logo hide-on-small-only center" style="font-size: 120%; white-space: nowrap; overflow-x: scroll"><?php echo strtoupper($paper_name); ?></a>
          </div>
        </nav>
        <div class="question-and-tc">
          <div class="question-fill">
            <?php

              echo $question;

            ?>
          </div>
          <hr>
          <div class="test-case-fill">
            <?php

              for($i=0; $i<2; $i++) {
                echo "<h6><u>Test case ".($i+1)."</u> :-</h6>";
                echo "<p><strong>Input:</strong></p>";
                echo "<p>".$inputs[$i]."</p>";
                echo "<p><strong>Output:</strong></p>";
                echo "<p>".$outputs[$i]."</p>";
              }

            ?>
          </div>
        </div>
      </div>

      <textarea  name="codesnippet_editable" id="codesnippet_editable" autofocus>
# Your python code goes here
      </textarea>

      <div class="run-div">
        <nav>
          <div class="<?php echo $color; ?> nav-wrapper">
            <a href="#!" class="brand-logo hide-on-small-only center">Input</a>
          </div>
        </nav>
        <textarea class="custom-input materialize-textarea" id='test-input' placeholder="Enter custom input"></textarea>
        <button class='copy-test-case' id="test1">Copy test case 1</button>
        <button class='copy-test-case' id="test2">Copy test case 2</button>
      </div>

      <div class="output-div">
        <nav>
          <div class="<?php echo $color; ?> nav-wrapper">
            <a href="#!" class="brand-logo hide-on-small-only center">Output</a>
          </div>
        </nav>
        <div class='output'></div>
      </div>

      <div class="col s12 m12 run">
        <a class="col s12 m4 btnsize waves-effect waves-light <?php echo $color; ?> btn" id="login">Run</a>
      </div>

      <div class="col s12 m12 evaluate">
        <a class="col s12 m4 btnsize waves-effect waves-light <?php echo $color; ?> btn" id="login">Evaluate</a>
      </div>

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
