<form method="post" style="display: flex; flex-direction: column; font-size: 24px; width: 30vw; padding: 12px; height: 50vh; margin: 12px;"
action="" enctype="multipart/form-data">
    <input type="file" name="image" required>
    <label for="game_name">Game Name</label>
    <textarea name="game_name" rows="3" cols="40"></textarea>
    <label for="game_price">Game price</label>
    <input type="text" name="game_price" placeholder="Game price">
    <label>Select Game Category</label>
    <select name="categories">
        <option value="">Select game Category</option>
        <?php foreach($categories as $category):?>
            <option value="<?=htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>">
            <?= htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach;?>
    </select>
    <label>Select Console Played On</label>
    <select name="console_played_on">
        <option value="">Console Played On</option>
        <option value="PS5">PS5</option>
        <option value="PS4">PS4</option>
        <option value="PC">PC</option>
        <option value="Nintendo">Nintendo</option>
        <option value="Xbox One/X/S">Xbox One/X/S</option>
    </select>
    <label>Select Game Company</label>
    <select name="game_companies">
        <option value="">Select game Company </option>
        <?php foreach($game_companies as $game_company):?>
        <option value="<?=htmlspecialchars($game_company['id'], ENT_QUOTES, 'UTF-8') ?>">
        <?= htmlspecialchars($game_company['game_company_name'], ENT_QUOTES, 'UTF-8')?>
        </option>
        <?php endforeach;?>
        </select>
    <label>Add Game</label>
    <input type="submit" name="submit" value="Add Game" style="height: 40px;">
</form>