<?php
	session_start();
	$dbServername="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbName="bdproiect";
	$db = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	$sql="select d.user_id,d.username, i.user_firstname, i.user_lastname, DATE_FORMAT(i.user_birthdate ,'%d %b %Y') as user_birthdate from user_db d, user_info i where d.user_id=i.user_number";
	$result = mysqli_query($db, $sql);
?> 
<table class="table table-dark">
			<thead>
				<tr>
					<th scope="col">UserID</th>
					<th scope="col">Username</th>
					<th scope="col">First name</th>
					<th scope="col">Last name</th>
					<th scope="col">Birth date</th>
					<th scope="col">Delete</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$count=0;
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr scope=&quot;row&quot;>";
					//echo "<td>".$row['user_id']."</td>";
					echo "<td>".$count;"</td>";
					echo "<td>".$row['username']."</td>";
					echo "<td>".$row['user_firstname']."</td>";
					echo "<td>".$row['user_lastname']."</td>";
					echo "<td>".$row['user_birthdate']."</td>";
					echo "<td><form action='delete.php' method='post'><input type='submit' class= 'classbutton' name='deleteusr' value='".$row['user_id']."' /></form></td>";
					echo "</tr>";	
					$count=$count+1;
				}					
			?>
			</tbody>
		</table>