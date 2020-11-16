<?php
	session_start();
	$dbServername="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbName="bdproiect";
	$db = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	$myuserid=$_SESSION['moviedel'];
	$title=$_POST['delete'];
	$sql="delete from user_movies where user_idm='$myuserid' and title='$title';";
	$result = mysqli_query($db, $sql);
	header("Location:http://localhost:8080/Proiect/index.php");
?> 