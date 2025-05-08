<?php 

session_start();

	include("dconnection.php");
	include("dfunctions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$doctor_name = $_POST['doctor_name'];
		$password = $_POST['password'];

		if(!empty($doctor_name) && !empty($password) && !is_numeric($doctor_name))
		{

			//read from database
			$query = "select * from doctors where doctor_name = '$doctor_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$doctor_data = mysqli_fetch_assoc($result);
					
					if($doctor_data['password'] === $password)
					{

						$_SESSION['doctor_id'] = $doctor_data['doctor_id'];
						header("Location: dindex.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Doctor Login</title>
	<style>
		/* General Styles */
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
			font-family: 'Arial', sans-serif;
		}

		body {
			display: flex;
			flex-direction: column;
			min-height: 100vh;
			margin: 0;
			background: linear-gradient(to bottom, #4CAF50, #ffffff);
			color: #333;
		}

		.header {
			background-color: #4CAF50;
			color: #ffffff;
			padding: 15px 20px;
			text-align: center;
			position: relative;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		}

		.home-button {
			position: absolute;
			top: 50%;
			left: 20px;
			transform: translateY(-50%);
			color: #ffffff;
			text-decoration: none;
			font-weight: bold;
		}

		.home-button:hover {
			text-decoration: underline;
		}

		#box {
			background-color: #ffffff;
			width: 350px;
			margin: 50px auto;
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
		}

		form {
			text-align: center;
		}

		form div {
			font-size: 18px;
			margin: 10px;
			color: #333;
			font-weight: bold;
		}

		input[type="text"],
		input[type="password"] {
			width: calc(100% - 20px);
			padding: 10px;
			margin-bottom: 15px;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 16px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 25px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			font-weight: bold;
			transition: 0.3s;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
			box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
		}

		a {
			color: #4CAF50;
			text-decoration: none;
			font-weight: bold;
			transition: 0.3s;
		}

		a:hover {
			color: #388E3C;
			text-decoration: underline;
		}

		h3 {
			font-size: 20px;
			color: #4CAF50;
			margin-bottom: 5px;
		}

		footer {
			text-align: center;
			margin-top: auto;
			padding: 10px 0;
			background-color: #4CAF50;
			color: white;
			font-size: 14px;
			box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
		}
	</style>
</head>
<body>

	<div class="header">
		<a href="medagrama.php" class="home-button">Home</a>
		<h2>Doctor Login</h2>
	</div>

	<div id="box">
		<form method="post">
			<div style="font-size: 24px; margin: 10px; color: #333; font-weight: bold;">Welcome Back</div>
			<h3>Doctor Name</h3>
			<input id="text" type="text" name="doctor_name" placeholder="Enter your name"><br>
			<h3>Password</h3>
			<input id="text" type="password" name="password" placeholder="Enter your password"><br>
			<input id="button" type="submit" value="Login"><br><br>
			<a href="dsignup.php">New here? Signup now</a>
		</form>
	</div>

	<footer>
		<p>&copy; 2024 Medagrama - All rights reserved</p>
	</footer>
</body>
</html>