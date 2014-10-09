<?php
include_once('database.php');
header("Content-Type: application/json");

session_start();
ini_set("session.cookie_httponly", 1);
$username = $_SESSION['user'];

$project = mysql_real_escape_string( $_POST["title"] );

    $sql = "DELETE FROM workers WHERE (worker='$username' AND project='$project');";
    $result = mysql_query($sql);
    $sql1 = "DELETE FROM timesheets WHERE (username='$username' AND project='$project');";
    $result1 = mysql_query($sql1);
    
    if( $result && $result1) {
	echo json_encode(array(
	    "success" => true
	));
	exit();
    } else {
	echo json_encode(array(
	    "success" => false,
            "message" => "You did not quit the project"
	));
	exit();
    }


?>