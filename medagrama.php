<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medagrama</title>
    <link rel="stylesheet" href="medagrama.css">
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    color: green; 
}

header {
    background-color: #4CAF50; 
    padding: 10px;
    text-align: center; 
}

section {
   
    text-align: center;
    padding: 20px;
}

.login-container {
    display: flex;
    justify-content: space-around;
    padding-top: 5%;
}

.login-option {
    width: 200px;
    padding: 20px;
    text-align: center;
    border: 2px solid green;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login-option:hover {
    background-color: green;
}

footer {
    background-color: #4CAF50; 
    text-align: center;
    padding: 5px;
    position: absolute;
    bottom: 0;
    width: 100%;
}

    </style>
</head>
<body>

    <header>
        <h1>Medagrama</h1>
    </header>

    <section>
        <h2>Choose your login side.</h2>
        <div class="login-container">
            <div class="login-option" onclick="location.href='dlogin.php'">
                <h2>Doctor Login</h2>
            </div>
            <div class="login-option" onclick="location.href=' psignup.php'">
                <h2>Patient Login</h2>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Medagrama - All rights reserved</p>
    </footer> 
</body>
</html>
