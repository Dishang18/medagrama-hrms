<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient Record - Medagrama</title>
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
            padding: 15px 20px;
            position: relative;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
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
            margin: 30px auto;
            width: 90%;
            max-width: 800px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            color: #4CAF50;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        button[type="submit"] {
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
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
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
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            background-color: #eafaf1;
            color: #2e7d32;
            border: 1px solid #81c784;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="header">
    <a href="dindex.php" class="home-button">Home</a>
    <h1>Medagrama - Edit Patient Record</h1>
</div>

<div class="container">
    <h2>Edit Patient Record</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="contact_no">Enter Patient's Phone Number:</label>
            <input type="text" id="contact_no" name="contact_no" placeholder="Enter phone number" required>
        </div>
        <button type="submit" name="search">Search Record</button>
    </form>

    <?php
    if (isset($_POST['search'])) {
        $contact_no = $_POST['contact_no'];

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

        // Query to fetch patient record by phone number
        $stmt = $conn->prepare("SELECT * FROM patient_records WHERE contact_no = ?");
        $stmt->bind_param("s", $contact_no);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $patient = $result->fetch_assoc();
            ?>
            <h3>Update Patient Details:</h3>
            <form action="#" method="POST">
                <input type="hidden" name="original_contact_no" value="<?php echo $patient['contact_no']; ?>">
                <div class="form-group">
                    <label for="case_no">Case No.</label>
                    <input type="text" id="case_no" name="case_no" value="<?php echo $patient['case_no']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" value="<?php echo $patient['firstname']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" value="<?php echo $patient['lastname']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" id="gender" name="gender" value="<?php echo $patient['gender']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" value="<?php echo $patient['age']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="contact_no">Contact No.</label>
                    <input type="text" id="contact_no" name="contact_no" value="<?php echo $patient['contact_no']; ?>" required>
                </div>
                <button type="submit" name="update">Update Record</button>
            </form>
            <?php
        } else {
            echo "<div class='alert'>No record found for this phone number.</div>";
        }

        $stmt->close();
        $conn->close();
    }

    if (isset($_POST['update'])) {
        // Update the record in the database
        $original_contact_no = $_POST['original_contact_no'];
        $case_no = $_POST['case_no'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $contact_no = $_POST['contact_no'];

        // Database connection
        $conn = new mysqli("localhost", "root", "", "doctor_login_db");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("UPDATE patient_records SET case_no = ?, firstname = ?, lastname = ?, gender = ?, age = ?, contact_no = ? WHERE contact_no = ?");
        $stmt->bind_param("sssssss", $case_no, $firstname, $lastname, $gender, $age, $contact_no, $original_contact_no);

        if ($stmt->execute()) {
            echo "<div class='alert'>Record updated successfully.</div>";
        } else {
            echo "<div class='alert'>Error updating record: " . $stmt->error . "</div>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</div>

<footer>
    <p>&copy; 2024 Medagrama - All rights reserved</p>
</footer>
</body>
</html>