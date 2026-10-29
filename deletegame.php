<?php 
try {
    include 'includes/DatabaseConnection.php';
    include 'includes/DataBaseFunctions.php';
    deletegame($pdo, $_POST['id']);
    header('location: gamereview.php');
} catch(PDOException $e) {
    $title = 'An error has occured';
    $output = 'Unable to connect to delete game: ' . $e->getMessage();

}
include 'templates/layout.html.php';