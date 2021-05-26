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
	a {
	  text-decoration: none
	}
	a:link, a:visited {
	  color: black;
	}
	a:hover {
	  color: white;
	}
	.zero-r {
		text-align: center;
		color: #fff;
		font-size: 1.4rem;
	}
</style>
</head>
<body>
	<header>
		<h1>Register your product</h1>
		<form class='register-form' action="" method="POST">
			<input type='text' placeholder="Product Name" name='n' required>
			<input type='number' step="0.01" placeholder="Product Price" name='p' required>
			<button type='submit'>Submit</button>
		</form>
	</header>

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
		// Check params
		if (isset($_POST['n']) && isset($_POST['p'])) {
			// Check if item exists
			$pname = $_POST['n'];
			$pprice = $_POST['p'];
			$sql = "SELECT * FROM products WHERE pname=?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('s', $pname);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows == 0) {
				// Query the database (using prepared statement)			
				$sql = "INSERT INTO products (pname, pprice) VALUES(?, ?)";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('ss', $pname, $pprice);
				$stmt->execute();
				$result = $stmt->get_result();
				echo "<div class='zero-r'>Product registered successfully</div>";
			} else {
				echo "<div class='zero-r'>Product already exists</div>";
			}
			
			$stmt->close();
		}
		$conn->close();
		echo "<div class='zero-r'><a href='browse.php'>Back to browse</a></div>";
	?> 
</body>
</html>
