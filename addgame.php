<?php 
if (isset($_POST['game_name'])){
    try {
        $name = $_FILES['image']['name'];
        include 'includes/DatabaseConnection.php';
        include 'includes/DataBaseFunctions.php';
        include 'upload.php';
        image_upload($name);
        addgame($pdo, $_POST['game_name'], $_POST['game_companies'], $_POST['game_price'], $_POST['categories'], $name, $_POST["console_played_on"]);
        header('location: gamereview.php');
        

    }
    catch(PDOException $e) {
        $title = 'game could not be added';
        $output = 'Database error' . $e->getMessage();
    }

}
    else {
        include 'includes/DatabaseConnection.php';
        $title = 'Add new Game';
        $sql_c = 'SELECT * FROM categories';
        $sql_gc = 'SELECT * FROM game_companies';
        $categories = $pdo->query($sql_c);
        $game_companies = $pdo->query($sql_gc);
        ob_start();
        include 'templates/addgame.html.php';
        $output = ob_get_clean();
    }
    include 'templates/layout.html.php';


