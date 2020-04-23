<?php
// error_reporting(E_ALL);

// ini_set("display_errors", "On");

// ini_set("error_log", "/var/log/apache2/proj1_error");


$sclass = $_REQUEST['stu_class'];

// echo $class;
/*

Connect to your database
fetch the sections for your class

*/

$section = array('A', 'B', 'C');

// Converting Array to JSON format
echo json_encode($section);
// ["A","B","C"]

exit;

?>