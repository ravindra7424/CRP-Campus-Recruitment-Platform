<?php error_reporting(0); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRKR Ready | Login</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
    <div class="heading">
        <img src = "images/SRKR Ready Logo.png">
    </div>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="companyvalidate.php" method = "post">  
                <h2>For Companies</h2>
                <input name="com_name" type="text" placeholder="Company Name" id="com_name" required>
                <input name="com_email" type="email" placeholder="Email" id="com_email" required>
                <input name="com_pass" type="password" placeholder="Password" id="com_pass" onInput="comPass()" required>
                <input type="password" placeholder="Confirm Password" id="com_conpass" onInput="comConPass()" required>
                <br>
                <button type="submit" name="com_signup" id="submit_button">Sign Up</button>
                <div class="not-user">
                    <span>Already a user? </span>
                    <a href="login.php?action=signup">Sign Up </a>
                </div>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="studentvalidate.php" method="post">
                <h2>For Students</h2>
                <input name="stu_reg" type="text" placeholder="Registration Number" id="stu_reg" required>
                <input name="stu_email" type="email" placeholder="Email" id="stu_email" required>
                <input name="stu_pass" type="password" placeholder="Password" id="stu_pass" onInput="stuPass()" required>
                <input type="password" placeholder="Confirm Password" id="stu_conpass" onInput="stuConPass()" required>
                <br>
                <button type="submit" name="stu_signup" id="submit_button">Sign Up</button>
                <div class="not-user">
                    <span>Already a user? </span>
                    <a href="login.php">Sign In </a>
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

    // Validate Password Student
    function stuPass() {
        const stu_pass = document.getElementById('stu_pass').value;
        if (stu_pass.length < 8 || stu_pass.length > 15) {
            document.getElementById('stu_pass').setCustomValidity('Password must be between 8 and 15 characters');
        } 
        else {
            document.getElementById('stu_pass').setCustomValidity('');
        }
    }

    // Confirm Password Student
    function stuConPass() {
        const stu_pass = document.getElementById('stu_pass').value;
        const stu_conpass = document.getElementById('stu_conpass').value;
        if (stu_pass != stu_conpass) {
            document.getElementById('stu_conpass').setCustomValidity('Password must match the above');
        } 
        else {
            document.getElementById('stu_conpass').setCustomValidity('');
        }
    }

    // Validate Pasword Company
    function comPass() {
        const com_pass = document.getElementById('com_pass').value;
        if (com_pass.length < 8 || com_pass.length > 15) {
            document.getElementById('com_pass').setCustomValidity('Password must be between 8 and 15 characters');
        } 
        else {
            document.getElementById('com_pass').setCustomValidity('');
        }
    }

    // Confirm Password Company
    function comConPass() {
        const com_pass = document.getElementById('com_pass').value;
        const com_conpass = document.getElementById('com_conpass').value;
        if (com_pass != com_conpass) {
            document.getElementById('com_conpass').setCustomValidity('Password must match the above');
        } 
        else {
            document.getElementById('com_conpass').setCustomValidity('');
        }
    }

    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    // Check if the action parameter is present in the query string
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