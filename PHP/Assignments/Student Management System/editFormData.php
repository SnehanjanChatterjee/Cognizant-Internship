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

    $sql_email = "SELECT * FROM user_values WHERE email = '$email' AND id <> '$id'";
    $sql_mobile_no = "SELECT * FROM user_values WHERE mobile_no = '$mobileNo' AND id <> '$id'";
      
  	$res_email = mysqli_query($conn, $sql_email);
    $res_mobile_no = mysqli_query($conn, $sql_mobile_no);
      
    if((mysqli_num_rows($res_email) > 0) || (mysqli_num_rows($res_mobile_no) > 0)){
        if(mysqli_num_rows($res_email) > 0) {
            // $email_error = "Sorry... email already taken. <br>";
            echo "Sorry... email already taken. <br>";
            // header('Refresh: 5; URL= editProfile.php');
        }
        if(mysqli_num_rows($res_mobile_no) > 0){
            // $mobileNo_error = "Sorry... mobile number already taken. <br>";
            echo "Sorry... mobile number already taken. <br>";
            // header('Refresh: 5; URL= editProfile.php'); 	
        }
        header('Refresh: 5; URL= editProfile.php');
    }
    else{

        $sql1 = "UPDATE users SET userid='$userId' WHERE id='$id'";
        $sql2 = "UPDATE user_values SET fname = '$fname',lname='$lname',email='$email',class='$class',section='$section',address='$address',mobile_no='$mobileNo' WHERE id='$id'";
        
        if ((!mysqli_query($conn, $sql1)) || (!mysqli_query($conn, $sql2))) {
            echo "Error: " . "<br>" . mysqli_error($conn);
        }
        $sql3 = "UPDATE user_values INNER JOIN users ON user_values.password = users.password SET user_values.id = users.id";
        if (!mysqli_query($conn, $sql3)) {
            echo "Error: " . "<br>" . mysqli_error($conn);
        }

        //For storing session variables for dashboard, myprofile
        $sql_all = "SELECT u.*,uv.* FROM users u INNER JOIN user_values uv ON u.id=uv.id WHERE u.userid='$userId'";

        $result_all = mysqli_query($conn, $sql_all);

        if (mysqli_num_rows($result_all) > 0) {
            $row_all = mysqli_fetch_assoc($result_all);
        }

        // Store Session Data
        $_SESSION['id'] = $row_all['id'];
        $_SESSION['last_logon'] = $row_all['last_login'];
        $_SESSION['name'] = $row_all['fname'] . " " . $row_all['lname'];
        $_SESSION['class'] = $row_all['class'];
        $_SESSION['section'] = $row_all['section'];
        $_SESSION['approval_status'] = $row_all['status'];
        $_SESSION['address'] = $row_all['address'];
        $_SESSION['mobile_no'] = $row_all['mobile_no'];
        $_SESSION['email'] = $row_all['email'];

        // mysqli_close($conn);
        header('Refresh: 0; URL= myProfile.php');
    }
    mysqli_close($conn);
?>