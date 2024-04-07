<?php 
session_start();

	include("pconnection.php");
	include("pfunctions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$patient_name = $_POST['patient_name'];
		$password = $_POST['password'];

		if(!empty($patient_name) && !empty($password) && !is_numeric($patient_name))
		{

			//save to database
			$patient_id = random_num(20);
			$query = "insert into patients (patient_id,patient_name,password) values ('$patient_id','$patient_name','$password')";

			mysqli_query($con, $query);

			header("Location: plogin.php");
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
	<title>Signup</title>
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
    <h2>Patient Signup</h2>
</div>  
    <br>
    <br>
    <br>
    <br>
	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
			<h3>Patient Name</h3>
			<input id="text" type="text" name="patient_name"><br><br>
			<h3>Password</h3>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="plogin.php">Click to Login</a><br><br>
		</form>
	</div>
	<footer>
        <p>&copy; 2024 Medagrama - All rights reserved</p>
    </footer>
	
</body>
</html>