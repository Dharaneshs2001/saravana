<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
$ret=mysql_query("SELECT * FROM admin WHERE username='$username' and password='$password'");
$num=mysql_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";//
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <style type="text/css">
    	body{
    margin: 0;
    padding: 0;
    background: url(images/admin-bg.jpg);
    background-size: cover;
    font-family: sans-serif;
}

.loginBox{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 350px;
    height: 450px;
    padding: 50px;
    border-radius: 10px;
    box-sizing: border-box;
    background: rgba(0,0,0,.5);
}

.user{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
    position: absolute;
    top: calc(-100px/2);
    left: calc(50% - 50px);
}

h2{
    margin: 0;
    padding: 10px 0 20px;
    color: #efed40;
    text-align: center;
}

.loginBox p{
    margin: 0;
    padding: 0;
    font-weight: bold;
    color: #fff;
}

.loginBox input{
    width: 100%;
    margin-bottom: 20px;
}

.loginBox input[type="text"],
.loginBox input[type="password"]{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}

::placeholder{
    color: rgba(255,255,255,.5);
}

.loginBox input[type="submit"]{
    border: none;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
    background: #ff267e;
    cursor: pointer;
    border-radius: 20px;
}

.loginBox input[type="submit"]:hover{
    background: #efed40;
    color: #262626;
}

.loginBox a{
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    text-decoration: none;
}

    </style>
</head>
<body>
    <div class="loginBox">
        <img src="images/user-face.png" class="user">
        <h2>Hello Saravanan</h2>
        <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
        <form method="post">
            <p>User Name</p>
            <input type="text" name="username" placeholder="Enter User Name">
            <p>Password</p>
            <input type="password" name="password" placeholder="******">
            <input type="submit" name="submit" value="Sign In">
        </form>
    </div>
</body>
</html>