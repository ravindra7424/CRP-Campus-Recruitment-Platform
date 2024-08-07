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

    // If the login form is submitted
    if (isset($_POST["stu_signup"])) {

        // Get the username and password from the form data
        $username = strtoupper($_POST['stu_reg']);
        $email = $_POST['stu_email'];
        $password = md5($_POST['stu_pass']);

        // store the $temp value in a cookie named "username" for 10 mins (600 seconds)
        setcookie("username", $username, time()+600);
        setcookie("email", $email, time()+600);
        setcookie("password", $password, time()+600);

        // Query the database to check if the user exists
        $sql = "SELECT * FROM stu_users WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn, $sql);

        // If the user exists
        if (mysqli_num_rows($result) !=0) {
            echo "<script type='text/javascript'> alert('User Exists');
            window.location.href='login.php';
            </script>";
        }
        else 
        {
            $sql = "SELECT * FROM otp_verification WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                // Record already exists, update the values
                $otp = rand(1000,9999);
                $sql = "UPDATE otp_verification SET email='$email', password='$password', otp='$otp' WHERE username='$username'";
                $result = mysqli_query($conn, $sql);
            } 
            else {
                // Record does not exist, insert a new row
                $otp = rand(1000,9999);
                $sql = "INSERT INTO otp_verification (username, email, password, otp) VALUES ('$username', '$email', '$password', '$otp')";
                $result = mysqli_query($conn, $sql);
            }

            // If the data is inserted successfully
            if ($result) {
                    $mail = new PHPMailer(true);
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
                        $mail->Subject = 'SRKR Ready - One Time Password';
                        $mail->Body = 'Your one time password for student verification is '.$otp.'<br>***This is a computer generated email, please do not reply back. Contact administrator at dharmikbanka23@gmail.com for any assistance.***';
                        $mail->send();
                    } 
                    catch (Exception $e) {
                        $sql = "DELETE FROM otp_verification WHERE 'username' = '$username'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: signup.php");
                    }
            } 
            else {
                header("Location: signup.php");
            }
        }
    }

    //Validate Button
    if (isset($_POST["stu_validate"]))
    {   
        $username = $_COOKIE['username'];
        $code = $_POST["1"]*1000 + $_POST["2"]*100 + $_POST["3"]*10 + $_POST["4"];
        $sql = "SELECT otp FROM otp_verification WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
        $otp = $row['otp'];

        if ( $code == $otp )
        {
            $email = $_COOKIE['email'];
            $password = $_COOKIE['password'];

            // Add the details into stu_users table
            $sql = "INSERT INTO stu_users (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);

            // Delete the details from verification table
            $sql = "DELETE FROM otp_verification WHERE `otp_verification`.`username` = '$username'";
            $result = mysqli_query($conn, $sql);

            echo "<script type='text/javascript'> alert('OTP Verified Successfully, Redirecting...');
            window.location.href='login.php';
            </script>";
        }
        else
        {
            echo "<script type='text/javascript'> alert('OTP Incorrect, Please Try Again');
            </script>";
        }
    }

    // Close the database connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>OTP Verification</title>
        <link rel="stylesheet" href="studentvalidate.css" />
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <img src="images/SRKR Ready Logo.png">
            <h4>Enter OTP Code</h4>
            <form action="" method="POST">
                <div class="input-field">
                    <input name="1" type="number" min="0" max="9" maxlength="1" />
                    <input name="2" type="number" min="0" max="9" maxlength="1" disabled />
                    <input name="3" type="number" min="0" max="9" maxlength="1" disabled />
                    <input name="4" type="number" min="0" max="9" maxlength="1" disabled />
                </div>
                <button type="submit" name="stu_validate">Verify OTP</button>
                <br>
                <p id="info">
                    Verify the OTP that has been sent to your email
                </p>
            </form>
        </div>
    </body>
    <script>
        
        const inputs = document.querySelectorAll("input"),
        button = document.querySelector("button");

        // iterate over all inputs
        inputs.forEach((input, index1) => {
        input.addEventListener("keyup", (e) => {
            // This code gets the current input element and stores it in the currentInput variable
            // This code gets the next sibling element of the current input element and stores it in the nextInput variable
            // This code gets the previous sibling element of the current input element and stores it in the prevInput variable
            const currentInput = input,
            nextInput = input.nextElementSibling,
            prevInput = input.previousElementSibling;

            // if the value has more than one character then clear it
            if (currentInput.value.length > 1) {
            currentInput.value = "";
            return;
            }
            // if the next input is disabled and the current value is not empty
            //  enable the next input and focus on it
            if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
            nextInput.removeAttribute("disabled");
            nextInput.focus();
            }

            // if the backspace key is pressed
            if (e.key === "Backspace") {
            // iterate over all inputs again
            inputs.forEach((input, index2) => {
                // if the index1 of the current input is less than or equal to the index2 of the input in the outer loop
                // and the previous element exists, set the disabled attribute on the input and focus on the previous element
                if (index1 <= index2 && prevInput) {
                input.setAttribute("disabled", true);
                input.value = "";
                prevInput.focus();
                }
            });
            }
            //if the fourth input( which index number is 3) is not empty and has not disable attribute then
            //add active class if not then remove the active class.
            if (!inputs[3].disabled && inputs[3].value !== "") {
            button.classList.add("active");
            return;
            }
            button.classList.remove("active");
        });
        });

        //focus the first input which index is 0 on window load
        window.addEventListener("load", () => inputs[0].focus());
    </script>
</html>    