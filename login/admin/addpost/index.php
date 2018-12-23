<?php
    session_start();
    if(!isset($_SESSION['USER_ID']) || $_SESSION['ROLE'] != 'A')
     {
        echo "ERROR IN SESSION";
        exit;
     }
     $USER_ID=$_SESSION['USER_ID'];
     include_once("../../../includes/config.php");
     include_once("../../../includes/general.php");

     function strpos_all($haystack, $needle) {
        $offset = 0;
        $allpos = array();
        while (($pos = strpos($haystack, $needle, $offset)) !== FALSE) {
            $offset   = $pos + 1;
            $allpos[] = $pos;
        }
        return $allpos;
    }

    function substr_rep($str, $substr, $pos, $len) {
      $first_part = "";
      $second_part = "";
      for($i=0; $i<$pos; $i++) {
        $first_part .= $str[$i];
      }
      for($i=$pos+$len-1; $i<strlen($str); $i++) {
        $second_part .= $str[$i];
      }

      echo $first_part."<br>".$second_part."<br>";

      return $first_part.$substr.$second_part;
    }

    if(isset($_POST['submit'])) {

     if(empty($_POST['content']) || empty($_POST['pname']) || empty($_POST['plink'])) {
       echo "<script>alert('Complete the form!');</script>";
     } else {
       $pname = $_POST['pname'];
       $plink = $_POST['plink'];
       $content = $_POST['content'];

       $image_pos = substr_count($content, "{{i}}");
       $eqn_pos = substr_count($content, "{{e}}");

       if($image_pos > 0) {

         $file_names = [];

         for($i=0; $i<count($_FILES['images']['name']); $i++) {
           array_push($file_names, $_FILES['images']['name'][$i]);
         }

         $images_location = "../../../static/images/$USER_ID/";

         for($i=0;$i<$image_pos;$i++) {
           $pos = strpos($content, "{{i}}");
           $file_loc = $images_location.$file_names[$i];
           $content = substr_replace($content, "<br><p><img width='300' height='300' src='".$file_loc."'></p><br>", $pos, 5);
           move_uploaded_file($_FILES['images']['tmp_name'][$i], $file_loc);
         }

       }

       if($eqn_pos > 0) {
         $eqns = explode(";", $_POST['eqns']);
         $k = 0;

         for($i=0;$i<$eqn_pos; $i++) {
           $pos = strpos($content, "{{e}}");
           $content = substr_replace($content, $eqns[$k++], $pos, 5);
         }
       }

       $content_filename = $pname.".txt";

       $file = fopen("../../../static/content/$USER_ID/$content_filename", "w");
       fwrite($file, $content);
       fclose($file);

       $topic = Array("mladmin" => "Machine Learning", "iotadmin" => "Internet of Things", "bhadmin" => "Blockchain");

       $sql = "INSERT INTO paper(`topic`, `filename`, `link`) VALUES('$USER_ID', '$content_filename', '$plink')";
       if(mysqli_query($conn, $sql)) {
         echo "<script> alert('Paper put to database successfully!'); </script>";

         $sql = "SELECT USER_ID FROM user_table WHERE ROLE='S'";

         $message = "Added paper to ".$topic[$USER_ID].":".$pname;

         if($result = mysqli_query($conn,$sql)) {
           while($row = mysqli_fetch_assoc($result)) {
             $uid = $row['USER_ID'];
             $sql = "INSERT INTO notification(`uid`, `notif`) VALUES('$uid', '$message')";
             mysqli_query($conn, $sql);
           }
         }

       } else {
         echo mysqli_error($conn);
       }

     }

   }

?>
<html>
    <head>
      <title>Add new post</title>

      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../../../css/materialize.min.css"  media="screen,projection"/>
      <link href="../../../css/material-icons.css" rel="stylesheet">
      <link href="../../../css/mathquill.css" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <script type="text/javascript" src="../../../js/jquery-3.1.0.min.js"></script>
      <script type="text/javascript" src="../../../js/mathquill.js"></script>

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
            color: #303f9f ;
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
        .title
        {
            font-size: 1em;
            color: #43a047;
            margin-bottom: 0px;
        }
        .btnsize
        {
          min-width: 30%  !important;
          margin-top: 20px;
        }
        .center-fix
        {
          margin-top: 10px;
         }
         .row-fix
         {
          margin-top: 0px;
        }
        #question1
        {
            font-size: 1.4em;
            width: 100%;
            height : 10%;
            border-color: #9e9e9e;
         }
        .ebtn
        {
          margin-top: 40px;
          height: 40px;
         }
         #preview
         {
          text-align: justify;
          white-space: pre-line;
          }
        .previewoption
        {
          margin-top: 15px; margin-bottom: 25px;
          border-style: groove;
          border-radius: 5px;
         }
          .nl2br
          {
          text-align: justify;
          white-space: pre-line;
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


    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card z-depth-2">
             <div id="l1" class="login <?php echo $color; ?> center-align white-text">ADD NEW POST</div>
            <div class="card-content">

              <form method="post" enctype="multipart/form-data">

                <div class="row">

                  <div class="input-field col s8 m6">
                    <input name="pname" id="pname" placeholder="Enter paper name" type="text" class="validate" data-length="200" autofocus>
                    <label for="pname">Paper Name</label>
                  </div>

                  <div class="input-field col s8 m6">
                    <input name="plink" id="plink" placeholder="Enter paper link" type="text" class="validate" data-length="200" autofocus>
                    <label for="plink">Paper Link</label>
                  </div>

                </div>

                <div class="row">

                    <div class="input-field col s8 m6">
                      <textarea name='eqns' id="eqn" class="materialize-textarea"></textarea>
                      <label for="eqn">Add equation(s)</label>
                    </div>

                    <div class="col s8 m6 center">
                      <a target="_blank" href="../../../static/latex-ref.pdf" class="ebtn waves-effect waves-light btn <?php echo $color; ?>">LATEX GUIDE</a>
                    </div>

                </div>

                <div class="row">
                  <div class="file-field input-field col s12 m6">
                    <div class="<?php echo $color; ?> btn btn1">
                      <span>File</span>
                      <input name='images[]' id="imgs" type="file" accept="image/*" multiple>
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Upload image(s)">
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="input-field col s12 m12">
                    <textarea name='content' id="content" class="materialize-textarea"></textarea>
                    <label for="content">Content (html tags allowed)</label>
                  </div>
                </div>

                <div class="row center">
                  <div class="col s12 m12">
                    <br>
                    <button name='submit' class=" btnsize waves-effect waves-light btn <?php echo $color; ?>" id="add">ADD POST</button>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../../../js/materialize.min.js"></script>
      <script type="text/javascript" src="index.js"></script>

</body>
  </html>
