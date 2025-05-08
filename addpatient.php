<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient Record - Medagrama</title>
    <style>
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
            position: relative;
            padding: 15px 20px;
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
            margin: 30px auto;
            width: 90%;
            max-width: 800px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        h2 {
            font-size: 24px;
            color: #4CAF50;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select,
        .form-group input[type="date"] {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .form-group button {
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 12px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #45a049;
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

        .alert-message {
            background-color: #eafaf1;
            color: #2e7d32;
            border: 1px solid #81c784;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            display: none; /* Hidden by default; can be displayed dynamically via JavaScript */
        }
    </style>
</head>
<body>
<div class="header">
    <a href="dindex.php" class="home-button">Home</a>
    <h1>Medagrama</h1>
    <a href="dlogout.php" class="logout">Logout</a>
</div>

<div class="container">
    <h2>Add Patient Record</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="case_no">Case No.</label>
            <input type="text" id="case_no" name="case_no" placeholder="Enter case number" required>
        </div>

        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname" placeholder="Enter first name" required>
        </div>
        <div class="form-group">
            <label for="middlename">Middle Name</label>
            <input type="text" id="middlename" name="middlename" placeholder="Enter middle name">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname" placeholder="Enter last name" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="" disabled selected>Select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" placeholder="Enter age" required>
        </div>
        <div class="form-group">
            <label for="contact_no">Contact No.</label>
            <input type="text" id="contact_no" name="contact_no" placeholder="Enter contact number" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
            <button type="submit" name="submit">Add Record</button>
        </div>
    </form>
</div>
<footer>
    <p>&copy; 2024 Medagrama - All rights reserved</p>
</footer>

<?php
if(isset($_POST['submit'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "doctor_login_db";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO patient_records (case_no, firstname, middlename, lastname, gender, age, contact_no, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $case_no, $firstname, $middlename, $lastname, $gender, $age, $contact_no, $date);

    $case_no = $_POST['case_no'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact_no = $_POST['contact_no'];
    $date = $_POST['date'];

    if ($stmt->execute()) {
        echo "<script>alert('New record added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();

    $conn->close();
}
?>
</body>
</html>