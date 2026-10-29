<?php 
function totalgames($pdo){
    $query = $pdo->prepare('SELECT COUNT(*) FROM games');
    $query->execute();
    $row = $query->fetch();
    return $row[0];
}
function deletegame($pdo, $id) {
    $stmt = $pdo->prepare('DELETE FROM games WHERE games.id = :id');
    $values = [":id" => $id];
    $stmt->execute($values);
}
function deletreview($pdo, $id) {
    $stmt = $pdo->prepare('DELETE FROM reviews WHERE `id` = :id');
    $values = [":id" => $id];
    $stmt->execute($values);
}
function addreview($pdo, $review_content, $replayability_rating, $enjoyment_rating, $plot_rating, $percentage, $game_id, $reviewer_id ) {
        $stmt = $pdo->prepare('INSERT INTO reviews SET review_content = :review_content, last_updated = CURRENT_TIMESTAMP, reviewer_id = :reviewer_id, replayability_rating = :replayability_rating, enjoyment_rating = :enjoyment_rating, plot_rating = :plot_rating, Overall_rating = :overall_rating, percentage_played = :percentage_played, game_id = :game_id');
        $overall_rating = $enjoyment_rating + $plot_rating + $replayability_rating / 3;
        $values = [ 
            ":review_content" => $review_content,
            ":replayability_rating" => $replayability_rating,
            ":reviewer_id" => $reviewer_id,
            ":enjoyment_rating"=> $enjoyment_rating,
            ":plot_rating" => $plot_rating,
            ":overall_rating" => $overall_rating,
            "percentage_played" => $percentage,
            ":game_id" => $game_id
        ]; 
        $stmt->execute($values);       
}

function editreview($pdo, $review_content, $replayability_rating, $enjoyment_rating, $plot_rating, $percentage, $game_id, $id, $reviewer_id ) {
        $stmt = $pdo->prepare(' UPDATE reviews SET review_content = :review_content, last_updated = CURRENT_TIMESTAMP, reviewer_id = :reviewer_id, replayability_rating = :replayability_rating, enjoyment_rating = :enjoyment_rating, plot_rating = :plot_rating, Overall_rating = :overall_rating, percentage_played = :percentage_played, game_id = :game_id WHERE reviews.id = :id');
        $overall_rating = $enjoyment_rating + $plot_rating + $replayability_rating / 3;
        $values = [ 
            ":review_content" => $review_content,
            ":replayability_rating" => $replayability_rating,
            ":reviewer_id" => $reviewer_id,
            ":enjoyment_rating"=> $enjoyment_rating,
            ":plot_rating" => $plot_rating,
            ":overall_rating" => $overall_rating,
            "percentage_played" => $percentage,
            ":game_id" => $game_id,
            ":id" => $id

        ]; 
        $stmt->execute($values);       
}
function editgame($pdo, $game_name, $game_company_id, $game_price, $category_id, $game_image_url, $game_id, $console_played_on) {
    $stmt = $pdo->prepare('UPDATE games SET game_name = :game_name, game_price = :game_price, category_id = :category_id, game_company_id = :game_company_id, game_image_url = :game_image_url, console_played_on = :console_played_on WHERE games.id = :id');
    $values = [
        ":game_name" => $game_name,
        ":game_company_id"=> $game_company_id,
        ":game_price" => $game_price,
        ":category_id" => $category_id, 
        ":id" => $game_id, 
        ":game_image_url" => $game_image_url,
        ":console_played_on" => $console_played_on
    ];
    $stmt->execute($values);
}
function addgame($pdo, $game_name, $game_company_id, $game_price, $category_id, $game_image_url, $console_played_on) {
    $stmt = $pdo->prepare('INSERT INTO games SET game_name = :game_name, game_price = :game_price, category_id = :category_id, game_company_id = :game_company_id, game_image_url = :game_image_url, console_played_on = :console_played_on');
    $values = [
        ":game_name" => $game_name,
        ":game_company_id"=> $game_company_id,
        ":game_price" => $game_price,
        ":category_id" => $category_id, 
        ":game_image_url" => $game_image_url,
        ":console_played_on" => $console_played_on
    ];
    $stmt->execute($values);
    

}
