<?php
    session_start();
    error_reporting(0);
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "srkr ready";

    // Connect to the database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST["update"])) {

        // Get the passwords from the form data
        $cur_pass = md5($_POST['cur_pass']);
        $new_pass = md5($_POST['new_pass']);

        // Retrieve cur pass for checking
        $sql = "SELECT * FROM stu_users WHERE username = '{$_SESSION['username']}'";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
        $pass = $row["password"];

        if ($cur_pass == $pass)
        {
            $sql = "UPDATE stu_users SET password='$new_pass' WHERE username='{$_SESSION['username']}'";
            $result = mysqli_query($conn, $sql);
            echo "<script type='text/javascript'> alert('Password changed successfully');
            </script>";
        }
        else
        {
            echo "<script type='text/javascript'> alert('Current password incorrect');
            </script>";
        }
    }

    // Close the database connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Student | Settings</title>
      <link rel="stylesheet" href="stu_settings.css">
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
                    <li><a href="stu_profile.php">Profile</a></li>
                    <li><a href="stu_leaderboard.php">Leaderboard</a></li>
                    <li><a href="stu_about.php">About</a></li>
                    <li><?php echo "<a class='active'>{$_SESSION['username']}</a>"; ?></li>
                </ul>
            </div>
        </nav>
        <div class="content">
            <div class="container">
                <div class="image-container">
                    <?php echo "<img src='https://srkrexams.in/SRKR/photo/{$_SESSION['username']}.JPG'>"; ?>
                    <!-- <img src = "images/profile-pic.png"> -->
                </div>
                <div class="details">
                    <?php echo "<h2>{$_SESSION['username']}</h2>"; ?>
                    <?php echo "<h4>{$_SESSION['email']}</h4>"; ?>
                </div>
                <form action = "" method = "POST" class="password">
                    <label for="cur_pass">Current Password:</label>
                    <input type="password" id="cur_pass" name="cur_pass" required><br>

                    <label for="new_pass">New Password:</label>
                    <input type="password" id="new_pass" name="new_pass" onInput="newPass()" required><br>

                    <label for="con_pass">Confirm Password:</label>
                    <input type="password" id="con_pass" name="con_pass" onInput="conPass()" required><br>

                    <button type="submit" name="update">Update Password</button>
                </form>
                <div class="buttons">
                    <a href="stu_edit.php" class="but1">Edit Details</a>
                    <a href="logout.php" class="but2">User Logout</a>
                </div>
            </div>
        </div>
    </body>
    <script>
        // Validate Password Student
        function newPass() {
            const new_pass = document.getElementById('new_pass').value;
            if (new_pass.length < 8 || new_pass.length > 15) {
                document.getElementById('new_pass').setCustomValidity('Password must be between 8 and 15 characters');
            } 
            else {
                document.getElementById('new_pass').setCustomValidity('');
            }
        }

        // Confirm Password Student
        function conPass() {
            const new_pass = document.getElementById('new_pass').value;
            const con_pass = document.getElementById('con_pass').value;
            if (new_pass != con_pass) {
                document.getElementById('con_pass').setCustomValidity('Password must match the above');
            } 
            else {
                document.getElementById('con_pass').setCustomValidity('');
            }
        }
    </script>
</html>