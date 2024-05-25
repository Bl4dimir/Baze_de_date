<?php
require_once '../../connection.php';

if(isset($_GET['id'])) {
    
    $hotel_id = $_GET['id'];

    $sql = "DELETE FROM hotels WHERE id = :hotel_id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':hotel_id', $hotel_id);

    if ($stmt->execute()) {
       
        header("Location: ../../hotels.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
   
    echo "id lipseste din url";
}
?>
