<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "srkr ready";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM stu_leaderboard order by TotalScore DESC";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $Hackerrank=$row['Username_Hackerrank'];
        $Leetcode=$row['Username_Leetcode'];
        $Codechef=$row['Username_Codechef'];
        $Interviewbit=$row['Username_Interviewbit'];
        $string1=exec("python code/hacker1.py $Hackerrank $Leetcode $Codechef $Interviewbit");
        $d="/";
        $array = explode($d, $string1);
        $output1=intval($array[0]);
        $output2=intval($array[1])*50;
        $output3=intval($array[2])*10;
        $output4=intdiv(intval($array[3]),3);
        $output5=$output1+$output2+$output3+$output4;
        $sql1 = "UPDATE stu_leaderboard SET Username_hackerrank='$Hackerrank', Hackerrank='$output1', Username_Leetcode='$Leetcode', Leetcode='$output2', Username_Codechef='$Codechef', Codechef='$output3', Username_Interviewbit='$Interviewbit', Interviewbit='$output4', TotalScore='$output5' WHERE Reg_No='" . $row['Reg_No'] . "'";
        if ($conn->query($sql1) === TRUE) {
        } else {
            echo "Error: ";
        }
        echo "<script type='text/javascript'> alert('Done');
                window.location.href='stu_leaderboard.php';</script>";

    }
?>