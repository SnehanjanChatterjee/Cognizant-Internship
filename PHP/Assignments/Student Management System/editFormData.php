<?php
    session_start();
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
    $id = $_SESSION['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $class = $_POST['sclass'];
    $section = $_POST['ssection'];
    $address = $_POST['address'];
    $mobileNo = $_POST['mobileNo'];
    $userId = "STU" . $mobileNo;

    $sql1 = "UPDATE users SET userid='$userId' WHERE id='$id'";
    $sql2 = "UPDATE user_values SET fname = '$fname',lname='$lname',email='$email',class='$class',section='$section',address='$address',mobile_no='$mobileNo' WHERE id='$id'";
    
    if ((!mysqli_query($conn, $sql1)) || (!mysqli_query($conn, $sql2))) {
        echo "Error: " . "<br>" . mysqli_error($conn);
    }
    $sql3 = "UPDATE user_values INNER JOIN users ON user_values.password = users.password SET user_values.id = users.id";
    if (!mysqli_query($conn, $sql3)) {
        echo "Error: " . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    header('Refresh: 2; URL= myProfile.php');
?>