<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    
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
            text-align: center;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
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
            font-size: 1.2em;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #ffd700; 
        }

        h1 {
            text-align: center;
            font-size: 2.5em; 
            margin-bottom: 20px;
            color: #1a4f7a; 
        }

        p {
            margin-bottom: 10px;
        }

        .map-container {
            margin-top: 20px;
            text-align: center;
        }

        iframe {
            border: 0;
            width: 100%;
            max-width: 600px;
            height: 400px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Contact</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="hotels.php">Hotels</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="administrator/login.php">Admin</a></li>
                </ul>
            </nav>
        </div>
    </header>
        <p>Pentru orice întrebări sau informații, nu ezitați să ne contactați:</p>
        <p>Email: <a href="mailto:bl4dimir01@gmail.com">bl4dimir01@gmail.com</a></p>
        <p>Telefon: <a href="tel:+40727835529">0727 835 529</a></p>
        
        <div class="map-container">
            <h2>Locație</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2280.6683258516105!2d27.572960199794053!3d47.17377518568962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2sUniversitatea%20%E2%80%9EAlexandru%20Ioan%20Cuza%E2%80%9D!5e0!3m2!1sro!2sro!4v1716493956620!5m2!1sro!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <a href="index.php" class="back-button">Inapoi</a>
    </div>
</body>
</html>
