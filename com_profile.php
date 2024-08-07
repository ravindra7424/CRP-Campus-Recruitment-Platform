<!DOCTYPE html>
<html lang="en" dir="ltr">
      <head>
            <meta charset="utf-8">
            <title>Company | Profile</title>
            <link rel="stylesheet" href="com_profile.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
      </head>
      <body>
            
            <nav class="topnav">
                  <div class="topnav-left">
                        <img src="images/SRKR Ready.png">
                  </div>
                  <div class="topnav-right">
                        <ul>
                        <li><a href="com_home.php">Home</a></li>
                        <li><a href="com_filter.php">Filter</a></li>
                        <li><a href="com_leaderboard.php">Leaderboard</a></li>
                        <li><a href="com_about.php">About</a></li>
                        <li><?php session_start(); error_reporting(0); echo "<a href='com_settings.php'>{$_SESSION['username']}</a>"; ?></li>
                        </ul>
                  </div>
            </nav>
            <br>
            <div class="center" style="border: 1px solid black; border-color: #086892;" >
            <div  class="Left">
                  <?php
                                    // Connect to the database
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "srkr ready";
                        
                                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                        
                                    // Check connection
                                    if (!$conn) {
                                       die("Connection failed: ");
                                    }
                                    if (isset($_GET['Reg_No'])) {
                                        $Reg_No= $_GET['Reg_No'];

                                    }
                                    $sql = "SELECT * FROM stu_profile where Reg_No='$Reg_No'";
                                    $result = mysqli_query($conn, $sql);
                                    $row1=mysqli_fetch_assoc($result);

                  ?>                  
                  <div class="Resume_pic" >
                  <?php echo "<img src='https://srkrexams.in/SRKR/photo/{$Reg_No}.JPG'>";
                  ?>                  
                  </div>
                  <div class="Res_Name">
                  <?php 
                        if (isset($row1["FullName"])) {
                        echo '<p>' . $row1["FullName"] . '</p>';
                        } else {
                    
                        }
                  ?>
                  </div>
                  <div class="Res_Email">
                        <i class="fa fa-envelope"></i>
                        <?php 
                        if (isset($row1["Email"])) {
                        echo '<p>' . $row1["Email"] . '</p>';
                        } else {
                    
                        }
                         ?>
                  </div>
                   <div class="Res_Email">
                        <i class="fa fa-phone"></i>
                        <?php 
                        if (isset($row1["Phone"])) {
                        echo '<p>' . $row1["Phone"] . '</p>';
                        } else {
                    
                        }
                         ?>
                  </div>
                  <div class="Res_Linkedin">
                        <i class="fa fa-linkedin"></i>
                        <?php 
                        if (isset($row1["Linkedin"])) {
                        echo '<p>' . $row1["Linkedin"] . '</p>';
                        } else {
                    
                        }
                         ?>                   </div>
                   <br>
                  <hr style="width:90%;margin:auto;">
                   <div class="Tech_skills">
                  <p style="padding-left:20px; padding-top:10px;padding-bottom:10px;">
                        Technical Skills:
                  </p>
                   <?php 
                   	$d=",";
                       if (isset($row1["Tech_Skills"])) {

                         $array = explode($d, $row1["Tech_Skills"]);
                         $c=count($array);
                         $i=1;
                         foreach($array as $s){
                              if($i==$c){
                                    break;
                              }
                              echo "<li>".$s ."</li>";
                              $i++;
                         }
                        }
                   ?>         
                   </div>
                   <br>
                   <hr style="width:90%;margin:auto;">
                        <div class="Programming_Languages">
                        <p style="padding-left:20px; padding-top:10px;padding-bottom:10px;" >Programming Languages :</p>
                        <?php 
                   	$d=",";
                       if (isset($row1["Programming_Languages"])) {

                         $array = explode($d, $row1["Programming_Languages"]);
                         $c=count($array);
                         $i=1;
                         foreach($array as $s){
                              if($i==$c){
                                    break;
                              }
                              echo "<li>".$s ."</li>";
                              $i++;
                         }
                       }
                   ?>
                   </div>
                   <br>
                   <hr style="width:90%;margin:auto;">
                   <div class="Tools">
                        <p style="padding-left:20px; padding-top:10px;padding-bottom:10px;" >Tools :</p>
                        <?php 
                   	$d=",";
                       if (isset($row1["Tools"])) {

                         $array = explode($d, $row1["Tools"]);
                         $c=count($array);
                         $i=1;
                         foreach($array as $s){
                              if($i==$c){
                                    break;
                              }
                              echo "<li>".$s ."</li>";
                              $i++;
                         }
                        }
                   ?>
                   </div>

            </div>
            <div  class="Right">
                  <br>
                    <div class="Career Objective">
                    <h4 style="padding-left:10px; padding-top:10px;padding-bottom:10px;" >Career Objective :</h4>
                    <?php 
                        if (isset($row1["Linkedin"])) {
                        echo '<p style="padding-left:30px;">' . $row1["Career_Objective"] . '</p>';
                        } else {
                    
                        }
                    ?> 
                    </div> 
                  <br>
                  <hr style="height: 2px; color: #086892; background-color: #086892; border: none; width: 90%; margin:auto;">
                  <div class="Internships">
                  <h4 style="padding-left:10px; padding-top:10px;padding-bottom:10px;" >Internships :</h4>  
                  <?php 
                  if (isset($row1["Internships"])) {
                  $d = ",";
                  $array = explode($d, $row1["Internships"]);
                  foreach($array as $s){ 
                  echo "<li>".nl2br($s) ."</li>";
                  }
                  }
                        ?>
                        </div>
                        <br>
                        <hr style="height: 2px; color: #086892; background-color: #086892; border: none; width: 90%; margin:auto;">
                        <div class="Projects">
                        <h4 style="padding-left:10px; padding-top:10px;padding-bottom:10px;" >Projects :</h4>  
                        <?php 
                        if (isset($row1["Projects"])) {
                        $d = ",";
                        $array = explode($d, $row1["Projects"]);
                        foreach($array as $s){ 
                        echo "<li>".nl2br($s) ."</li>";
                        }
                  }
                        ?>
                        </div>
                        <br>
                        <hr style="height: 2px; color: #086892; background-color: #086892; border: none; width: 90%; margin:auto;">
                        <div class="Certificates">
                        <h4 style="padding-left:10px; padding-top:10px;padding-bottom:10px;" >Certificates :</h4>  
                        <?php 
                  if (isset($row1["Certificates"])) {
                        $d = ",";
                        $array = explode($d, $row1["Certificates"]);
                        foreach($array as $s){ 
                        echo "<li>".nl2br($s) ."</li>";
                        }
                  }
                        ?>
                  </div>

                  </div>

	      </div>

      </body>
</html>