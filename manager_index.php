<!DOCTYPE html>
<html>
<head>
    <title>Manager Index</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="signin.css" />
</head>

<body>
    <?php
    include_once('database.php');
    session_start();
    $username = $_SESSION['user'];
    ?>

<h1>Manager's Main Page</h1><br>

<form action="logout.php" method="post" id="logout">
    <input class="btn btn-md btn-danger" type="submit" value="Logout" />
</form>
<form method="get" action="http://ec2-107-22-9-201.compute-1.amazonaws.com:3456/index.html" target="_blank">
    <input type="submit" class="btn btn-md btn-info" id="mybutton" value="Group Chat">
  </form>

<div class="container">
	<form class="form-signin" action="newproject.php" method="post" id="createProject">
    <input type="submit" class="btn btn-danger btn-lg" value="Create Project" id="submit">
	</form>
<br>

<div id="allProjects"></div>
<?php

    echo '<table class="table table-striped">';
    echo '<tr id="title_row"><th>#</th>
    <th>Project Name</th>
    <th>Action</th>
    </tr>';
    $sql="select * from projects where manager='$username'";
    $qury=mysql_query($sql);
    while($row=mysql_fetch_array($qury)){
        echo "<tr>
    			<td>$row[id]</td>
    			<td><a href=/~GG/final_project/detail_edit.php?detail=$row[id]>$row[title]</a></td>
              	<td><a class='btn btn-default btn-md' href=/~GG/final_project/delete.php?del=$row[id]>Delete</a></td>
              </tr>";
     }
    echo '</table>';
?> 
</div>
</body>
</html>