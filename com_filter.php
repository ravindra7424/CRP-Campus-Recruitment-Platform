<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
            <meta charset="utf-8">
            <title>Company | Filter</title>
            <link rel="stylesheet" href="com_filter.css">
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
                        <li><a class="active">Filter</a></li>
                        <li><a href="com_leaderboard.php">Leaderboard</a></li>
                        <li><a href="com_about.php">About</a></li>
                        <li><?php session_start(); error_reporting(0); echo "<a href='com_settings.php'>{$_SESSION['username']}</a>"; ?></li>
                        </ul>
                  </div>
            </nav>
            <br>
<div class="center">
      <form method="post" action="">
					<div class="input_wrap">
						<div class="op1">
                                          <label for="technical">Your Tech Skills</label>
                                          <label for="techskills"><input type="checkbox" name="techskills[]" value="Cloud Computing">Cloud Computing </label>
                                          <label for="techskills"><input type="checkbox" name="techskills[]" value="Block Chain ">Block Chain </label>
                                          <label for="techskills"><input type="checkbox" name="techskills[]" value="Cyber Security">Cyber Security </label>
                                    </div>
                                    <div class="op1">
                                          <label for="techskills"><input type="checkbox" name="techskills[]" value="Data Science">Data Science </label>
                                          <label for="techskills"><input type="checkbox" name="techskills[]" value="IOT">IOT </label>
                                          <label for="techskills"><input type="checkbox" name="techskills[]" value="Mobile Apps">Mobile Apps </label>
					      </div>
						<div class="op1">
							<label for="techskills"><input type="checkbox" name="techskills[]" value="UI/UX Design">UI/UX Design </label>
							<label for="techskills"><input type="checkbox" name="techskills[]" value="Machine Learning">Machine Learning</label>
							<label for="techskills"><input type="checkbox" name="techskills[]" value="Artificial Intelligence">Artificial Intelligence </label>
                                    </div>
                                    <div class="op1">
							<label for="techskills"><input type="checkbox" name="techskills[]" value="DevOps">DevOps</label>
							<label for="techskills"><input type="checkbox" name="techskills[]" value="Automation">Automation</label>
							<label for="techskills"><input type="checkbox" name="techskills[]" value="Robotics">Robotics</label>
						
						</div>
						<div class="op1">
							<label for="techskills"><input type="checkbox" name="techskills[]" value="AWS">AWS </label>
							<label for="techskills"><input type="checkbox" name="techskills[]" value="Azure">Azure</label>
							<label for="techskills"><input type="checkbox" name="techskills[]" value="Tableau">Tableau</label>
                                    </div>
                                    <div class="op1">
							<label for="techskills"><input type="checkbox" name="techskills[]" value="Full Stack">Full Stack</label>
							<label for="techskills"><input type="checkbox" name="techskills[]" value="Mean Stack">Mean Stack</label>
							<label for="techskills"><input type="checkbox" name="techskills[]" value="Mern Stack">Mern Stack </label>
                                    </div>
					</div>
					<div class="input_wrap">
						<div class="op1">
							<label for="prog">Programming Languages</label>
                                    <div class="op1">
						      <label for="proglang"><input type="checkbox" name="programmingLanguages[]" value="C">C </label>
                                    </div>
                                    <div class="op1">
                                          <label for="proglang"><input type="checkbox" name="programmingLanguages[]" value="C++">C++</label>
                                    </div>
                                    <div class="op1">
						      <label for="proglang"><input type="checkbox" name="programmingLanguages[]" value="Java">Java</label>
                                    </div>
                                    <div class="op1">
                                          <label for="proglang"><input type="checkbox" name="programmingLanguages[]" value="Python">Python</label>
                                    </div>
                                    <div class="op1">
						      <label for="proglang"><input type="checkbox" name="programmingLanguages[]" value="R">R</label>
                                    </div>
                                    <div class="op1">
						      <label for="proglang"><input type="checkbox" name="programmingLanguages[]" value="Ruby">Ruby</label>
						</div>
					</div>
                               </div>
                              <center>
                              <div class="btns_wrap">
		                        <div class="common_btns form_1_btns">
			                        <button type="submit" name="submit1" class="btn_done" ><p style="font-weight:1000;">FILTER</p></button>
		                        </div>
                              </div>
                               </center>
       </form>
 </div>
 <br>
