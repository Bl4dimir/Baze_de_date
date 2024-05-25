<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['username']) && isset($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === "admin" && $password === "admin") {

            header("Location: ../index.php");
            exit;
        } else {

            header("Location: login.php?error=invalid_credentials");
            exit;
        }
    } else {

        header("Location: login.php?error=missing_fields");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logare</title>
    <style>

        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        
        h2 {
            text-align: center;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
        }
        
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Logare</h2>
        <?php

        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            if ($error === 'invalid_credentials') {
                echo "<p>Parola gresita.</p>";
            } elseif ($error === 'missing_fields') {
                echo "<p>Completeaza campurile</p>";
            }

        }
        ?>

        <form action="login.php" method="post">
            <label for="username">Utilizator:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Parolă:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Logare">
        </form>
        <p>Nu ai cont? <a href="register.php">Înregistrează-te aici</a></p>
    </div>
</body>
</html>
