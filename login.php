<?php
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

    // If the login form of student is submitted
    if (isset($_POST["stu_signin"])) {

        // Get the username and password from the form data
        $username = $_POST['stu_user'];
        $capusername = strtoupper($username);
        $password = md5($_POST['stu_pass']);

        $sql = "SELECT * FROM stu_users WHERE username = '$capusername' OR email = '$username'";
        $result = mysqli_query($conn, $sql);

        // If the user exists
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $username = $row["username"];
            $email = $row["email"];
            $pass = $row["password"];
            if ($pass != $password)
            {
                //Invalid password
                echo "<script type='text/javascript'> alert('Invalid Password');
                window.location.href='login.php';
                </script>";
            }
            else
            {
                //Valid password
                session_start();
			    $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['type'] = 'student';
                header("Location: stu_home.php");
            }
        }
        else
        {
            //User doesnt exist
            echo "<script type='text/javascript'> alert(\"User Doesn't Exist\");
            window.location.href='signup.php';
            </script>";
        }
    }

    // If the login form of company is submitted
    if (isset($_POST["com_signin"])) {

        // Get the username and password from the form data
        $username = $_POST['com_email'];
        $password = md5($_POST['com_pass']);

        $sql = "SELECT * FROM com_users WHERE email = '$username'";
        $result = mysqli_query($conn, $sql);

        // If the user exists
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $company = $row["company"];
            $email = $row["email"];
            $pass = $row["password"];
            if ($pass != $password)
            {
                //Invalid password
                echo "<script type='text/javascript'> alert('Invalid Password');
                window.location.href='login.php?action=signup';
                </script>";
            }
            else
            {
                //Valid password
                session_start();
			    $_SESSION['username'] = $company;
                $_SESSION['email'] = $email;
                $_SESSION['type'] = 'company';
                header("Location: com_home.php");
            }
        }
        else
        {
            //User doesnt exist
            echo "<script type='text/javascript'> alert(\"User Doesn't Exist\");
            window.location.href='signup.php?action=signup';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRKR Ready | Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class="heading">
        <img src = "images/SRKR Ready Logo.png">
    </div>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="POST">
                <h2>For Companies</h2>
                <input name="com_email" type="email" placeholder="Email" required>
                <input name="com_pass" type="password" placeholder="Password" required>
                <a href="com_forgot.php">Forgot your password?</a>
                <button type="submit" name="com_signin">Sign In</button>
                <div class="not-user">
                    <span>Not a user? </span>
                    <a href="signup.php?action=signup">Sign Up </a>
                </div>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method="POST">
                <h2>For Students</h2>
                <input name="stu_user" type="text" placeholder="Username or Email" required>
                <input name="stu_pass" type="password" placeholder="Password" required>
                <a href="stu_forgot.php">Forgot your password?</a>
                <button type="submit" name="stu_signin">Sign In</button>
                <div class="not-user">
                    <span>Not a user? </span>
                    <a href="signup.php">Sign Up </a>
                </div>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src = images/Company.png>
                    <p>Welcome to our platform! We're excited to have you here. To learn more about our services, please explore our website. If you have any questions, please do not hesitate to contact us</p>
                    <button class="ghost" id="signIn">I'm A Student</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <img src = images/Student.png>
                    <p>Welcome to our platform! We're thrilled to have you here. To access our resources and start competing againt the others, please sign in with your credentials.</p>
                    <button class="ghost" id="signUp">I'm A Company</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });
    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('action')) {
        const action = urlParams.get('action');
        if (action === 'signup') {
            // Trigger the function to show the sign-up form
            container.classList.add("right-panel-active");
        }
    }
</script>
</html>