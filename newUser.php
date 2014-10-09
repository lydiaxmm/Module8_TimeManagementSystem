
<?php

include_once('database.php');
$id = mysql_real_escape_string( $_POST["openid"] );
$username = mysql_real_escape_string( $_POST["username"] );
$category = mysql_real_escape_string( $_POST["category"] );
$email = mysql_real_escape_string( $_POST["email"] );
    
                   
    $sql = "INSERT INTO users (openid, username, email, category) VALUES('$id', '$username', '$email', '$category');";
    
    $result = mysql_query($sql);
    
    if( $result ) {
        session_start();
	$_SESSION['user'] = $username;
        if($category === "manager") {
           // ---- Edit these attributes
           $auth_token = 'OWI4Mzk2NjQ4ZjE5N2UxODQzODg1NzlmYTYyMmQxNzBlYWI4NzUyMTo5MzNlNWFjYTAwMjNjNjFkNGY4YTNmMzUxMjlmZTVlYzI0N2Q3OWYx';
           // Get from https://www.getvero.com/account
           $user_id = $email;
           $user_email = $email;
           $user_data = array('first_name' => $username, 'category' => $category);
           // ---- Example of making a REST call to Vero
           header("Location:manager_index.php");
            exit();
        } else {
            /*echo "
                <script type='text/javascript'>
                    _veroq.push(['user', {
                    // Required attributes
                    id: '1', 
                    email: 'tianqiqili@gmail.com'
                }]);
                _veroq.push(['track', 'Signs up']);
                </script>
            ";*/
            header("Location:project_view.php");
            exit();
        }
 
	//echo "Welcome ". $username. ". Now choose your project";
    }

?>
