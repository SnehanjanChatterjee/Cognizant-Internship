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

$sclass = $_REQUEST['stu_class'];

$sql = "SELECT section FROM class_section WHERE class_no='$sclass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $section = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $section[] = $row['section'];
    }
}

// Converting Array to JSON format
echo json_encode($section);

mysqli_close($conn);

exit;

?>