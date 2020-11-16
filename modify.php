<?php
	session_start();
	$dbServername="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbName="bdproiect";
	$db = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	$myuserid=$_SESSION['moviedel'];
	$title=$_POST['modify'];
	$sql="select status from user_movies where user_idm='$myuserid' and title='$title';";
	$result = mysqli_query($db, $sql);
	$user = mysqli_fetch_assoc($result);
	if($user['status']=='Watched')
	{
		$sql="update user_movies set status='Unseen' where user_idm='$myuserid' and title='$title';";
		$result = mysqli_query($db, $sql);
		
	}
	else
	{
		$sql="update user_movies set status='Watched' where user_idm='$myuserid' and title='$title';";
		$result = mysqli_query($db, $sql);
	}
	header("Location:http://localhost:8080/Proiect/index.php");
?> 