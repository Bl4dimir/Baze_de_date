<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelurile noastre</title>
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

        .content {
            background: linear-gradient(45deg, #4b8bbe, #2e5d81);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .content h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #fff;
            text-align: center;
        }

        .filter-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .filter-buttons button {
            background-color: #ffd700; 
            color: #1a4f7a; 
            border: none;
            padding: 15px 30px;
            font-size: 1.2em;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 50px;
            margin: 0 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .filter-buttons button:hover {
            background-color: #ffc107;
        }

        footer {
            background-color: #1a4f7a; 
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        footer p {
            margin: 0;
        }

        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-container input[type=text] {
            padding: 10px;
            width: 300px;
            border-radius: 20px;
            border: 1px solid #ccc;
        }

        .search-container button {
            padding: 10px 20px;
            border: none;
            background-color: #ffd700;
            color: #1a4f7a;
            border-radius: 20px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #ffc107;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Hotelurile noastre</h1>
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

    <div class="container">
        <section class="content">
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Caută hotel după nume...">
                <button onclick="searchHotel()">Caută</button>
            </div>

            <h2>Filter Hotels</h2>
            <div class="filter-buttons">
                <button id="createButton">Add Hotel</button>
                <button id="allHotelsButton">All Hotels</button>
            </div>
        </section>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 Traveling in Iași. All rights reserved.</p>
        </div>
    </footer>

    <script>

        function searchHotel() {
            var input, filter, hotels, hotel, name, i;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            hotels = document.querySelectorAll('.hotel');
            
            for (i = 0; i < hotels.length; i++) {
                hotel = hotels[i];
                name = hotel.querySelector('.hotel-info h3');
                if (name.innerText.toUpperCase
                .toUpperCase().indexOf(filter) > -1) {
                    hotel.style.display = '';
                } else {
                    hotel.style.display = 'none';
                }
            }
        }

        document.getElementById('createButton').onclick = function() {
            location.href = 'administrator/admin_methods/create.php';
        };
        document.getElementById('allHotelsButton').onclick = function() {
            location.href = 'administrator/admin_methods/all.php';
        };

    </script>
</body>
</html>
