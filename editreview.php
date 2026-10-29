<?php 
if(isset($_POST['review_content'])) {
       try {
        include 'includes/DatabaseConnection.php';
        include 'includes/DataBaseFunctions.php';
        editreview($pdo, $_POST['review_content'],  $_POST['replayability_rating'],  $_POST['enjoyment_rating'], $_POST['plot_rating'], $_POST['percentage_played'], $_POST['game_id'], $_POST['id'], 1);
        header('location: gamereview.php');
    }
        catch(PDOException $e) {
        $title = 'review information could not be updated';
        $output = 'Database error' . $e->getMessage();
    }

}
else {
        include 'includes/DatabaseConnection.php';
        $title = 'Edit Game information'; 
        $sql = 'SELECT reviews.*, games.* FROM reviews INNER JOIN reviewers ON reviews.reviewer_id = reviewers.id INNER JOIN games ON games.id = :game_id WHERE reviews.id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->bindValue(':game_id', $_POST['game_id']);
        $stmt->execute();
        ob_start();
        $data = $stmt->fetch();
        include 'templates/editreview.html.php';
        $output = ob_get_clean();
}
 include 'templates/layout.html.php';
