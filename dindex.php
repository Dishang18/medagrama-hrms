<?php 
session_start();

	include("dconnection.php");
	include("dfunctions.php");

	$doctor_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <style>
        /* General Reset */
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
            background: linear-gradient(to bottom, #4CAF50, #f2f2f2);
        }

        .header {
            background-color: #4CAF50;
            color: #ffffff;
            text-align: center;
            padding: 15px 20px;
            position: relative;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .home-button, .logout {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }

        .home-button {
            left: 20px;
        }

        .logout {
            right: 20px;
        }

        .home-button:hover, .logout:hover {
            text-decoration: underline;
        }

        .container {
            flex: 1;
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .nav {
            margin-bottom: 20px;
        }

        .nav ul {
            display: flex;
            justify-content: space-around;
            list-style: none;
            padding: 10px;
            background-color: #4CAF50;
            border-radius: 10px;
        }

        .nav ul li {
            margin: 0 15px;
        }

        .nav ul li a {
            color: #ffffff;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        .nav ul li a:hover {
            background-color: #ffffff;
            color: #4CAF50;
        }

        .dashboard {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .dashboard h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 15px;
        }

        .dashboard p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
        }

        .highlight {
            font-size: 24px;
            color: #4CAF50;
            font-weight: bold;
            margin-top: 10px;
        }

        footer {
            text-align: center;
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
        <a href="dindex.php" class="home-button">Home</a>
        <h1>Medagrama</h1>
        <a href="medagrama.php" class="logout">Logout</a>
    </div>

    <div class="container">
        <div class="nav">
            <ul>
                <li><a href="#" class="active">Dashboard</a></li>
                <li><a href="addpatient.php">Add Patient</a></li>
                <li><a href="allrecords.php">All Records</a></li>
                <li><a href="viewrecords.php">View Record</a></li>
                <li><a href="editrecords.php">Edit Record</a></li>
            </ul>
        </div>

        <div class="dashboard">
            <h2>Welcome Back, <span class="highlight">Dr. <?php echo $doctor_data['doctor_name']; ?></span></h2>
            <p>We’re glad to have you here. This is your central hub for managing patient records, scheduling appointments, and staying updated. Explore the features in the navigation menu to get started.</p>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Medagrama - All rights reserved</p>
    </footer>
</body>
</html>