<div class="content">
         <table id="leaderboard">
            <thead>
               <tr>
                  <th data-sort="number">Sno<i class="fas fa-sort"></i></th>
                  <th data-sort="string">Name<i class="fas fa-sort"></i></th>
                  <th data-sort="string">RegNo<i class="fas fa-sort"></i></th>
                  <th data-sort="string">Group<i class="fas fa-sort"></i></th>
                  <th data-sort="number">Year<i class="fas fa-sort"></i></th>
                  <th data-sort="number">Hackerrank<i class="fas fa-sort"></i></th>
                  <th data-sort="number">Leetcode<i class="fas fa-sort"></i></th>
                  <th data-sort="number">Codechef<i class="fas fa-sort"></i></th>
                  <th data-sort="number">Interviewbit<i class="fas fa-sort"></i></th>
                  <th data-sort="number">TotalScore<i class="fas fa-sort"></i></th>
               </tr>
            </thead>
            <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "srkr ready";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            if(isset($_POST['submit1'])) {
                  if (isset($_POST['programmingLanguages']) && isset($_POST['techskills']) ) {
                        $programmingLanguage = $_POST['programmingLanguages'];
                        $programmingLanguages="";
                        foreach($programmingLanguage as $row){
                              $programmingLanguages.= $row . ",";
                        }
                        $techSkill =  $_POST['techskills'];
                        $techSkills="";
                        foreach($techSkill as $row){
                              $techSkills.= $row . ",";
                        }
                        $sql = "SELECT * FROM stu_leaderboard WHERE Reg_No IN (SELECT Reg_No FROM stu_profile WHERE Tech_Skills LIKE '%$techSkills%') INTERSECT SELECT * FROM stu_leaderboard WHERE Reg_No IN (SELECT Reg_No FROM stu_profile WHERE Programming_Languages LIKE '%$programmingLanguages%') ";
                  }
                  else if(isset($_POST['programmingLanguages'])){
                        $programmingLanguage = $_POST['programmingLanguages'];
                        $programmingLanguages="";
                        foreach($programmingLanguage as $row){
                              $programmingLanguages.= $row . ",";
                        }
                        $sql = "SELECT * FROM stu_leaderboard WHERE Reg_No IN (SELECT Reg_No FROM stu_profile WHERE Programming_Languages LIKE '%$programmingLanguages%') ";
                  }
                  else if(isset($_POST['techskills'])){
                        $techSkill =  $_POST['techskills'];
                        $techSkills="";
                        foreach($techSkill as $row){
                              $techSkills.= $row . ",";
                        }
                        $sql = "SELECT * FROM stu_leaderboard WHERE Reg_No IN (SELECT Reg_No FROM stu_profile WHERE Tech_Skills LIKE '%$techSkills%')  ";
                  }
                  else{
                        $sql = "SELECT * FROM stu_leaderboard WHERE Reg_No='0000000' ";
 
                  }
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                        $i = 1;
                        while($row = mysqli_fetch_assoc($result)) {
                        
                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo '<td><a href="com_profile.php?Reg_No='.urlencode($row["Reg_No"]).'" style="text-decoration:none;" target="_blank">'.$row["Name"].'</a></td>';
                        echo "<td>".$row["Reg_No"]."</td>";
                        echo "<td>".$row["Group"]."</td>";
                        echo "<td>".$row["Year"]."</td>";
                        echo "<td>".$row["Hackerrank"]."</td>";
                        echo "<td>".$row["Leetcode"]."</td>";
                        echo "<td>".$row["Codechef"]."</td>";
                        echo "<td>".$row["Interviewbit"]."</td>";
                        echo "<td>".$row["TotalScore"]."</td>";
                        echo "</tr>";
                        $i++;
                        }
                  } 
            }
            ?>
            </tbody>
         </table>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/tablesort/5.2.0/tablesort.min.js"></script>
        <script>
         // Initialize tablesort plugin
         new Tablesort(document.getElementById('leaderboard'));
        </script>
    </body>
</html>

        