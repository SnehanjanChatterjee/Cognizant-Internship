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
    $sql_password = "SELECT * FROM user_values WHERE passwordWithoutEncryption = '$password'";

  	$res_email = mysqli_query($conn, $sql_email);
    $res_mobile_no = mysqli_query($conn, $sql_mobile_no);
    $res_password = mysqli_query($conn, $sql_password);
      
    if((mysqli_num_rows($res_email) > 0) || (mysqli_num_rows($res_mobile_no) > 0) || (mysqli_num_rows($res_password) > 0)){
        if(mysqli_num_rows($res_email) > 0) {
            echo "Sorry... email already taken <br>";
            // header('Refresh: 2; URL= createAccount.php');
        }
        if(mysqli_num_rows($res_mobile_no) > 0){
                // $mobileNo_error = "Sorry... mobile number already taken <br>";
                echo "Sorry... mobile number already taken <br>";
                // header('Refresh: 2; URL= createAccount.php');
        }
        if(mysqli_num_rows($res_password) > 0){
                // $password_error = "Sorry... password already taken <br>";
                echo "Sorry... password already taken <br>";
                // header('Refresh: 2; URL= createAccount.php');
        }
        header('Refresh: 2; URL= createAccount.php');
    }
    else{

        //if (isset($_FILES["myfile"]["name"]))
        //{
            $filename = $_FILES['myfile']['name'];
            // $filetype = $_FILES["myfile"]["type"];
            // $filesize = $_FILES["myfile"]["size"];
            // $tempfile = $_FILES['myfile']['tmp_name'];
            $filenameWithDirectory = "F:/CTS Internship/PHP/Assignments/Student Management System/images/uploaded-file/".$filename;

            //echo("File name = ". $filename . "<br>");

            //echo("File name with dir. = ". $filenameWithDirectory . "<br>");
    
            $uploadOk = 1;
            $imageFileType = pathinfo($filenameWithDirectory,PATHINFO_EXTENSION);

            // echo("imageFileType = ". $imageFileType . "<br>");

            /* Valid Extensions */
            $valid_extensions = array("jpg","jpeg","png");

            /* Check file extension */
            if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
                $uploadOk = 0;
            }
            
            echo("uoploakOk = " . $uploadOk . "<br>");

            if($uploadOk == 0){
                //echo 0;
                echo "Invalid extension";
            }else{
                /* Upload file */
                if(move_uploaded_file($_FILES['myfile']['tmp_name'],$filenameWithDirectory)){

                    $sql1 = "INSERT INTO users(userid,user_role,password,passwordWithoutEncryption,last_login,status) VALUES ('$userId',2,'$encryptedPassword','$password',NULL,1)";
                    $sql2 = "INSERT INTO user_values(fname,lname,email,class,section,address,mobile_no,password,passwordWithoutEncryption,image) VALUES ('$fname','$lname','$email','$class','$section','$address','$mobileNo','$encryptedPassword','$password','$filename')";
                    //echo $filenameWithDirectory;
                }else{
                   //echo 0;
                   $sql1 = "INSERT INTO users(userid,user_role,password,passwordWithoutEncryption,last_login,status) VALUES ('$userId',2,'$encryptedPassword','$password',NULL,1)";
                   $sql2 = "INSERT INTO user_values(fname,lname,email,class,section,address,mobile_no,password,passwordWithoutEncryption) VALUES ('$fname','$lname','$email','$class','$section','$address','$mobileNo','$encryptedPassword','$password')";
                }
             }
        //}
        //else{

         //   $sql1 = "INSERT INTO users(userid,user_role,password,passwordWithoutEncryption,last_login,status) VALUES ('$userId',2,'$encryptedPassword','$password',NULL,1)";
         //   $sql2 = "INSERT INTO user_values(fname,lname,email,class,section,address,mobile_no,password,passwordWithoutEncryption) VALUES ('$fname','$lname','$email','$class','$section','$address','$mobileNo','$encryptedPassword','$password')";
        //}
        if ((!mysqli_query($conn, $sql1)) || (!mysqli_query($conn, $sql2))) {
            echo "Error: " . "<br>" . mysqli_error($conn);
        }

        $sql3 = "UPDATE user_values INNER JOIN users ON user_values.password = users.password SET user_values.id = users.id";
        if (!mysqli_query($conn, $sql3)) {
            echo "Error: " . "<br>" . mysqli_error($conn);
        }

        // $registrationSuccessful = "Successfully Registered!";
        $_SESSION['registrationSuccessful'] = "Successfully Registered!";

        //mysqli_close($conn);
        header('Refresh: 0; URL= index.php');
    }
    mysqli_close($conn);
?>