<?php  
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $xml = new DOMDocument();
    $xml->load('hotels.xml');
    $xpath = new DOMXPath($xml);
    $xpathQuery = "/hotels/hotel[@id='$id']";
    $hotelNode = $xpath->query($xpathQuery)->item(0);
    if ($hotelNode !== null) {
        $hotelNode->parentNode->removeChild($hotelNode);
        $xml->save('hotels.xml');
        header("Location: index.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
