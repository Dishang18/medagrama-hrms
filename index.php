<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medagrama</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #4CAF50, #f2f2f2);
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 36px;
            margin: 0;
        }

        section {
            text-align: center;
            padding: 50px 20px;
        }

        section h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 30px;
        }

        .login-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .login-option {
            width: 250px;
            padding: 30px;
            text-align: center;
            background-color: white;
            border: 2px solid #4CAF50;
            border-radius: 15px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-option:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .login-option h2 {
            font-size: 22px;
            color: #4CAF50;
            margin: 0;
        }

        footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header h1 {
                font-size: 28px;
            }

            section h2 {
                font-size: 24px;
            }

            .login-option {
                width: 200px;
                padding: 20px;
            }

            .login-option h2 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Medagrama</h1>
    </header>

    <section>
        <h2>Choose Your Login Side</h2>
        <div class="login-container">
            <div class="login-option" onclick="location.href='dlogin.php'">
                <h2>Doctor Login</h2>
            </div>
            <div class="login-option" onclick="location.href='psignup.php'">
                <h2>Patient Login</h2>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Medagrama - All rights reserved</p>
    </footer> 

</body>
</html>