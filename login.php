<!DOCTYPE HTML>
<html>
<head>
    <title>LogIn Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="signin.css" />
</head>
<body>
<?php // login.php
include_once('database.php');
require_once 'openid.php';
$openid = new LightOpenID("ec2-107-22-9-201.compute-1.amazonaws.com");

if ($openid->mode) {
    if ($openid->mode == 'cancel') {
        echo "User has canceled authentication!";
    } elseif($openid->validate()) {
        $data = $openid->getAttributes();
        $id = $openid ->identity;
        $email = $data['contact/email'];
        $first = $data['namePerson/first'];
        $sql = "SELECT * FROM users WHERE (openid='$id')";
        $res = mysql_query($sql);
        $row = mysql_fetch_array($res);
        if($row) {
            $username = $row['username'];
            $category = $row['category'];
            session_start();
            $_SESSION['user'] = $username;
            echo "Welcome back".$username." you are ".$category;
            if($category === "worker") {
                header("Location:project_view.php");
                exit();
            } else {
                header("Location:manager_index.php");
                exit();
            }
            
        } else {
                //echo "Identity: $openid->identity <br>";
                //echo "Email: $email <br>";
                //echo "First name: $first";
                echo '<br>';
                echo '
                <div class="container"  style="text-align:center">
                    <h2 class="form-signin-heading">Welcome '.$first.' ! You are one step away!</h2>
                        <form class="form-signin" action = "newUser.php" method = "POST">
                        <input type ="hidden" name = "openid" value = "'.$id.'" >
                        <input type ="hidden" name = "email" value = "'.$email.'" >
                        <input type ="text" class="form-control" name="username" placeholder="Username.." required autofocusname = "username"></br>
             
                        <select class="form-control input-lg" name="category">
                            <option selected>Choose your category</option>
                            <option value="manager">Manager</option>
                            <option value="worker">Worker</option>
                        </select></br>
                        <input type = "submit" class="btn btn-lg btn-danger btn-block" value = "Create New Account">
                    </form>
                </div>';
            }
        }
        
     else {
        echo "The user has not logged in";
    }
} else {
    echo "Go to index page to log in.";
}
?>
</body>
</html>
