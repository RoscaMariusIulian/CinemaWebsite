<?php
	session_start();
	$dbServername="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbName="bdproiect";
	$db = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	
	$myusername = mysqli_real_escape_string($db,$_POST['user']);
    $mypassword = mysqli_real_escape_string($db,$_POST['pass']);	
	$sql = "SELECT username,pwd FROM user_db WHERE username = '$myusername' and pwd = '$mypassword'";
	$result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
    if($count == 1) {
		$_SESSION['user']=$myusername;
        header("Location:../index.php");
      }else {
        $_SESSION['msj'] = "Your Login Name or Password is invalid";
		 header("Location:../index.php");
      }
?>