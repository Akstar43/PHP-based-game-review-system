<?php
try {
    include 'includes/DatabaseConnection.php';
    include 'includes/DataBaseFunctions.php';


    $sql = 'SELECT games.id, reviews.id AS review_id, games.category_id,games.game_company_id, games.game_name, games.game_price, game_companies.game_company_name, games.game_image_url, games.console_played_on, categories.category_name, reviewers.reviewer_name, reviewers.reviewer_email, reviews.review_content, reviews.last_updated, reviews.replayability_rating, 
    reviews.enjoyment_rating, reviews.plot_rating, reviews.percentage_played, reviews.Overall_rating FROM games INNER JOIN categories ON games.category_id = categories.id INNER JOIN game_companies ON games.game_company_id = game_companies.id LEFT JOIN reviews ON reviews.game_id = games.id LEFT JOIN reviewers ON reviews.reviewer_id = reviewers.id ORDER BY games.id DESC';

    $games = $pdo->query($sql);
    $title = 'Game list';
    $totalgames = totalgames($pdo);
    ob_start();
    include 'templates/game_container.html.php';
    $output = ob_get_clean();
    $count = 1;

} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database error' . $e->getMessage();

}

include 'templates/layout.html.php';