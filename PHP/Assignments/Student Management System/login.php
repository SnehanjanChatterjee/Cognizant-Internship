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
$username = mysqli_real_escape_string($conn,$_POST['username']);

if(isset($username))
{
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $encryptedPassword = md5($password);

    $sql = "SELECT * FROM users WHERE userid='$username' AND passwordWithoutEncryption='$password' limit 1";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        //$_SESSION['username'] = $username;
        echo "Success";
    }
    else{
        echo "Failed to Login";
    }

    mysqli_close($conn);
    header('Refresh: 5; URL= dashboard.html');
}
?>