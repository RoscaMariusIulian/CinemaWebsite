<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ro-RO">
    <head>
		<title>Proiect BD</title>
		<link rel="stylesheet"  href="css/style3.css"/>
		<script src="js/script3.js"></script>
        <meta charset="utf-8"/>
	</head>
	<body onload='incarca("acasa.html");'>
	<?php
		if(isset($_SESSION['user']))
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
			</ul>
		</nav>";
		}
	?>	
	<?php
		
		if(isset($_SESSION['user']))
		{
			//echo "Bun venit, {$_SESSION['user']}!";
			echo "<section id='continut'></section>";
		}
		else
		{		
	?>
	<div class="login-card">
    <h1>Register</h1><br>
	  <form action="api/register.php" method="post">
		<input type="text" name="user" placeholder="Username" autocomplete="off">
		<input type="password" name="pass" placeholder="Password">
		<input type="password" name="pass1" placeholder="Repeat Password">
		<input type="text" name="firstname" placeholder="First name" autocomplete="off">
		<input type="text" name="lastname" placeholder="Last name" autocomplete="off">
		<input type="date" name="birthdate" placeholder="Birth date" autocomplete="off">
		<input type="submit" name="login" class="login login-submit" value="Register">
	  </form>
	</div>
	<?php
		}
	?>	
	<footer>
		&copy; 2019. Baze de date
	</footer>  
	</body>
</html>	