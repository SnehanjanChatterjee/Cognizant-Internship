<?php
// Start the session
// Must be before any HTML tag
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
$username = mysqli_real_escape_string($conn,$_POST['username']);

if(isset($username))
{
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $encryptedPassword = md5($password);

    $sql = "SELECT * FROM users WHERE userid='$username' AND passwordWithoutEncryption='$password' limit 1";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        //For storing session variables for dashboard

        $sql1 = "SELECT u.id,u.last_login,uv.fname,uv.lname,uv.class,uv.section,u.status,uv.address,uv.mobile_no,uv.email 
        FROM users u INNER JOIN user_values uv ON u.id=uv.id WHERE u.userid='$username'";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) > 0) {
            $row = mysqli_fetch_assoc($result1);
        }

        // Store Session Data
        $_SESSION['id'] = $row['id'];
        $_SESSION['last_logon'] = $row['last_login'];
        $_SESSION['name'] = $row['fname'] . " " . $row['lname'];
        $_SESSION['class'] = $row['class'];
        $_SESSION['section'] = $row['section'];
        $_SESSION['approval_status'] = $row['status'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['mobile_no'] = $row['mobile_no'];
        $_SESSION['email'] = $row['email'];

        echo "Success";
        mysqli_close($conn);
        header('Refresh: 2; URL= dashboard.php');
    }
    else{
        echo "Failed to Login";
        mysqli_close($conn);
    } 
}
?>