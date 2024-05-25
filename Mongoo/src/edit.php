<?php
require_once 'connection.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = new \MongoDB\Bson\ObjectId($_GET['id']);
    $query = new MongoDB\Driver\Query(['_id' => $id]);
    $hotel = $client->executeQuery('hotels.hotelsiasi', $query)->toArray()[0];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nume = $_POST['nume'];
        $adresa = $_POST['adresa'];
        $camere_libere = $_POST['camere_libere'];
        $stele = $_POST['stele'];
        $pret_pe_noapte = $_POST['pret_pe_noapte'];

        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(
            ['_id' => $id],
            ['$set' => [
                'nume' => $nume,
                'adresa' => $adresa,
                'camere_libere' => $camere_libere,
                'stele' => $stele,
                'pret_pe_noapte' => $pret_pe_noapte
            ]]
        );

        $client->executeBulkWrite('hotels.hotelsiasi', $bulk);
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hotel</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Edit Hotel</h1>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $hotel->_id; ?>">
            <div class="mb-3">
                <label for="nume" class="form-label">Nume:</label>
                <input type="text" class="form-control" id="nume" name="nume" value="<?php echo $hotel->nume; ?>" required>
            </div>
            <div class="mb-3">
                <label for="adresa" class="form-label">Adresa:</label>
                <input type="text" class="form-control" id="adresa" name="adresa" value="<?php echo $hotel->adresa; ?>" required>
            </div>
            <div class="mb-3">
                <label for="camere_libere" class="form-label">Camere Libere:</label>
                <input type="number" class="form-control" id="camere_libere" name="camere_libere" value="<?php echo $hotel->camere_libere; ?>" required>
            </div>
            <div class="mb-3">
                <label for="stele" class="form-label">Stele:</label>
                <input type="number" class="form-control" id="stele" name="stele" value="<?php echo $hotel->stele; ?>" required>
            </div>
            <div class="mb-3">
                <label for="pret_pe_noapte" class="form-label">Pret pe Noapte:</label>
                <input type="number" class="form-control" id="pret_pe_noapte" name="pret_pe_noapte" value="<?php echo $hotel->pret_pe_noapte; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
