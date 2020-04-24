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

    $sql_email = "SELECT * FROM user_values WHERE email = '$email'";
    $sql_mobile_no = "SELECT * FROM user_values WHERE mobile_no = '$mobileNo'";
    $sql_password = "SELECT * FROM user_values WHERE password = '$password'";
      
  	$res_email = mysqli_query($conn, $sql_email);
    $res_mobile_no = mysqli_query($conn, $sql_mobile_no);
    $res_password = mysqli_query($conn, $sql_password);
      
    if((mysqli_num_rows($res_email) > 0) || (mysqli_num_rows($res_mobile_no) > 0) || (mysqli_num_rows($res_password) > 0)){
        if(mysqli_num_rows($res_email) > 0) {
            $email_error = "Sorry... email already taken <br>";
            echo $email_error;
            header('Refresh: 2; URL= createAccount.php');
        }
        if(mysqli_num_rows($res_mobile_no) > 0){
                $mobileNo_error = "Sorry... mobile number already taken <br>";
                echo $mobileNo_error;
                header('Refresh: 2; URL= createAccount.php'); 	
        }
        if(mysqli_num_rows($res_password) > 0){
                $password_error = "Sorry... password already taken <br>";
                echo $password_error;
                header('Refresh: 2; URL= createAccount.php');
        }
    }
    else{
        
        $sql1 = "INSERT INTO users(userid,user_role,password,passwordWithoutEncryption,last_login,status) VALUES ('$userId',2,'$encryptedPassword','$password',NULL,1)";
        $sql2 = "INSERT INTO user_values(fname,lname,email,class,section,address,mobile_no,password,passwordWithoutEncryption) VALUES ('$fname','$lname','$email','$class','$section','$address','$mobileNo','$encryptedPassword','$password')";
        if ((!mysqli_query($conn, $sql1)) || (!mysqli_query($conn, $sql2))) {
            echo "Error: " . "<br>" . mysqli_error($conn);
        }
        $sql3 = "UPDATE user_values INNER JOIN users ON user_values.password = users.password SET user_values.id = users.id";
        if (!mysqli_query($conn, $sql3)) {
            echo "Error: " . "<br>" . mysqli_error($conn);
        }
        
        //mysqli_close($conn);
        header('Refresh: 10; URL= index.php');
    }
    mysqli_close($conn);
?>