<?php 
if (isset($_POST['game_name'])){
    try {
        include 'includes/DatabaseConnection.php';
        include 'includes/DataBaseFunctions.php';
        editgame($pdo,  $_POST['game_name'],  $_POST['game_companies'], $_POST['game_price'], $_POST['categories'], 1, $_POST['id'], $_POST['console_played_on']);
        header('location: gamereview.php');
    }
    catch(PDOException $e) {
        $title = 'game could not be updated';
        $output = 'Database error' . $e->getMessage();
    }

}
    else {
        include 'includes/DatabaseConnection.php';
        $title = 'Edit Game information';
        $sql_c = 'SELECT * FROM categories';
        $sql_gc = 'SELECT * FROM game_companies';
        $categories = $pdo->query($sql_c);
        $game_companies = $pdo->query($sql_gc);
        $sql_editdata = 'SELECT games.*, categories.category_name, game_companies.game_company_name FROM games LEFT JOIN categories ON games.category_id = categories.id LEFT JOIN game_companies ON games.game_company_id = game_companies.id WHERE games.id = :id';
        $stmt = $pdo->prepare($sql_editdata);
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        ob_start();
        $sql_data = $stmt->fetch();
        include 'templates/editgame.html.php';
        $output = ob_get_clean();
    }
    include 'templates/layout.html.php';