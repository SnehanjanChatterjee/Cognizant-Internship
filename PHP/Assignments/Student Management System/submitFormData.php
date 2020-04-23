<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student_management_system";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $class = $_POST['sclass'];
    $section = $_POST['ssection'];
    $address = $_POST['address'];
    $mobileNo = $_POST['mobileNo'];
    $password = $_POST['password'];
    $userId = "STU" . $mobileNo;

    $sql1 = "INSERT INTO users(userid,user_role,password,last_login,status) VALUES ('$userId',2,'$password',NULL,0)";
    $sql2 = "INSERT INTO user_values(fname,lname,email,class,section,address,mobile_no,password) VALUES ('$fname','$lname','$email','$class','$section','$address','$mobileNo','$password')";
    if ((!mysqli_query($conn, $sql1)) || (!mysqli_query($conn, $sql2))) {
        echo "Error: " . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    header('Refresh: 0; URL= index.php');
?>