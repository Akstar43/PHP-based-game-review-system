<form action="" method="post" style="display: flex; flex-direction: column; font-size: 24px; width: 30vw; padding: 12px; height: 50vh; margin: 12px;" enctype="multipart/form-data">
    <label for="game_name">Game Name</label>
    <textarea name="game_name" rows="3" cols="40">
        <?= $sql_data['game_name'] ?>
    </textarea>
    <img src="images/<?= $sql_data['game_image_url']?>">
    <label>Edit Image</label>
    <input type="file" name="new_game_image">
    <input type="hidden" value="<?= $sql_data['game_image_url'] ?>" name="existing_game_image">
    <label for="game_price">Game price</label>
    <input type="text" name="game_price" placeholder="Game price" value="<?= $sql_data['game_price'] ?>">
    <label>Select Category</label>
    <select name="categories">
        <option value="<?= $sql_data['category_id'] ?>"><?= $sql_data['category_name'] ?> (selected)</option>
        <?php foreach($categories as $category):?>
            <?php if($sql_data['category_name'] == $category['category_name']) continue; ?>
            <option value="<?=htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>">
            <?= htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach;?>
    </select>
    <label>Select Game Company</label>
    <select name="game_companies">
        <option value="<?= $sql_data['game_company_id'] ?>"><?= $sql_data['game_company_name'] ?>(selected)</option>
        <?php foreach($game_companies as $game_company):?>
        <?php if($sql_data['game_company_name'] == $game_company['game_company_name']) continue;?>
        <option value="<?=htmlspecialchars($game_company['id'], ENT_QUOTES, 'UTF-8') ?>">
        <?= htmlspecialchars($game_company['game_company_name'], ENT_QUOTES, 'UTF-8')?>
        </option>
        <?php endforeach;?>
        <input type="hidden" name="id" value="<?= $_POST['id']?>">
    <label>Select Console Played On</label>
    <select name="console_played_on">
        <option value="">Console Played On</option>
        <option value="PS5">PS5</option>
        <option value="PS4">PS4</option>
        <option value="PC">PC</option>
        <option value="Nintendo">Nintendo</option>
        <option value="Xbox One/X/S">Xbox One/X/S</option>
    </select>

    </select>
    <label>Edit Game</label>
    <input type="submit" name="submit" value="Edit Game" style="height: 40px;">
</form>