<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Company | Leaderboard</title>
      <link rel="stylesheet" href="com_leaderboard.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
                <li><a class="active">Leaderboard</a></li>
                <li><a href="com_about.php">About</a></li>
                <li><?php session_start(); error_reporting(0); echo "<a href='com_settings.php'>{$_SESSION['username']}</a>"; ?></li>
                </ul>
            </div>
        </nav>
        <div class="content">
            <table id="leaderboard1">
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
        
                    // Get data from the database
                    $sql = "SELECT * FROM stu_leaderboard order by TotalScore DESC";
                    $result = mysqli_query($conn, $sql);
        
                    // Loop through the data and output it in the table
                    if (mysqli_num_rows($result) > 0) {
                        $i = 1;
                        while($row = mysqli_fetch_assoc($result)) {
                            
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo '<td><a href="com_profile.php?Reg_No='.urlencode($row["Reg_No"]).'" style="text-decoration:none;">'.$row["Name"].'</a></td>';
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
                    } else {
                        echo "<tr><td colspan='10'>No records found.</td></tr>";
                    }
        
                    // Close the database connection
                    mysqli_close($conn);
                ?>
                </tbody>
            </table>
        </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tablesort/5.2.0/tablesort.min.js"></script>
    <script>
        // Initialize tablesort plugin
        new Tablesort(document.getElementById('leaderboard'));
    </script>
</html>