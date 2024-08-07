<?php
    error_reporting(0); ini_set('display_errors', 'off');
    session_start();
    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "srkr ready";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM stu_profile WHERE Reg_No='{$_SESSION['username']}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql1 = "SELECT * FROM stu_leaderboard WHERE Reg_No='{$_SESSION['username']}'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $name= $row['FullName'];
    $email=$row['Email'];
    $phone=$row['Phone'];
    $linkedin=$row['Linkedin'];
    $year=$row1['Year'];
    $group=$row1['Group'];
    $careerObjective=$row['Career_Objective'];
    $hackerrank=$row1['Username_Hackerrank'];
    $leetcode=$row1['Username_Leetcode'];
    $codechef=$row1['Username_Codechef'];
    $interviewbit=$row1['Username_Interviewbit'];
    $projects=$row['Projects'];
    $internships=$row['Internships'];
    $certificates=$row['Certificates'];
    
// Insert data from form1
if(isset($_POST['submit5'])) {

    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $linkedin = $_POST['linkedin'];
	$year=$_POST['year'];
	$Group=$_POST['group'];
    $sql = "INSERT INTO stu_profile (Reg_No,FullName, Email, Phone, Linkedin) VALUES ('{$_SESSION['username']}','$fullName', '$email', '$phone', '$linkedin') ON DUPLICATE KEY UPDATE Reg_No='{$_SESSION['username']}',FullName='$fullName',Email='$email',Phone='$phone',Linkedin='$linkedin' ";
    $sql1 = "INSERT INTO stu_leaderboard (Reg_No,`Name`,Email,`Group`,`Year`) VALUES ('{$_SESSION['username']}','$fullName','$email','$Group','$year') ON DUPLICATE KEY UPDATE Reg_No='{$_SESSION['username']}',`Name`='$fullName',Email='$email',`Group`='$Group',`Year`='$year'  ";
	if ($conn->query($sql) === TRUE  )  {

    } 
	
	else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->query($sql1) === TRUE  )  {

    } 
	
	else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
	$email = $_POST['email'];
    $careerObjective = $_POST['careerobj'];
	$techSkill =  $_POST['techskills'];
	$techSkills="";
	foreach($techSkill as $row){
		$techSkills.= $row . ",";
	}
    $programmingLanguage = $_POST['programmingLanguages'];
	$programmingLanguages="";
	foreach($programmingLanguage as $row){
		$programmingLanguages.= $row . ",";
	}
    $tool =  $_POST['tools'];
	$tools="";
	foreach($tool as $row){
		$tools.= $row . ",";
	}
    $sql = "UPDATE stu_profile SET Career_Objective='$careerObjective',Tech_Skills='$techSkills',Programming_Languages='$programmingLanguages', Tools='$tools' where Reg_No='{$_SESSION['username']}'";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	 
	$Hackerrank=$_POST['hackerrank'];
	$Leetcode=$_POST['leetcode'];
	$Codechef=$_POST['codechef'];
	$Interviewbit=$_POST['interviewbit'];
	$string1=exec("python code/coding.py $Hackerrank $Leetcode $Codechef $Interviewbit");
	$d="/";
	$array = explode($d, $string1);
	$output1=intval($array[0]);
	$output2=intval($array[1])*50;
	$output3=intval($array[2])*10;
	$output4=intdiv(intval($array[3]),3);
	$output5=$output1+$output2+$output3+$output4;
	$sql="UPDATE stu_leaderboard SET Username_hackerrank='$Hackerrank',Hackerrank='$output1',Username_Leetcode='$Leetcode',Leetcode='$output2',Username_Codechef='$Codechef',Codechef='$output3',Username_Interviewbit='$Interviewbit',Interviewbit='$output4',TotalScore='$output5' where Reg_No='{$_SESSION['username']}'";
	if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	$email = $_POST['email'];
    $projects = $_POST['projdes'];
    $internships = $_POST['interndes'];
    $sql = "UPDATE stu_profile  SET Projects='$projects', Internships='$internships' where Reg_No='{$_SESSION['username']}'";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	$email = $_POST['email'];
    $certificates = $_POST['t1'];
    $sql = "UPDATE stu_profile SET Certificates='$certificates' where Reg_No= '{$_SESSION['username']}' ";
    if ($conn->query($sql) === TRUE) {
    } else {
       echo "Not successful";
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Student | Edit Profile</title>
      <link rel="stylesheet" href="stu_edit.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    </head>
    <body>
        <nav class="topnav">
            <div class="topnav-left">
                <img src="images/SRKR Ready.png">
            </div>
            <div class="topnav-right">
                <ul>
                <li><a href="stu_home.php">Home</a></li>
                <li><a href="stu_profile.php">Profile</a></li>
                <li><a href="stu_leaderboard.php">Leaderboard</a></li>
                <li><a href="stu_about.php">About</a></li>
                <li><?php echo "<a class='active' href='stu_settings.php'>{$_SESSION['username']}</a>"; ?></li>
                </ul>
            </div>
        </nav>
        <div class="content">
            <div class="wrapper">
                <div class="header">
                    <ul style="list-style-type: none;">
                        <li class="act form_1_progessbar">
                            <div>
                                <p>1</p>
                            </div>
                        </li>
                        <li class="form_2_progessbar">
                            <div>
                                <p>2</p>
                            </div>
                        </li>
                        <li class="form_3_progessbar">
                            <div>
                                <p>3</p>
                            </div>
                        </li>
                        <li class="form_4_progessbar">
                            <div>
                                <p>4</p>
                            </div>
                        </li>
                        <li class="form_5_progessbar">
                            <div>
                                <p>5</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="form_wrap">
                    <form method="post" action="">
                        <div class="form_1 data_info">
                            <h2>About Me</h2>
                            <div class="form_container">
                                <div class="input_wrap">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" name="fullname" class="input" id="name" value="<?php echo $name; ?>">
                                </div>
                                <div class="input_wrap">
                                    <label for="email">Email ID</label>
                                    <input type="text" name="email" class="input" id="email" value="<?php echo $email; ?>">
                                </div>
                                <div class="input_wrap">
                                    <label for="phone">Phone</label>
                                    <input type="tel" name="phone" class="input" id="phone" value="<?php echo $phone; ?>">
                                </div>
                                <div class="input_wrap">
                                    <label for="linkedin">LinkedIn</label>
                                    <input type="text" name="linkedin" class="input" id="linkedin" value="<?php echo $linkedin; ?>">
                                </div>
                                <div class="input_wrap">
                                    <label for="group">Group</label>
                                    <input type="text" name="group" class="input" id="group" value="<?php echo $group; ?>">
                                </div>
                                <div class="input_wrap">
                                    <label for="year">Year</label>
                                    <input type="number" name="year" class="input" id="year" value="<?php echo $year; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form_2 data_info" style="display:none;">
                            <h2>SkillSet</h2>
                            <div class="form_container">
                                <div class="input_wrap">
                                    <label for="">Career Objective</label>
                                    <input type="text" name="careerobj" class="input" id="career_objective"  value="<?php echo $careerObjective?>">
                                </div>
                                <div class="input_wrap">
                                    <div class="op1" style="width: 34%;">
                                        <label for="technical">Your Tech Skills</label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Cloud Computing">Cloud Computing </label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Block Chain ">Block Chain </label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Cyber Security">Cyber Security </label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Data Science">Data Science </label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="IOT">IOT </label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Mobile Apps">Mobile Apps </label>
                                    </div>
                                    <div class="op1" style="width: 38%;">
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="UI/UX Design">UI/UX Design </label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Machine Learning">Machine Learning</label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Artificial Intelligence">Artificial Intelligence </label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="DevOps">DevOps</label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Automation">Automation</label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Robotics">Robotics</label>
                                    </div>
                                    <div class="op1">
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="AWS">AWS </label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Azure">Azure</label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Tableau">Tableau</label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Full Stack">Full Stack</label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Mean Stack">Mean Stack</label>
                                        <label for="techskills"><input type="checkbox" name="techskills[]" value="Mern Stack">Mern Stack </label>
                                    </div>
                                </div>
                                <div class="input_wrap">
                                    <div class="op1" style="width: 34%;">
                                        <label for="prog">Programming Languages</label>
                                        <label for="proglang"><input type="checkbox" name="programmingLanguages[]" value="C">C </label>
                                        <label for="proglang"><input type="checkbox" name="programmingLanguages[]" value="C++">C++</label>
                                    </div>
                                    <div class="op1" style="width: 38%;">
                                        <label for="proglang"><input type="checkbox" name="programmingLanguages[]" value="Java">Java</label>
                                        <label for="proglang"><input type="checkbox" name="programmingLanguages[]" value="Python">Python</label>
                                    </div>
                                    <div class="op1">
                                        <label for="proglang"><input type="checkbox" name="programmingLanguages[]" value="R">R</label>
                                        <label for="proglang"><input type="checkbox" name="programmingLanguages[]" value="Ruby">Ruby</label>
                                    </div>
                                </div>
                                <div class="input_wrap">
                                    <div class="op1" style="width: 34%;">
                                        <label for="tool">Tools</label>
                                        <label for="tools"><input type="checkbox" name="tools[]" value="MS Office">MS Office</label>
                                    </div>
                                    <div class="op1">
                                        <label for="tools"><input type="checkbox" name="tools[]" value="Google Workspace">Google Workspace</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_3 data_info" style="display:none;">
                            <h2>Coding Links</h2>
                            <div class="form_container">
                                <div class="input_wrap">
                                    <label for="hackerrank">Your HackerRank Profile</label>
                                    <input type="text" name="hackerrank" class="input" id="hackerrank" value="<?php echo $hackerrank?>">
                                </div>
                                <div class="input_wrap">
                                    <label for="leetcode">Your LeetCode Profile</label>
                                    <input type="text" name="leetcode" class="input" id="leetcode" value="<?php echo $leetcode?>">
                                    </div>
                                <div class="input_wrap">
                                    <label for="codecheck">Your Codechef Profile</label>
                                    <input type="text" name="codechef" class="input" id="codechef" value="<?php echo $codechef?>">
                                </div>
                                <div class="input_wrap">
                                    <label for="interviewbit">Your InterviewBit Profile</label>
                                    <input type="text" name="interviewbit" class="input" id="interviewbit" value="<?php echo $interviewbit?>">
                                </div>
                            </div>
                        </div>
                        <div class="form_4 data_info" style="display:none;">
                            <h2>Projects and Internships</h2>
                            <div class="form_container">
                                <div class="input_wrap" style="margin: auto;">
                                    <label for="projdes">Projects Description</label>
                                    <textarea id="projdes" name="projdes" rows="4" cols="50" class="input" placeholder="Enter projects seperated by ','"><?php echo $projects?></textarea>
                                    <!--
                                        <input type="textarea" name="projdes" rows="4" cols="50" class="input" id="projdes">
                                    -->
                                </div>
                                <div class="input_wrap" style="margin: auto;">
                                    <label for="interndes">Internships Description</label>
                                    <textarea id="interndes" name="interndes" rows="4" cols="50" class="input" placeholder="Enter projects seperated by ','" ><?php echo $internships?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form_5 data_info" style="display:none;">
                            <h2>Certifications</h2>
                            <div class="input_wrap">
                                <textarea id="t1" name="t1" rows="4" cols="50" class="input" placeholder="Enter projects seperated by ','"><?php echo $certificates?></textarea>
                            </div>
                        </div>
                        <div class="btns_wrap">
                            <div class="common_btns form_5_btns" style="display:none;">
                                <button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
                                <button type="submit" name="submit5" class="btn_done">Done</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="btns_wrap">
                    <div class="common_btns form_1_btns">
                        <button type="submit" name="submit1" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
                    </div>
                    <div class="common_btns form_2_btns" style="display:none;">
                        <button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
                        <button type="submit" name="submit2" class="btn_next" >Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
                    </div>
                    <div class="common_btns form_3_btns" style="display:none;">
                        <button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
                        <button type="submit" name="submit3" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
                    </div>
                    <div class="common_btns form_4_btns" style="display:none;">
                        <button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
                        <button type="submit" name="submit4" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
                    </div>
                </div>
            </div> 
            <div class="modal_wrapper">
                <div class="shadow"></div>
                <div class="success_wrap">
                    <span class="modal_icon"><ion-icon name="checkmark-sharp"></ion-icon></span>
                    <p>You have successfully completed the process.</p>
                </div>
            </div>
        </div>
    </body>
    <script>
        var form_1 = document.querySelector(".form_1");
        var form_2 = document.querySelector(".form_2");
        var form_3 = document.querySelector(".form_3");
        var form_4 = document.querySelector(".form_4");
        var form_5 = document.querySelector(".form_5");

        var form_1_btns = document.querySelector(".form_1_btns");
        var form_2_btns = document.querySelector(".form_2_btns");
        var form_3_btns = document.querySelector(".form_3_btns");
        var form_4_btns = document.querySelector(".form_4_btns");
        var form_5_btns = document.querySelector(".form_5_btns");

        var form_1_next_btn = document.querySelector(".form_1_btns .btn_next");
        var form_2_back_btn = document.querySelector(".form_2_btns .btn_back");
        var form_2_next_btn = document.querySelector(".form_2_btns .btn_next");
        var form_3_back_btn = document.querySelector(".form_3_btns .btn_back");
        var form_3_next_btn = document.querySelector(".form_3_btns .btn_next");
        var form_4_back_btn = document.querySelector(".form_4_btns .btn_back");
        var form_4_next_btn = document.querySelector(".form_4_btns .btn_next");
        var form_5_back_btn = document.querySelector(".form_5_btns .btn_back");

        //var form_1_progessbar = document.querySelector(".form_1_progessbar");
        var form_2_progessbar = document.querySelector(".form_2_progessbar");
        var form_3_progessbar = document.querySelector(".form_3_progessbar");
        var form_4_progessbar = document.querySelector(".form_4_progessbar");
        var form_5_progessbar = document.querySelector(".form_5_progessbar");

        var btn_done = document.querySelector(".btn_done");
        var modal_wrapper = document.querySelector(".modal_wrapper");
        var shadow = document.querySelector(".shadow");

        form_1_next_btn.addEventListener("click", function(){
            form_1.style.display = "none";
            form_2.style.display = "block";

            form_1_btns.style.display = "none";
            form_2_btns.style.display = "flex";

            form_2_progessbar.classList.add("act");
        });

        form_2_back_btn.addEventListener("click", function(){
            form_1.style.display = "block";
            form_2.style.display = "none";

            form_1_btns.style.display = "flex";
            form_2_btns.style.display = "none";

            form_2_progessbar.classList.remove("act");
        });

        form_2_next_btn.addEventListener("click", function(){
            form_2.style.display = "none";
            form_3.style.display = "block";

            form_3_btns.style.display = "flex";
            form_2_btns.style.display = "none";

            form_3_progessbar.classList.add("act");
        });

        form_3_back_btn.addEventListener("click", function(){
            form_2.style.display = "block";
            form_3.style.display = "none";

            form_2_btns.style.display = "flex";
            form_3_btns.style.display = "none";

            form_3_progessbar.classList.remove("act");
        });

        form_3_next_btn.addEventListener("click", function(){
            form_3.style.display = "none";
            form_4.style.display = "block";

            form_4_btns.style.display = "flex";
            form_3_btns.style.display = "none";

            form_4_progessbar.classList.add("act");
        });

        form_4_back_btn.addEventListener("click", function(){
            form_3.style.display = "block";
            form_4.style.display = "none";

            form_3_btns.style.display = "flex";
            form_4_btns.style.display = "none";

            form_4_progessbar.classList.remove("act");
        });

        form_4_next_btn.addEventListener("click", function(){
            form_4.style.display = "none";
            form_5.style.display = "block";

            form_5_btns.style.display = "flex";
            form_4_btns.style.display = "none";

            form_5_progessbar.classList.add("act");
        });

        form_5_back_btn.addEventListener("click", function(){
            form_4.style.display = "block";
            form_5.style.display = "none";

            form_5_btns.style.display = "none";
            form_4_btns.style.display = "flex";

            form_5_progessbar.classList.remove("act");
        });

        btn_done.addEventListener("click", function(){
            modal_wrapper.classList.add("act");
        })

        shadow.addEventListener("click", function(){
            modal_wrapper.classList.remove("act");
        })

    </script>
</html> 