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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Set minimum height to ensure the footer stays at the bottom */
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


        .header h1 {
            margin: 0 auto; /* Center the header text */
        }

        .logout {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            color: #ffffff;
            text-decoration: none;
        }

        .container {
            flex: 1; /* Fill remaining vertical space */
            width: 100%;
            max-width: 1200px; /* Limit the width of the container */
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Add horizontal scroll if needed */
        }

        .nav {
            background-color: #4CAF50;
            color: #ffffff;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .nav ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
            text-align: center;
        }

        .nav ul li {
            display: inline;
            margin-right: 10px;
        }

        .nav ul li a {
            color: #ffffff;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
        }

        .nav ul li a:hover {
            background-color: #ffffff;
            color: #4CAF50;
        }

        .dashboard {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #dddddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: #ffffff;
        }

        .add-button {
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .add-button:hover {
            background-color: #45a049;
        }

        .footer {
            background-color: #4CAF50;
            color: #ffffff;
            text-align: center;
            /* padding: 5px 20px; */
            width: 100%;
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
                <li><a href="allrecords.php">All records</a></li>
                <li><a href="viewrecords.php">View Record</a></li>
                <li><a href="editrecords.php">Edit Record</a></li>
            </ul>
        </div>

        <div class="dashboard">
            <!-- Content goes here -->
            <br>
            <h2>Hello, Dr. <?php echo $doctor_data['doctor_name']; ?></h2>
            <p>This is your dashboard. You can manage patient records from here.</p>
    
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Medagrama - All rights reserved</p>
    </footer>
</body>
</html>
