<?php
    session_start();
    $_SESSION['timeout'] = time();

    if(isset($_SESSION['ROLE'])) 
    {
        unset($_SESSION['ROLE']);
    }

    include_once("../includes/config.php");
    include_once("../includes/general.php");
?>
<html>
    <head>
      <!--Import materialize.css-->
      <link rel="icon" href="favicon.ico">
      <title><?php echo $nav_short; ?></title>      
      <link href="../css/material-icons.css" rel="stylesheet">
      <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>


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
            padding: 18px;
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
            min-width: 100%  !important;
        }
        .btn
        {
         margin-bottom: 25px !important;
        }
          .msg
         {
            text-align: justify;
         }
         .btn-toolbar
         {
          color: red;
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
      </ul>  

      <ul class="sidenav" id="mobile-demo">
       <li><a href="../index.php">Login</a></li>
      </ul> 

    </div>
  </nav>

    <!-- Dropdown Structure -->
      <ul id="dropdown1" class="dropdown-content">
       <li><a href="../index.php">Login</a></li>
      </ul>

  
        <div class="container">
            <div class="card">
                <p id="top-bar" class="login flow-text indigo darken-1 white-text">TOP 100 USERS</p>
                <div class="card-content"> 
                  
                <div class="row"><br>
                  <div class="input-field col s12 m4">
                    <select id="cid">
                      <option selected disabled value="">Choose Category</option>
                      <?php
                        $sql = "SELECT DISTINCT CAT_ID, CAT_NAME from category_table ORDER BY CAT_NAME";
                          $db = mysqli_query($conn,$sql);
                          if(!$db)
                             die("Failed to Select: ".mysqli_error($conn));
                          $row = null;
                          if(mysqli_num_rows($db) > 0 )
                          {
                          while ($row = mysqli_fetch_assoc($db))
                            {
                            echo "<option value=".$row['CAT_ID'].">".$row['CAT_NAME']."</option>";
                            }
                          }
                      ?> 
                    </select>
                    <label for="cid">Choose Category</label>
                  </div>

                <div id="TopicList">
                  <div class="input-field col s12 m4">
                    <select>
                      <option value="" disabled selected>Choose your option</option>
                    </select>
                    <label>Choose Topic</label>
                  </div>                  
                </div>

                        <div class="col s12 m4">
                            <div class="input-field col s12">
                                <select id="levelSelection">
                                <option value="1">Level 1</option>;
                                <option value="2">Level 2</option>;
                                <option value="3">Level 3</option>; 
                                </select>
                                <label>Select Level</label>
                            </div>
                        </div>

              </div>

                  <div class="row">
                    <div class="col s12 m8">
                      <label id="mslabel" for="scorerange">Select Score Range</label>
                        <p class="range-field htitle ">
                          <input type="range" id="scorerange" min="0" max="100" />
                        </p>
                    </div>

                    <div class="col s12 m4">
                      <a class=" btnsize waves-effect waves-light btn <?php echo $color; ?>" id="submit">SUBMIT</a>
                    </div>
                  </div>

                        <br>
                        <div id="tableDiv">

                        </div>

                </div>
            </div>
        </div>


      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery-3.1.0.min.js"></script>
      <script type="text/javascript" src="../js/FileSaver1-3-6.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../js/TableExport3-3.js"></script>


      <script type="text/javascript" src="index.js"></script>
    </body>
  </html>
        