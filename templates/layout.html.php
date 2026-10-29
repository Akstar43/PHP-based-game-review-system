<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
<link rel="stylesheet" href="reviewapp.css?v=<?= filemtime('reviewapp.css') ?>">
</head>
<body>
    <header><h1>Internet Game Database</h1></header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="gamereview.php">Games List</a></li>
            <li><a href="addgame.php">Add new game</a></li>
        </ul>
    </nav>
    <main>
        <?= $output ?>
    </main>
</body>
</html>