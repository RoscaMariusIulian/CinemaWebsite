<?php
	session_start();
	$dbServername="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbName="bdproiect";
	$db = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	$ok=1;
	if(isset($_COOKIE['imdb_id']))
	{
		$imdb_id= $_COOKIE['imdb_id'];
		$title=$_COOKIE['title'];
		$genre=$_COOKIE['genre'];
		$imdbRating=$_COOKIE['imdbRating'];
		$releasedate=$_COOKIE['releasedate'];
		$curentuser=$_SESSION['user'];
		setcookie('imdb_id', '', 1);
		setcookie('title', '', 1);
		setcookie('genre', '', 1);
		setcookie('imdbRating', '', 1);
		setcookie('releasedate', '', 1);
		$sql="SELECT * FROM user_db WHERE username='$curentuser' LIMIT 1";
		$response = mysqli_query($db, $sql);
		$response1=mysqli_fetch_assoc($response);
		if($response1)
		{
			$myuserid=$response1['user_id'];
		}			
		$myimdb = mysqli_real_escape_string($db,$imdb_id);
		$mytitle = mysqli_real_escape_string($db,$title);
		$mygenre = mysqli_real_escape_string($db,$genre);
		$myrating = mysqli_real_escape_string($db,$imdbRating);	
		$myreleasedate = mysqli_real_escape_string($db,$releasedate);
		$security_check_query = "SELECT title,user_idm FROM user_movies WHERE title='$mytitle' and user_idm='$myuserid' LIMIT 1";
		$result = mysqli_query($db, $security_check_query);
		$count = mysqli_num_rows($result);
		if($count == 1) 
		{ 
			$_SESSION['msj'] = "Already in database";
		}
		else
		{
		$query1 = "INSERT INTO user_movies (user_idm,title,imdb_id, status) 
				  VALUES('$myuserid','$mytitle', '$myimdb', 'Unseen')";
		mysqli_query($db, $query1);
		$query = "INSERT INTO movies_info (imdb_code, title, genre, imdb_rating, release_date) 
				  VALUES('$myimdb', '$mytitle', '$mygenre' , '$myrating' ,(STR_TO_DATE('$myreleasedate','%d %b %Y')))";
		mysqli_query($db, $query);
		}
		
	}
	$curentuser=$_SESSION['user'];
	$sql="SELECT * FROM user_db WHERE username='$curentuser' LIMIT 1";
	$response = mysqli_query($db, $sql);
	$response1=mysqli_fetch_assoc($response);
	if($response1)
	{
		$myuserid=$response1['user_id'];
	}	
	//$sql = "SELECT title,genre,imdb_rating,DATE_FORMAT(release_date ,'%d %b %Y') as release_date FROM movies_info;";
	$sql="select m.title as title,m.genre as genre,m.imdb_rating as imdb_rating,DATE_FORMAT(m.release_date ,'%d %b %Y') as release_date,u.status as status from user_movies u, movies_info m where u.imdb_id=m.imdb_code and $myuserid=u.user_idm ;";
	$result = mysqli_query($db,$sql);
	$_SESSION['moviedel']=$myuserid;
    
?>
<table class="table table-dark">
			<thead>
				<tr>
					<th scope="col">Title</th>
					<th scope="col">Genre</th>
					<th scope="col">Imdb rating</th>
					<th scope="col">Release date</th>
					<th scope="col">Status</th>
					<th scope="col">Sterge</th>
					
				</tr>
			</thead>
			<tbody>
			<?php
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr scope=&quot;row&quot;>";
					echo "<td>".$row['title']."</td>";
					$_SESSION['title']=$row['title'];
					echo "<td>".$row['genre']."</td>";
					echo "<td>".$row['imdb_rating']."</td>";
					echo "<td>".$row['release_date']."</td>";
					if($row['status']=='Unseen')
						echo "<td><form action='modify.php' method='post'><input type='submit' class='modifyred' name='modify' value='".$row['title']."' /></form></td>";
					else
						echo "<td><form action='modify.php' method='post'><input type='submit' class='modifygreen' name='modify' value='".$row['title']."' /></form></td>";
					echo "<td><form action='deletemovie.php' method='post'><input type='submit' name='delete' class= 'classbutton' value='".$row['title']."' /></form></td>";			
					echo "</tr>";
				}					
			?>
			</tbody>
		</table>