<!DOCTYPE html>
<html>
<head>
	<style>
	body{
		background: #333;
		font-family: sans-serif;
	}
	header {
		text-align: center;
		font-size: 1.5rem;
		margin: 2rem auto;
		color: #fff;
	}
	main {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
		gap: 70px 20px;
	}
	.item {
		margin: auto;
		padding:2rem 4rem;
		box-shadow: 0px 6px 12px rgb(0, 0, 0, .5);
		border-radius: 20px;
		/*border: 1px solid #000;*/
		background: #fff;
		width: 55%;
		height:100px;
		line-height: 100%;
		text-align: center;
		display: flex;
		justify-content: center;
		align-items: center;
		transition: all 0.2s;
	}
	.item:hover {
		transform: scale(1.2);
	}
	.item-text {
		font-size: 1.2rem;
		font-weight: 600;
	}
	.zero-r {
		text-align: center;
		color: #fff;
	}
</style>
</head>
<body>
	<header>
		<h1>Browse the store</h1>
		<form class='search-form' action="">
			<input type='text' placeholder="Search" name='s'>
			<button type='submit'>Search</button>
		</form>
	</header>

	<main>
	<?php
		$servername = "localhost";
		$username = "webapp";
		$password = "Complexity1!";
		$dbname = "store";

		// Connect
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		// Query the database (using prepared statement)
		$search = '%' . $_GET['s'] . '%';
		$sql = "SELECT * FROM products WHERE pname like ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('s', $search);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		    echo "<div class=\"item\"><div class=\"item-text\">" . $row["pname"]. "<br><br><br>" . $row["pprice"]. '$' . "</div></div>";
		  }

		} else {
		  echo "</main><div class='zero-r'>" . "0 results" . "</div>";
		}
		$conn->close();
	?> 
	</main>
</body>
</html>
