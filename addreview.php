<?php 
if (isset($_POST['review_content'])){
    try {
        include 'includes/DatabaseConnection.php';
        include 'includes/DataBaseFunctions.php';
        addreview($pdo, $_POST['review_content'],  $_POST['replayability_rating'],  $_POST['enjoyment_rating'], $_POST['plot_rating'], $_POST['percentage_played'], $_POST['game_id'], 1);
        header('location: gamereview.php');
    }
    catch(PDOException $e) {
        $title = 'review text could not be updated';
        $output = 'Database error' . $e->getMessage();
    }

}
    else {
        include 'includes/DatabaseConnection.php';
        $title = 'Add new Review';
        $sql_r = 'SELECT * FROM reviewers';
        $reviewers = $pdo->query($sql_r);
        ob_start();
        $stmt = $pdo->prepare("SELECT * FROM games WHERE games.id = :id");
        $values = [':id' => $_POST['game_id']];
        $stmt->execute($values);
        $game = $stmt->fetch();



        include 'templates/addreview.html.php';
        $output = ob_get_clean();
    }
    include 'templates/layout.html.php';