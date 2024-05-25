<?php
if(isset($_GET['transform']) && $_GET['transform'] === 'true') {
    // Transform XML using XSL
    $xml = new DOMDocument();
    $xml->load('link.xml');
    $xsl = new DOMDocument();
    $xsl->load('link.xsl');

    $proc = new XSLTProcessor();
    $proc->importStyleSheet($xsl);
    $link_html = $proc->transformToXML($xml);
    echo $link_html; // Afișează rezultatul transformării
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="css/styles.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .justify {
            text-align: justify;
        }

        svg {
            display: block;
            margin: 0 auto;
        }

        a {
            display: block;
            text-align: center;
            font-family: Arial, sans-serif;
            color: #007bff;
            text-decoration: none;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Hoteluri Iași</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Acasa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <a href="about.php?transform=true" class="btn btn-primary" id="playButton">Nu apasa!</a>
    <!-- Content-->
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 text-center mb-4">Despre noi...</h1>
                <p class="lead justify">Bun venit pe Hoteluri din Iași - Romania, un loc dedicat explorării și descoperirii celui mai bogat și divers portofoliu de hoteluri din pitoreasca regiune a Iașului, România.</p>
                <p class="justify">Înființat în 2024, website-ul nostru este rezultatul pasiunii pentru călătorii și pentru oferirea unei experiențe de cazare de neuitat în inima Moldovei. De la hoteluri boutique ascunse în vechile străzi ale orașului până la hoteluri de lux înconjurat de peisaje naturale spectaculoase, suntem aici pentru a vă ghida în căutarea celor mai potrivite opțiuni de cazare pentru călătoria dumneavoastră în Iași.</p>

                <p class="justify">Echipa noastră este formată din profesioniști pasionați, dedicați să vă ofere cele mai actualizate informații despre hoteluri, oferte speciale și experiențe unice. Fie că sunteți în căutarea unui loc de cazare pentru o escapadă romantică, o călătorie de afaceri sau o aventură de explorare culturală, vă stăm la dispoziție cu recomandări personalizate și sfaturi utile.</p>

                <p class="justify">Ne mândrim cu faptul că oferim o platformă intuitivă și ușor de utilizat, care vă permite să explorați, să comparați și să rezervați cazare în câteva click-uri. De asemenea, suntem mereu deschiși la feedback-ul dumneavoastră și căutăm să ne îmbunătățim continuu serviciile pentru a vă oferi cea mai bună experiență posibilă.</p>

                <p class="justify">Vă invităm să navigați prin selecția noastră variată de hoteluri și să vă bucurați de experiența autentică a regiunii Iașiului, un loc de întâlnire între istorie, cultură și frumusețe naturală.</p>

                <p class="justify">Vă mulțumim că ați ales Hoteluri din Iași - Romania pentru călătoria dumneavoastră și vă dorim o ședere plină de aventură și descoperiri remarcabile!</p>
            </div>
            <?php
             //MATHML
                $mathml_content = file_get_contents("mathml.xml");
                echo $mathml_content; 
                ?>
        </div>
    </div>
    <script>
        document.getElementById('playButton').addEventListener('click', function(event) {
            window.location.href = 'about.php?transform=true';
        });
    </script>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
