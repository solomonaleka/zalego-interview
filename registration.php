<?php
// declaring the variables and setting them to zero
$firstname=$lastname=$username=$password=$confirmpassword=" ";
include 'config.php';

//connection to the database..

// The Register button has been clicked, checking whether form data has been submitted
if(isset($_POST['submit'])) {

$firstname=mysqli_real_escape_string($db_conn,$_POST['firstname']);
$lastname=mysqli_real_escape_string($db_conn,$_POST['lastname']);
$username=mysqli_real_escape_string($db_conn,$_POST['username']);
$password=mysqli_real_escape_string($db_conn,$_POST['password']);

//sanitizing user data
$firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
$lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
$username = filter_var($username, FILTER_SANITIZE_STRING);
$password = filter_var($password, FILTER_SANITIZE_STRING);

if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
    echo "<script> alert('Only letters and white space allowed for First Name') </script>";
    echo "<script> window.location.href=\"registration.php\"; </script>";
    exit();
  } 
  
  if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
    echo "<script> alert('Only letters and white space allowed for Second Name') </script>";
    echo "<script> window.location.href=\"registration.php\"; </script>";
    exit();
  }
  
  if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
    echo "<script> alert('Only letters and white space allowed for Userame') </script>";
    echo "<script> window.location.href=\"registration.php\"; </script>";
    exit();
  }

    
    $sql="insert into user (firstname,lastname,username,password) values ('$firstname','$lastname','$username','$password')";
    $result=mysqli_query($db_conn,$sql);
    if($result){ //registering if statement
    echo "<script> alert('You have successfully created an account!!')</script>";
    } else{ //registering else statement
    echo "<script> alert('Error in storing the details!!')</script>";
    }



} // closing the if statement that checks whether form data has been submitted... 
mysqli_close($db_conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>The Registration Form</title>
    <script language="javascript" type="text/javascript" src="registration.js"></script>

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
    <h1 style="margin-left:150px;"> Sign Up </h1>

        <label for="firstname">Firstname</label>
        <input type="text" name="firstname">
        <br /> <br />
    
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname">
        <br /> <br />
    
        <label for="username">Username</label>
        <input type="text" name="username">
        <br /> <br />

        <label for="password">Password</label>
        <input type="password" name="password">
        <br />

        <input type="submit" name="submit" value="submit">
</form>
</div>

</body>

</html>