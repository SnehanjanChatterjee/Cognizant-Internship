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
    $encryptedPassword = md5($password);

    $sql1 = "INSERT INTO users(userid,user_role,password,passwordWithoutEncryption,last_login,status) VALUES ('$userId',2,'$encryptedPassword','$password',NULL,0)";
    $sql2 = "INSERT INTO user_values(fname,lname,email,class,section,address,mobile_no,password,passwordWithoutEncryption) VALUES ('$fname','$lname','$email','$class','$section','$address','$mobileNo','$encryptedPassword','$password')";
    if ((!mysqli_query($conn, $sql1)) || (!mysqli_query($conn, $sql2))) {
        echo "Error: " . "<br>" . mysqli_error($conn);
    }
    $sql3 = "UPDATE user_values INNER JOIN users ON user_values.password = users.password SET user_values.id = users.id";
    if (!mysqli_query($conn, $sql3)) {
        echo "Error: " . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    header('Refresh: 0; URL= index.php');
?>