<?php
require_once 'connection.php';

$id = new \MongoDB\Bson\ObjectId($_GET['id']);
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->delete(['_id' => $id]);

$client->executeBulkWrite('hotels.hotelsiasi', $bulk);
header('Location: index.php');
?>
