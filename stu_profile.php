<?php session_start(); error_reporting(0); ini_set('display_errors', 'off');?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Student | Profile</title>
        <link rel="stylesheet" href="stu_profile.css">
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
                    <li><a href="stu_home.php">Home</a></li>
                    <li><a class="active">Profile</a></li>
                    <li><a href="stu_leaderboard.php">Leaderboard</a></li>
                    <li><a href="stu_about.php">About</a></li>
                    <li><?php echo "<a href='stu_settings.php'>{$_SESSION['username']}</a>"; ?></li>
                </ul>
            </div>
        </nav>

        <div class="center" style="border: 1px solid black; border-color: #086892;" >
            <div class="Left">
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
                    $stmt = $conn->prepare("SELECT * FROM stu_profile WHERE Reg_No = ?");
                    $stmt->bind_param("s", $_SESSION['username']); 
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row1=mysqli_fetch_assoc($result);
                ?>                  
                <div class="Resume_pic" >
                    <?php echo "<img src='https://srkrexams.in/SRKR/photo/{$_SESSION['username']}.JPG'>";?>                  
                </div>
                <div class="Res_Name">
                    <p><?php echo $row1["FullName"]; ?></p>
                </div>
                
                <div class="des">
                    <div class="ides">
                        <i class="fa fa-envelope"></i>
                        <p><?php echo $row1["Email"]; ?></p>
                    </div>
                    <div class="ides">
                        <i class="fa fa-phone"></i>
                        <p><?php echo $row1["Phone"]; ?></p>
                    </div>
                    <div class="ides">
                        <i class="fa fa-linkedin"></i>
                        <p><?php echo $row1["Linkedin"]; ?></p>
                    </div>
                </div>

                <hr style="width:90%;margin:10px auto;">

                <div class="Tech_skills" style="padding-bottom: 10px;">
                    <p style="padding-left:20px; padding-top:10px; padding-bottom:10px; font-weight:bold;"> Technical Skills:</p>
                    <?php 
                   	    $d=",";
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
                    ?>         
                </div>

                <hr style="width:90%;margin:10px auto;">

                <div class="Programming_Languages" style="padding-bottom: 10px;">
                    <p style="padding-left:20px; padding-top:10px; padding-bottom:10px; font-weight:bold;" >Programming Languages :</p>
                    <?php 
                   	    $d=",";
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
                    ?>
                </div>

                <hr style="width:90%;margin:10px auto;">

                <div class="Tools" style="padding-bottom: 20px;">
                    <p style="padding-left:20px; padding-top:10px; padding-bottom:10px; font-weight:bold;" >Tools :</p>
                    <?php 
               	        $d=",";
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
                    ?>
                </div>
            </div>
            
            <div  class="Right">

                <div class="Career Objective" style="padding-bottom: 10px;">
                    <h4 style="padding-left:10px; padding-top:10px;padding-bottom:10px;" >Career Objective :</h4>
                    <p style="padding-left:30px;"><?php echo $row1["Career_Objective"]; ?></p>
                </div> 
                
                <hr style="width:97%; margin:10px auto; border-color: #086892;">

                <div class="Internships" style="padding-bottom: 10px;">
                    <h4 style="padding-left:10px; padding-top:10px;padding-bottom:10px;" >Internships :</h4>  
                    <?php 
                        $d = ",";
                        $array = explode($d, $row1["Internships"]);
                        foreach($array as $s){ 
                            echo "<li>".nl2br($s) ."</li>";
                        }
                    ?>
                </div>
                
                <hr style="width:97%; margin:10px auto; border-color: #086892;">
                
                <div class="Projects" style="padding-bottom: 10px;">
                    <h4 style="padding-left:10px; padding-top:10px;padding-bottom:10px;" >Projects :</h4>  
                    <?php 
                        $d = ",";
                        $array = explode($d, $row1["Projects"]);
                        foreach($array as $s){ 
                            echo "<li>".nl2br($s) ."</li>";
                        }
                    ?>
                </div>
                    
                <hr style="width:97%; margin:10px auto; border-color: #086892;">
                
                <div class="Certificates" style="padding-bottom: 20px;">
                    <h4 style="padding-left:10px; padding-top:10px;padding-bottom:10px;" >Certificates :</h4>  
                    <?php 
                        $d = ",";
                        $array = explode($d, $row1["Certificates"]);
                        foreach($array as $s){ 
                            echo "<li>".nl2br($s) ."</li>";
                        }
                    ?>
                </div>
            </div>
        </div>

    </body>
</html>