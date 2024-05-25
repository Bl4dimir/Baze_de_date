<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST['nume'];
    $adresa = $_POST['adresa'];
    $camere_libere = $_POST['camere_libere'];
    $stele = $_POST['stele'];
    $pret_pe_noapte = $_POST['pret_pe_noapte'];
    if (isset($_FILES['imagine']) && $_FILES['imagine']['error'] === UPLOAD_ERR_OK) {
        $imgName = $_FILES['imagine']['name'];
        $imgTmpName = $_FILES['imagine']['tmp_name'];
        $imgSize = $_FILES['imagine']['size'];
        $imgError = $_FILES['imagine']['error'];
        $imgType = $_FILES['imagine']['type'];

        $imgExt = explode('.', $imgName);
        $imgActualExt = strtolower(end($imgExt));

        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($imgActualExt, $allowed)) {
            if ($imgError === 0) {
                if ($imgSize < 1000000) {
                    $imgNewName = uniqid('', true).".".$imgActualExt;
                    $imgDestination = 'images/'.$imgNewName;
                    move_uploaded_file($imgTmpName, $imgDestination);
                } else {
                    echo "Your file is too big!";
                    exit();
                }
            } else {
                echo "There was an error uploading your file!";
                exit();
            }
        } else {
            echo "You cannot upload files of this type!";
            exit();
        }
    } else {
        echo "No file uploaded!";
        exit();
    }
    $xml = simplexml_load_file('hotels.xml');
    $id = 1;
    foreach ($xml->hotel as $existingHotel) {
        $id = max($id, (int)$existingHotel['id'] + 1);
    }
    $hotel = $xml->addChild('hotel');
    $hotel->addAttribute('id', $id);
    $hotel->addChild('nume', $nume);
    $hotel->addChild('adresa', $adresa);
    $hotel->addChild('camere_libere', $camere_libere);
    $hotel->addChild('stele', $stele);
    $hotel->addChild('pret_pe_noapte', $pret_pe_noapte);
    $hotel->addChild('imagine', $imgDestination);
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    $formattedXml = $dom->saveXML();
    file_put_contents('hotels.xml', $formattedXml);
    header("Location: index.php");
    exit();
}
?>
