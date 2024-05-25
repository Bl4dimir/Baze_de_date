<?php
require_once '../../connection.php';

if (isset($_GET['id'])) {
    $hotel_id = $_GET['id'];
    
    $sql = "SELECT * FROM hotels WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $hotel_id, PDO::PARAM_INT);
    $stmt->execute();
    $hotel = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$hotel) {
        echo "Hotelul nu exista";
        exit;
    }
} else {
    echo "Probleme la ID hotel";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $price_per_night = $_POST['price_per_night'];
    $stars = $_POST['stars'];
    $free_rooms = $_POST['free_rooms'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
       
        $imageName = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $imagePath = "../../images/" . $imageName;
        
        if (move_uploaded_file($imageTemp, $imagePath)) {
            $sql = "UPDATE hotels SET price_per_night = :price_per_night, stars = :stars, free_rooms = :free_rooms, image = :image WHERE id = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':image', $imageName, PDO::PARAM_STR);
        } else {
            echo "Eroare imagine";
            exit;
        }
    } else {
        $sql = "UPDATE hotels SET price_per_night = :price_per_night, stars = :stars, free_rooms = :free_rooms WHERE id = :id";
        $stmt = $con->prepare($sql);
    }

    $stmt->bindParam(':price_per_night', $price_per_night, PDO::PARAM_STR);
    $stmt->bindParam(':stars', $stars, PDO::PARAM_INT);
    $stmt->bindParam(':free_rooms', $free_rooms, PDO::PARAM_INT);
    $stmt->bindParam(':id', $hotel_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Hotelul a fost actualizat cu succes!<br> <a href='all.php'>Toate hotelurile</a>";
    } else {
        echo "Eroare la actualizarea hotelului.";
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Editare Hotel</title>
    <link rel="stylesheet" href="../../styles1.css">
</head>
<body>
    <div>
    <h1>Editare Hotel</h1>
    <form action="edit.php?id=<?php echo $hotel_id; ?>" method="post" enctype="multipart/form-data">
        <label for="price_per_night">Pret / noapte:</label>
        <input type="text" id="price_per_night" name="price_per_night" value="<?php echo htmlspecialchars($hotel['price_per_night']); ?>" required><br><br>
        
        <label for="stars">Stele:</label>
        <input type="number" id="stars" name="stars" value="<?php echo htmlspecialchars($hotel['stars']); ?>" min="1" max="5" required><br><br>
        
        <label for="free_rooms">Camere disponibile:</label>
        <input type="number" id="free_rooms" name="free_rooms" value="<?php echo htmlspecialchars($hotel['free_rooms']); ?>" required><br><br>

        <label for="image">Imagine Hotel (optional):</label>
        <input type="file" id="image" name="image" accept="image/*"><br><br>
        
        <button type="submit">Actualizează Hotel</button>
    </form>
    <a href="../../hotels.php" class="back-button">Inapoi</a>
    </div>
</body>
</html>
