<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient Records by Contact Number - Medagrama</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #4CAF50, #f2f2f2);
            color: #333;
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
            margin: 40px auto;
            width: 90%;
            max-width: 800px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            color: #4CAF50;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            font-size: 14px;
            color: #555;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .no-records {
            text-align: center;
            padding: 20px;
            font-size: 16px;
            color: #888;
        }

        footer {
            background-color: #4CAF50;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="header">
    <a href="dindex.php" class="home-button">Home</a>
    <h1>Medagrama - View Patient Records</h1>
    <a href="medagrama.php" class="logout">Logout</a>
</div>

<div class="container">
    <h2>View Patient Records</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="contact_no">Enter Contact Number:</label>
            <input type="text" id="contact_no" name="contact_no" placeholder="Enter patient contact number" required>
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
            echo "<div class='no-records'>No records found for the provided contact number.</div>";
        }

        // Close connection
        $conn->close();
    }
    ?>
</div>

<footer>
    <p>&copy; 2024 Medagrama - All rights reserved</p>
</footer>
</body>
</html>