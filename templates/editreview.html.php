<form action="" method="post" style="display: flex; flex-direction: column; font-size: 24px; width: 30vw; padding: 12px; height: 50vh; margin: 12px;">
    <?= $data['game_name'] ?>
    <label>Add Review Content</label>
    <textarea name="review_content" rows="3" cols="40">
        <?= $data['review_content'] ?>
    </textarea>
    <input type="hidden" value="<?= $_POST['game_id']?>" name="game_id">
    <input type="hidden" value="<?= $_POST['id'] ?>" name="id">
    <label>Replayability Rating</label>
    <input type="number" name="replayability_rating" value="<?= $data['replayability_rating'] ?>" required min="0" max="100">
    <label>Enjoyment Rating</label>
    <input name="enjoyment_rating" type="number" min="0" max="100" value="<?= $data['enjoyment_rating'] ?>">
    <label>Plot Rating</label>
    <input name="plot_rating" type="number" min="0" max="100" value="<?= $data['plot_rating'] ?>">
    <label>Percentage Played </label>
    <input name="percentage_played" type="number" min="0" max="100" value="<?= $data['percentage_played'] ?>">
</br>
    <input type="submit" name="submit" value="Edit Review" style="height: 40px;">
</form>