<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveling in Iași - Home</title>
    <link rel="stylesheet" href="styles.css">
    <style>

        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 0;
        }

        header {
            background-color: #1a4f7a;
            color: #fff;
            padding: 20px 0;
        }

        header h1 {
            margin: 0;
            font-size: 3em; 
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.3em; 
            transition: color 0.3s ease; 
        }

        nav ul li a:hover {
            color: #ffd700; 
        }

        .hero {
            background-image: url('images/palat.jpg');
            background-position: center top;
            background-size: cover;
            color: #fff;
            padding: 150px 0; 
            text-align: center;
        }

        .hero h2 {
            font-size: 3.5em; 
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero p {
            font-size: 1.4em; 
        }

        footer {
            background-color: #1a4f7a;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Traveling in Iași</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="hotels.php">Hotels</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <?php
                
                if (isset($_SESSION['username'])) {
                    echo '<li><a href="administrator/logout.php">Logout</a></li>';
                    echo '<li>Salut ' . $_SESSION['username'] . '</li>'; //in lucru
                } else {
                    echo '<li><a href="administrator/login.php">Login</a></li>';
                }
                ?>
                </ul>
            </nav>
        </div>
    </header>
    <section class="hero">
        <div class="container">
            <h2>Welcome to Traveling in Iași</h2>
            <p>Discover the best hotels in Iași, Romania. From luxury accommodations to budget-friendly stays, find the perfect place to rest during your visit.</p>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>&copy; 2024 Traveling in Iași. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
