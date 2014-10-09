l<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Create Project</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="signin.css" />

</head>

<body>
    <div class="container" style="text-align:center">
        <h1>Create New Project</h1>
        <form class="form-signin" action="newproject.php" method="post" id="myForm">
            <div class="form-group">
                <label class="col-sm-4 control-label">Project Name: </label>
                <div class="col-sm-8">
                  <input class="form-control" type="text" name="projectname" id="project_name"/>
                </div>
              </div>
            
            StartDate:  <input class="form-control" type="text" name="startdate" id="datepicker1"/>
            EndDate:    <input class="form-control" type="text" name="enddate" id="datepicker2"/><br>
            Description:<br>
            <textarea class="form-control" id="textarea" name="description" cols="50" rows="4"></textarea><br>
            <input class="btn btn-danger btn-md" type="submit" value="Post" id="submit" name="create">
            <input class="btn btn-md" type="submit" value="Back to Main Page" name="back"><br>
        </form>
        
    </div>

    <?php
        include_once('database.php');
        session_start();
        if(isset($_POST['create'])){
            $username=$_SESSION['user'];
            $name = $_POST['projectname'];
            $start_date = $_POST['startdate'];
            $end_date = $_POST['enddate'];
            $description = $_POST['description'];
            if($name!==""&&$start_date!==""&&$end_date!==""&&$description!==""){
                if(mysql_query("INSERT INTO projects VALUES('','$username','$name','$start_date','$end_date','$description')")) 
                    echo "<h2>success</h2>";
                else 
                    echo "<h2>failed</h2>";
            }
            else echo "<h2>Please complete the form!</h2>";
        }
            if(isset($_POST['back'])){
                header("Location:manager_index.php"); 
            }
?>
    <script>
        $( "#datepicker1" ).datepicker({dateFormat:"yy-mm-dd"});
        $("#datepicker1").datepicker("option","dateFormat","yy-mm-dd");
        $( "#datepicker2" ).datepicker({dateFormat:"yy-mm-dd"});
        $("#datepicker2").datepicker("option","dateFormat","yy-mm-dd");
    </script>

</body>
</html>