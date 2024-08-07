<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Reset Password</title>
        <link rel="stylesheet" href="stu_forgot.css" />
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">

            <img src="images/SRKR Ready Logo.png">

            <form class = "email" action="" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>
                <button type="submit" name="send_pass">></button>
            </form>
            
            <form class = "password" action="" method="POST">
                <label for="paas">Password:</label>
                <input type="password" id="password" name="password" required><br>
                <button type="submit" name="ver_pass">Verify</button>
            </form>

            <p id="info">Enter your email account</p>

        </div>
    </body>
</html>

<?php
    error_reporting(0);
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';

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

    // If the ">" is hit
    if (isset($_POST["send_pass"])) {

        // Get email
        $email = $_POST['email'];

        $sql = "SELECT * FROM stu_users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        // If the user exists
        if (mysqli_num_rows($result) > 0) {

            // Generate and send him a dummy password
            $length = rand(8, 15);
            $dummy = '';
            for ($i = 0; $i < $length; $i++) {
                $dummy .= chr(rand(33, 126));
            }
            setcookie("store_email", $email, time()+600);
            setcookie("dummy", $dummy, time()+600);
            
            // Send mail
            $mail = new PHPMailer();
            try {
                //Server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'srkr.ready@gmail.com';
                $mail->Password = 'cynrdarxttuficzm';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('srkr.ready@gmail.com', 'SRKR Ready');
                $mail->addAddress($email);
                $mail->addReplyTo($email);

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'SRKR Ready - Reset Password';
                $mail->Body = 'Your new password after being reset is '.$dummy.'<br>***This is a computer generated email, please do not reply back. Contact administrator at dharmikbanka23@gmail.com for any assistance.***';
                $mail->send();
                echo "<script type='text/javascript'> document.getElementById('info').innerHTML = 'Verify the password sent to your mail';
                </script>";
            } 
            catch (Exception $e) {
                echo "<script type='text/javascript'> alert('Email not sent, please try again after some time');
                window.location.href='login.php';
                </script>";
            }
        }
        else
        {
            //User doesnt exist
            echo "<script type='text/javascript'> alert(\"User Doesn't Exist\");
            </script>";
        }
    }

    if (isset($_POST["ver_pass"])) {

        // Get pass, email and dummy pass
        $pass = $_POST['password'];
        $email = $_COOKIE['store_email'];
        $dummy = $_COOKIE['dummy'];

        //check if matched
        if ($pass == $dummy)
        {
            $sql = "UPDATE stu_users SET password='" . md5($pass) . "' WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            echo "<script type='text/javascript'> alert('Password changed successfully');
            window.location.href='login.php';
            </script>";
        }
        else {
            echo "<script type='text/javascript'> document.getElementById('info').innerHTML = 'Incorrect password';
            </script>";
        }
    }

    // Close the database connection
    mysqli_close($conn);
?>