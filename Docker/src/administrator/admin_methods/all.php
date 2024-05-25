<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Hotels</title>
    <link rel="stylesheet" href="styles.css">
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .hotel-card {
            width: 300px;
            margin: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .hotel-card:hover {
            transform: translateY(-5px);
        }

        .hotel-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .hotel-info {
            padding: 15px;
        }

        .hotel-info h3 {
            margin-bottom: 10px;
            color: #1a4f7a;
        }

        .hotel-info p {
            margin-bottom: 5px;
        }

        .hotel-info a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
            transition: color 0.3s;
        }

        .hotel-info a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        require_once '../../connection.php';

        $sql = "SELECT * FROM hotels";
        $result = $con->query($sql);

        if ($result->rowCount() > 0) {
            
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='hotel-card'>";
                echo "<div class='hotel-image'>";
                echo "<img src='../../images/{$row['image']}' alt='{$row['name']}'>";
                echo "</div>";
                echo "<div class='hotel-info'>";
                echo "<p>ID: {$row['id']}</p>";
                echo "<h3>{$row['name']}</h3>";
                echo "<p>Location: {$row['location']}</p>";
                echo "<p>Price per Night: {$row['price_per_night']}</p>";
                echo "<p>Stars: {$row['stars']}</p>"; 
                echo "<p>Available Rooms: {$row['free_rooms']}</p>"; 
                
                echo "<a href='edit.php?id={$row['id']}'>Edit</a>";
                echo "<a href='delete.php?id={$row['id']}' onclick=\"return confirm('Esti sigur ca vrei sa stergi acest hotel?');\">Delete</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>Nu s-au gasit hoteluri.</p>";
        }
        ?>
        <a href="../../hotels.php" class="back-button">Inapoi</a>
    </div>
</body>
</html>
