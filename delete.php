<?php
	session_start();
	$dbServername="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbName="bdproiect";
	$db = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	$myuserid=$_POST['deleteusr'];
	$sql="delete from user_movies where user_idm='$myuserid';";
	$result = mysqli_query($db, $sql);
	$sql="delete from user_info where user_number='$myuserid';";
	$result1 = mysqli_query($db, $sql);
	$sql="delete from user_db where user_id='$myuserid';";
	$result2 = mysqli_query($db, $sql);
	header("Location:http://localhost:8080/Proiect/index.php");
?> 