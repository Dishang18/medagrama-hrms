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
    background-color: #f2f2f2;
}

.header {
            background-color: #4CAF50;
            color: #ffffff;
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

.container {
    margin: 20px auto;
    width: 80%;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button[type="submit"] {
    background-color: #4CAF50;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    width: 100%;
}

button[type="submit"]:hover {
    background-color: #45a049;
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
    <h1>Medagrama - Edit Patient Record</h1>
</div>

<div class="container">
    <h2>Edit Patient Record</h2>
    <form action="#" method="GET">
        <div class="form-group">
            <label for="num_patients">Number of Patients:</label>
            <input type="number" id="num_patients" name="num_patients" min="1" required>
        </div>
        <button type="submit">Submit</button>
    </form>
    <?php
    if(isset($_GET['num_patients'])) {
        $num_patients = $_GET['num_patients'];
        ?>
        <h3>Enter Patient Data:</h3>
        <?php
        for($i = 1; $i <= $num_patients; $i++) {
            ?>
            <form action="#" method="GET">
                <div class="form-group">
                    <label for="contact_no<?php echo $i; ?>">Contact No. <?php echo $i; ?>:</label>
                    <input type="text" id="contact_no<?php echo $i; ?>" name="contact_no[]" required>
                </div>
                <!-- Add more fields for other patient details -->
            <?php
        }
        ?>
            <div class="form-group">
                <button type="submit" name="submit">Update Records</button>
            </div>
        </form>
        <?php
    }
    ?>
</div>

<footer class="footer">
    <p>&copy; 2024 Medagrama - All rights reserved</p>
</footer>

<?php
// Handle form submission
if(isset($_GET['submit'])) {
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

    // Get form data
    $contact_nos = $_GET['contact_no'];
    $num_patients = count($contact_nos);

    // Update records in database
    for($i = 0; $i < $num_patients; $i++) {
        $contact_no = $contact_nos[$i];
        // Update record in database
        // Add your update query here
    }

    echo "<script>alert('Records updated successfully');</script>";

    // Close connection
    $conn->close();
}
?>
</body>
</html>
