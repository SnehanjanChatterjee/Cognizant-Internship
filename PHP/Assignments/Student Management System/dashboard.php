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

// $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 2;
$limit = 2;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql_all_students = "SELECT * FROM user_values ORDER BY id LIMIT $start, $limit";
$result_all_students = mysqli_query($conn, $sql_all_students);
$students = mysqli_fetch_all($result_all_students, MYSQLI_ASSOC);

$sql_count_id = "SELECT count(id) AS id FROM user_values";
$result_count_id = mysqli_query($conn, $sql_count_id);
$studentCount = mysqli_fetch_all($result_count_id, MYSQLI_ASSOC);

// $result = $conn->query("SELECT * FROM customers LIMIT $start, $limit");
// $customers = $result->fetch_all(MYSQLI_ASSOC);

// $result1 = $conn->query("SELECT count(id) AS id FROM customers");
// $custCount = $result1->fetch_all(MYSQLI_ASSOC);

$total = $studentCount[0]['id'];
$pages = ceil( $total / $limit );

$Previous = $page - 1;
$Next = $page + 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">

    <!-- Custom css -->
    <link rel="stylesheet" href="./css/dashboard.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/a747dc4c23.js" crossorigin="anonymous"></script>

    <title>Dashboard</title>
</head>

<body>
    <div class="container jumbotron my-dashboard">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h2 style="text-align: center;">STUDENT DASHBOARD</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Last Logon : <span id="last_logon"><?php echo $_SESSION['last_logon']?></span> </h5>
                        <h5>Name : <span id="name"><?php echo $_SESSION['name']?></span> </h5>
                        <h5>Class : <span id="class"><?php echo $_SESSION['class']?></span> </h5>
                        <h5>Section : <span id="section"><?php echo $_SESSION['section']?></span> </h5>
                        <h5>Approval Status : <span
                                id="approval_status"><?php echo $_SESSION['approval_status']?></span> </h5>
                    </div>
                    <div class="col-lg-6 text-center" style="margin: auto;">
                        <button type="button" name="myProfileBtn" id="myProfileBtn" class="btn btn-primary">MY PROFILE
                            <i class="fas fa-id-badge"></i></button>
                        <button type="button" name="SignOutBtn" id="SignOutBtn" class="btn btn-primary">SIGN OUT <i
                                class="fas fa-sign-out-alt"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container jumbotron my-pagination-container">
        <!-- Pagination header -->
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">ALL STUDENT DETAILS</h1>
            </div>
        </div>
        <!-- Pagination Buttons -->
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                        <!-- Previous Button -->
                        <li class="page-item">
                            <!-- <a href="dashboard.php?page=<?php //echo($Previous); ?>" aria-label="Previous"> -->
                            <a class="page-link" href="
                            <?php if($Previous > 0){
                                echo('dashboard.php?page='.$Previous);
                            }else{
                            echo("#");}?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo; Previous</span>
                            </a>
                        </li>
                        <!-- Page Nos -->
                        <?php for($i = 1; $i<= $pages; $i++) : ?>
                            <li class="page-item">
                                <a class="page-link" href="dashboard.php?page=<?php echo($i); ?>"><?php echo($i); ?></a>
                            </li>
                        <?php endfor; ?>
                        <!-- Next Button -->
                        <li class="page-item">
                            <a class="page-link" href="dashboard.php?page=<?php echo($Next); ?>" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Pagination Buttons ends -->

        <!-- Table -->
        <div style="height: 600px; overflow-y: auto;">
            <table id="" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">NAME</th>
                        <th class="text-center">EMAIL</th>
                        <th class="text-center">MOBILE NO.</th>
                        <th class="text-center">CLASS</th>
                        <th class="text-center">SECTION</th>
                        <th class="text-center">ADDRESS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($students as $student) :  ?>
                    <tr>
                        <td class="text-center"><?php echo($student['id']); ?></td>
                        <td class="text-center"><?php echo($student['fname'] . " " . $student['lname']); ?></td>
                        <td class="text-center"><?php echo($student['email']); ?></td>
                        <td class="text-center"><?php echo($student['mobile_no']); ?></td>
                        <td class="text-center"><?php echo($student['class']); ?></td>
                        <td class="text-center"><?php echo($student['section']); ?></td>
                        <td class="text-center"><?php echo($student['address']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- Table ends -->
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="./js/dashboard.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    
    

</body>

</html>