<?php 
	session_start();
	$dbServername="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbName="bdproiect";
	$db = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	$ok=1;
	$username = mysqli_real_escape_string($db, $_POST['user']);
	$password_1 = mysqli_real_escape_string($db, $_POST['pass']);
	$password_2 = mysqli_real_escape_string($db, $_POST['pass1']);
	$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
	$birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);
	if ($password_1 != $password_2) 
	{
		$ok=0;
		$_SESSION['msj']= "Passwords do not match!";
		$message=$_SESSION['msj'];
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Location:../index.php");
	}
	
	$user_check_query = "SELECT * FROM user_db WHERE username='$username' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);
	if ($user) 
	{ 
		if ($user['username'] === $username) 
		{
			$ok=0;
			$_SESSION['msj']="Username already in use!";
			header("Location:../index.php");
		}
    }
	if($ok==1)
	{
	$query = "INSERT INTO user_db (username, pwd) 
  			  VALUES('$username', '$password_1')";
	mysqli_query($db, $query);
	$query1 = "INSERT INTO user_info (user_firstname, user_lastname,user_birthdate) 
  			  VALUES('$firstname', '$lastname', '$birthdate')";
	mysqli_query($db, $query1);
	$_SESSION['username'] = $username;
	header("Location:../index.php");
	}
	
?>