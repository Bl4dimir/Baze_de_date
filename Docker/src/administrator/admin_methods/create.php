<?php
require_once '../../connection.php';

if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

    $name = $_POST['name'];
    $location = $_POST['location'];
    $price_per_night = $_POST['price_per_night'];
    $stars = $_POST['stars'];
    $free_rooms = $_POST['free_rooms'];

    $imageName = $_FILES['image']['name'];
    $imageTemp = $_FILES['image']['tmp_name'];
    $imagePath = "../../images/" . $imageName;

    if (!file_exists('../../images/')) {
        mkdir('../../images/', 0755, true);
    }

    if (move_uploaded_file($imageTemp, $imagePath)) {

        $sql = "INSERT INTO hotels (name, location, price_per_night, stars, free_rooms, image) VALUES (:name, :location, :price_per_night, :stars, :free_rooms, :image)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        $stmt->bindParam(':price_per_night', $price_per_night, PDO::PARAM_STR);
        $stmt->bindParam(':stars', $stars, PDO::PARAM_INT);
        $stmt->bindParam(':free_rooms', $free_rooms, PDO::PARAM_INT);
        $stmt->bindParam(':image', $imageName, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Hotelul adaugat cu succes!<br> <a href='all.php'>Toate hotelurile</a>";
        } else {
            echo "Eroare la adaugat hotel.";
        }
    } else {
        echo "Eroare imagine";
    }

}
?>


<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Adaugare Hotel</title>
    <link rel="stylesheet" href="../../styles1.css">
</head>
<body>
    <div>
    <h1>Adaugare Hotel Nou</h1>
    
    <form action="create.php" method="post" enctype="multipart/form-data">
        <label for="name">Nume Hotel:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="location">Locație (Adresă):</label>
        <input type="text" id="location" name="location" required><br><br>
        
        <label for="price_per_night">Preț pe noapte:</label>
        <input type="text" id="price_per_night" name="price_per_night" required><br><br>
        
        <label for="stars">Stele:</label>
        <input type="number" id="stars" name="stars" min="1" max="5" required><br><br>
        
        <label for="free_rooms">Camere disponibile:</label>
        <input type="number" id="free_rooms" name="free_rooms" required><br><br>

        <label for="image">Imagine Hotel:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        
        <button type="submit">Adauga Hotel</button>
    </form>
    <a href="../../hotels.php" class="back-button">Inapoi</a>
</div>
</body>
</html>
