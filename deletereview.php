<?php 
try {
    include 'includes/DatabaseConnection.php';
    $sql = 'DELETE FROM reviews WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();
    header('location: gamereview.php');
} catch(PDOException $e) {
    $title = 'An error has occured';
    $output = 'Unable to connect to delete game: ' . $e->getMessage();

}
include 'templates/layout.html.php';