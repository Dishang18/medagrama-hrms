<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient Records - Medagrama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #4CAF50, #f2f2f2);
            margin: 0;
            padding: 0;
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
        .container {
            margin: 40px auto;
            width: 90%;
            max-width: 1200px;
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
            color: #ffffff;
            font-size: 16px;
        }
        td {
            font-size: 14px;
            color: #555;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
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
            echo "<tr><td colspan='8' class='no-records'>No records found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</div>

<footer>
    <p>&copy; 2024 Medagrama - All rights reserved</p>
</footer>
</body>
</html>