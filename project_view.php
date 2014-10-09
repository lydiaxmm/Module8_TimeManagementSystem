<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My TimeSheet</title>
    <!-- Bootstrap 
    <link href="bootstrap.min.css" rel="stylesheet" media="screen">
    -->
    <script src="//cdn.sencha.io/ext-4.2.0-gpl/ext.js"></script>
    <script src="jquery.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script type="text/javascript" src="calendarHelper.js"></script>
    <script type="text/javascript" src="displayProjects.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="signin.css" />
    
</head>
<body>
  <?php
    include_once('database.php');

    session_start();
    $username = $_SESSION['user'];
    echo "<h1>Welcome  $username</h1>";

  ?>


  <form action="logout.php" method="post" id="logout">
        <input type="submit" class="btn btn-md btn-danger" value="Logout"/>
  </form>
  <form method="get" action="http://ec2-107-22-9-201.compute-1.amazonaws.com:3456/index.html" target="_blank">
    <input type="submit" class="btn btn-md btn-info" id="mybutton" value="Group Chat">
  </form>


  <div class="container" id="allProjects">
    
  </div>

<div class="row" style="padding-top:30px"></div>
<div id="signedProjects" class="container">
    <br>
    <button class="btn btn-default btn-sm" id="prev_week_btn">previous</button>
    <button class="btn btn-default btn-sm" id="next_week_btn">next</button>
    <span id="display_dates"></span>
    <table class="table">
    <tr>
        <th >Project Name</th>
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

<p id="message"></p>
<p id="hours"></p>






 
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    

</body>
</html>