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

			//save to database
			$doctor_id = random_num(20);
			$query = "insert into doctors (doctor_id,doctor_name,password) values ('$doctor_id','$doctor_name','$password')";

			mysqli_query($con, $query);

			header("Location: dlogin.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Doctor Signup</title>
</head>
<body>

	<style type="text/css">
        body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
}

.header {
            background-color: #4CAF50;
            color: #ffffff;
            /* padding: 20px; */
            text-align: center;
            position: relative;
        }
        .home-button {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: #ffffff;
            text-decoration: none;
        }

#box {
    background-color: white;
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
}

form {
    text-align: center;
}

form div {
    font-size: 16px; /* Adjusted font size */
    margin: 10px;
    color: #4CAF50;
}

input[type="text"],
input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

a {
    color: #4CAF50;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

footer {
    text-align: center;
    margin-top: auto;
    /* padding:  ;  */
    background-color: #4CAF50;
    color: white;
    font-size: 15px; /* Adjusted font size */
}
	</style>
	
	<div class="header">
    <a href="medagrama.php" class="home-button">Home</a>
    <h2>Doctor Signup</h2>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
            <h3>Doctor Name</h3>
			<input id="text" type="text" name="doctor_name"><br><br>
            <h3>Password</h3>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="dlogin.php">Click to Login</a><br><br>
		</form>
	</div>
	<footer>
        <p>&copy; 2024 Medagrama - All rights reserved</p>
    </footer>
</body>
</html>