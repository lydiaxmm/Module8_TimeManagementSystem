<!DOCTYPE html>

<html>
<head>
    <title>Project Index</title>
    <script src="//cdn.sencha.io/ext-4.2.0-gpl/ext.js"></script>
    <script src="jquery.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script type="text/javascript" src="calendarHelper.js"></script>
    <script type="text/javascript" src="displayTimesheets.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="signin.css" />
</head>

<body>
<div class="col-md-10">
    <h1>Project Details</h1>
</div>
<div class="col-md-2">
<form action="manager_index.php" method="post" id="createProject">
    <input class="btn btn-danger btn-lg" type="submit" value="Back to Main Page" id="submit"><br>
</form>
</div>


<?php
session_start();
include_once('database.php');
$username=$_SESSION['user'];

if(isset($_GET['detail'])) {
    $id=$_GET['detail'];
    $res=mysql_query("SELECT * FROM projects WHERE id=$id");
    $row = mysql_fetch_array($res);
    if($row) {
        $title = $row['title'];
        $_SESSION['project'] = $title;
    }   
}
?>

<div class="row" style="padding-top:30px"></div>
<div id="project" class="container">
    <br>
    <button class="btn btn-default btn-sm" id="prev_week_btn">previous</button>
    <button class="btn btn-default btn-sm" id="next_week_btn">next</button>
    <span id="display_dates"></span>
    <table class="table">
    <tr>
        <th >Worker Name</th>
        <th >Sunday</th>
        <th >Monday</th>
        <th >Tuesday</th>
        <th >Wednesday</th>
        <th >Thursday</th>
        <th >Friday</th>
        <th >Saturday</th>
        <th >Action </th>
    </tr>
    </table>
    <table class="table" id="timesheet_table">
        
    </table>
</div>




</body>
</html>
