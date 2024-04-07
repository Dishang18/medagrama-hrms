<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient Records - Medagrama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .header {
            background-color: #4CAF50;
            color: #ffffff;
            text-align: center;
        }
        .home-button {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #ffffff;
            text-decoration: none;
        }
        .container {
            margin: 100px auto 20px auto; 
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
    <a href="dindex.php" class="home-button">Home</a>
    <h1>Medagrama - Patient Records</h1>
</div>

<div class="container">
    <h2>All Patient Records</h2>
    <table>
        <tr>
            <th>Case No.</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Contact No.</th>
            <th>Date</th>
        </tr>
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "doctor_login_db";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM patient_records";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["case_no"] . "</td>";
                echo "<td>" . $row["firstname"] . "</td>";
                echo "<td>" . $row["middlename"] . "</td>";
                echo "<td>" . $row["lastname"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>" . $row["contact_no"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No records found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</div>

<footer class="footer">
    <p>&copy; 2024 Medagrama - All rights reserved</p>
</footer>
</body>
</html>
