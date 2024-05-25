<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: register.php?error=invalid_email_format");
            exit;
        }
        if (strlen($password) < 8) {
            header("Location: register.php?error=password_too_short");
            exit;
        }
        $_SESSION['username'] = $username;
        header("Location: ../index.php");
        exit;
    } else {
        header("Location: register.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Înregistrare</title>
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
        input[type="email"],
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
            border:
            none;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Înregistrare</h2>
        <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            if ($error === 'invalid_email_format') {
                echo "<p>Adresa de email introdusă nu este într-un format valid.</p>";
            } elseif ($error === 'password_too_short') {
                echo "<p>Parola trebuie să conțină cel puțin 8 caractere.</p>";
            } elseif ($error === 'password_mismatch') {
                echo "<p>Parolele introduse nu coincid.</p>";
            }
        }
        ?>
        <form action="register.php" method="POST">
            <label for="username">Nume utilizator:</label>
            <input type="text" id="username" name="username" required><br><br>
            
            <label for="password">Parolă:</label>
            <input type="password" id="password" name="password" required><br><br>
            
            <label for="confirm_password">Confirmă parola:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br><br>

            <label for="email">Adresă de email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <input type="submit" value="Înregistrare">
        </form>
        <p>Ai deja un cont? <a href="login.php">Conectează-te aici</a>.</p>
    </div>
</body>
</html>
