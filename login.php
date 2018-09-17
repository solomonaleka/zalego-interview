<?php
session_start();
include 'config.php';


if(isset($_POST['submit'])) {
    $username=mysqli_real_escape_string($db_conn,$_POST['username']);
    $password=mysqli_real_escape_string($db_conn,$_POST['password']);

    //sanitizing user data
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

			$qry="SELECT * FROM user WHERE username='$username' AND password='$password' ";
			$result = mysqli_query($db_conn, $qry);
			if($result){
				if(mysqli_num_rows($result) >= 1 ){
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    echo "<script> window.location.href=\"welcome.php\"; </script>";
				}
				else{
					echo "<script> window.location.href=\"error.php\"; </script>";
            }
        }
		
		
		
        
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>The Registration Form</title>
    <script language="javascript" type="text/javascript" src="login.js"></script>

    <style>

    input[type=text] {
    width: 300px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    }
    input[type=password] {
    width: 300px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    }
    input[type=submit]{
    background-color: blue;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 160px;
    cursor: pointer;
}
    </style>
</head>

<body bgcolor="pink">


<div class="container">    
<form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return(validate());">
    <h1 style="margin-left:150px;"> Login </h1>

        <label for="username">Username</label>
        <input type="text" name="username">
        <br />

        <label for="password">Password</label>
        <input type="password" name="password">
        <br />

        <input type="submit" name="submit" value="submit">
</form>
</div>

</body>

</html>