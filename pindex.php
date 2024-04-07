<?php 
session_start();

	include("pconnection.php");
	include("pfunctions.php");

	$patient_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient Records by Contact Number - Medagrama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .header {
            background-color: #4CAF50;
            color: #ffffff;
            /* padding: 20px; */
            text-align: center;
            position: relative;
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
            margin: 20px auto;
            width: 80%;
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
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        .footer {
            background-color: #4CAF50;
            color: #ffffff;
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
            padding: 10px 0;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Medagrama - View Patient Records by Contact Number</h1>
    <a href="medagrama.php" class="logout">Logout</a>
</div>

<div class="container">
    <h2>View Patient Records</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="contact_no">Enter Contact Number:</label>
            <input type="text" id="contact_no" name="contact_no" required>
        </div>
        <div class="form-group">
            <button type="submit">View Records</button>
        </div>
    </form>
    <?php
    if(isset($_POST['contact_no'])) {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "doctor_login_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $contact_no = $_POST['contact_no'];

        // Fetch data from the database based on contact number
        $sql = "SELECT * FROM patient_records WHERE contact_no='$contact_no'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Case No.</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Gender</th><th>Age</th><th>Contact No.</th><th>Date</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["case_no"]."</td>";
                echo "<td>".$row["firstname"]."</td>";
                echo "<td>".$row["middlename"]."</td>";
                echo "<td>".$row["lastname"]."</td>";
                echo "<td>".$row["gender"]."</td>";
                echo "<td>".$row["age"]."</td>";
                echo "<td>".$row["contact_no"]."</td>";
                echo "<td>".$row["date"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No records found for the provided contact number.";
        }

        // Close connection
        $conn->close();
    }
    ?>
</div>

<footer class="footer">
    <p>&copy; 2024 Medagrama - All rights reserved</p>
</footer>
</body>
</html>
