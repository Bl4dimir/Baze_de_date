<?php
session_start();

$isLoggedin = isset($_SESSION["loggedin"]) && isset($_SESSION["username"]);
$userType = isset($_SESSION["user_type"]) ? $_SESSION["user_type"] : '';
$isAdmin = $isLoggedin && $userType === "admin";
$xml = simplexml_load_file('hotels.xml');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hoteluri Iasi</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#!">Hoteluri Iași</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <?php
                    if ($isLoggedin) {
                        echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                    }
                    if ($isAdmin) {
                        echo '<li class="nav-item dropdown">';
                        echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>';
                        echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                        echo '<li><a class="dropdown-item" href="hotels.xml">DB</a></li>';
                        echo '<li><a class="dropdown-item" href="users.xml">Schema</a></li>';
                        echo '</ul>';
                        echo '</li>';
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
    </nav>
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Hoteluri in Iași</h1>
                <p class="lead mb-0">Aici găsești hotelul care ți se potrivește!</p>
                <?php
                if ($isAdmin) {
                    echo '<a class="btn btn-primary" href="add.php">Adauga Hotel</a>';
                }
                ?>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php
                foreach ($xml->hotel as $hotel) {
                    echo '<div class="card mb-4">';
                    echo '<img src="' . $hotel->imagine . '" class="card-img-top" alt="Hotel Image">';
                    echo '<div class="card-body">';
                    echo '<h2 class="card-text">Hotel: ' . $hotel->nume . '</h2>';
                    echo '<p class="card-text">Adresa: ' . $hotel->adresa . '</p>';
                    echo '<p class="card-text">Camere Libere: ' . $hotel->camere_libere . '</p>';
                    echo '<p class="card-text">Stele: ' . $hotel->stele . '</p>';
                    echo '<p class="card-text">Pret pe Noapte: ' . $hotel->pret_pe_noapte . '</p>';
                    if ($isAdmin) {
                        echo '<a href="edit.php?id=' . $hotel['id'] . '" class="btn btn-primary">Edit</a> ';
                        echo '<a href="delete.php?id=' . $hotel['id'] . '" class="btn btn-danger">Delete</a>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
                
                ?>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" id="searchInput" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        </div>
                    </div>
                </div>
                <script>

                    const searchInput = document.getElementById('searchInput');
                    searchInput.addEventListener('keyup', function() {
                        const searchTerm = this.value.toLowerCase();
                        const hotelCards = document.querySelectorAll('.card');
                            hotelCards.forEach(card => {
                            const cardTitle = card.querySelector('.card-text').textContent.toLowerCase();
                            if (cardTitle.includes(searchTerm)) {
                                card.style.display = 'block';
                            } else {
                                card.style.display = 'none';
                            }
                            });
                        });
                </script>
                <div class="card mb-4">
                    <div class="card-header">Partenerii noștri:</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="https://www.booking.com/">Booking.com</a></li>
                                    <li><a href="https://www.turistinfo.ro/">Turist INFO</a></li>
                                    <li><a href="https://www.tripadvisor.com/">TripAdvisor</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Weather Widget</div>
                    <div class="card-body">
                        <a class="weatherwidget-io" href="https://forecast7.com/en/47d1627d60/iasi/" data-label_1="IAȘI" data-label_2="WEATHER" data-theme="original">IAȘI WEATHER</a>
                        <script>
                            !function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (!d.getElementById(id)) {
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = 'https://weatherwidget.io/js/widget.min.js';
                                    fjs.parentNode.insertBefore(js, fjs);
                                    }
                                }(document, 'script', 'weatherwidget-io-js');
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>

