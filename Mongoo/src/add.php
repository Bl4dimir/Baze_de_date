<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adauga Hotel</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Adauga Hotel</h1>
        <form method="post" action="store.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nume" class="form-label">Nume:</label>
                <input type="text" class="form-control" id="nume" name="nume" required>
            </div>
            <div class="mb-3">
                <label for="adresa" class="form-label">Adresa:</label>
                <input type="text" class="form-control" id="adresa" name="adresa" required>
            </div>
            <div class="mb-3">
                <label for="camere_libere" class="form-label">Camere Libere:</label>
                <input type="number" class="form-control" id="camere_libere" name="camere_libere" required>
            </div>
            <div class="mb-3">
                <label for="stele" class="form-label">Stele:</label>
                <input type="number" class="form-control" id="stele" name="stele" required>
            </div>
            <div class="mb-3">
                <label for="pret_pe_noapte" class="form-label">Pret pe Noapte:</label>
                <input type="number" class="form-control" id="pret_pe_noapte" name="pret_pe_noapte" required>
            </div>
            <div class="mb-3">
                <label for="imagine" class="form-label">Imagine:</label>
                <input type="file" class="form-control" id="imagine" name="imagine" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
