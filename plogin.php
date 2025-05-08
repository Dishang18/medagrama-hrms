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

			//read from database
			$query = "select * from patients where patient_name = '$patient_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$patient_data = mysqli_fetch_assoc($result);
					
					if($patient_data['password'] === $password)
					{

						$_SESSION['patient_id'] = $patient_data['patient_id'];
						header("Location: pindex.php");
						die;
					}
				}
			}
			
			echo "Wrong username or password!";
		}else
		{
			echo "Wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Patient Login</title>
	<style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background-color: #E3F2FD; /* Light sky blue background */
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #0288D1; /* Sky blue header */
            color: #ffffff;
            text-align: center;
            position: relative;
            padding: 15px 0;
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
            background-color: #ffffff; /* White background for the form */
            width: 350px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        form {
            text-align: center;
        }

        form div {
            font-size: 18px;
            margin: 10px;
            color: #0288D1; /* Sky blue text for headings */
            font-weight: bold;
        }

        h3 {
            color: #0288D1; /* Sky blue headings */
            font-size: 18px;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #0288D1; /* Sky blue button */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0277BD; /* Darker sky blue on hover */
        }

        a {
            color: #0288D1; /* Sky blue links */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            margin-top: auto;
            padding: 10px 0;
            background-color: #0288D1; /* Sky blue footer */
            color: white;
            font-size: 14px;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }
	</style>
</head>
<body>
    <div class="header">
        <a href="medagrama.php" class="home-button">Home</a>
        <h2>Patient Login</h2>
    </div>  

    <div id="box">
        <form method="post">
            <div>Login</div>
            <h3>Patient Name</h3>
            <input id="text" type="text" name="patient_name" placeholder="Enter your name"><br>
            <h3>Password</h3>
            <input id="text" type="password" name="password" placeholder="Enter your password"><br>
            <input id="button" type="submit" value="Login"><br><br>
            <a href="psignup.php">Click to Signup</a>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Medagrama - All rights reserved</p>
    </footer>
</body>
</html>