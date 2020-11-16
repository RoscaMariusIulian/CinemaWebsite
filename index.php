<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ro-RO">
    <head>
		<title>Proiect BD</title>
		<link rel="stylesheet"  href="css/style3.css" />
		<script src="js/script3.js"></script>
        <meta charset="utf-8"/>
	</head>
	<body onload='incarca("acasa.html");'>
	<?php
		if($_SESSION['user']=="admin")
		{
		echo "<header>
			<a href='api/logout.php'>
			<img src='imagini/logout1.png' alt='Logout' style='width: 35px; height: 35px;'/>
			</a>
			<p>{$_SESSION['user']}</p>
			<h1>Cinema City</h1>
		</header>";
		echo "<nav>
			<ul>
				<li><a onclick='incarca(&quot;acasa.html&quot;)'>Home</a></li>
				<li><a onclick='incarca(&quot;cauta.html&quot;)'>Search</a></li>
				<li><a onclick='incarca(&quot;admin.php&quot;)'>Admin Page</a></li>	
			</ul>
		</nav>";
		}
		else if(isset($_SESSION['user']))
		{
		echo "<header>
			<a href='api/logout.php'>
			<img src='imagini/logout1.png' alt='Logout' style='width: 35px; height: 35px;'/>
			</a>
			<p>{$_SESSION['user']}</p>
			<h1>Cinema City</h1>
		</header>";
		echo "<nav>
			<ul>
				<li><a onclick='incarca(&quot;acasa.html&quot;)'>Home</a></li>
				<li><a onclick='incarca(&quot;cauta.html&quot;)'>Search</a></li>
				<li><a onclick='incarca(&quot;user.php&quot;)'>User Page</a></li>		
			</ul>
		</nav>";
		}	
		if(isset($_SESSION['user']))
		{
			//echo "Bun venit, {$_SESSION['user']}!";
			echo "<section id='continut'></section>";
		}
		else
		{		
	?>
	<div class="login-card">
    <h1>Log-in</h1><br>
	  <form action="api/login.php" method="post">
		<input type="text" name="user" placeholder="Username" autocomplete="off">
		<input type="password" name="pass" placeholder="Password">
		<input type="submit" name="login" class="login login-submit" value="Login">
		<a href="registerpage.php"  name="register" class="register register-submit">Sign Up</a><br>
	  </form>
	</div>	
	<?php
		if(isset ($_SESSION['msj']))
		{
			$message = $_SESSION['msj'];
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		}
	?>	
	<footer>
		&copy; 2019. Baze de date
	</footer>  
	</body>
</html>	