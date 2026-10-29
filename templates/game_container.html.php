<p><?= $totalgames ?> games uploaded to internet games database</p>
<?php $lastgame = null ?>
<div class="games-grid">
    <?php foreach ($games as $game): ?>
        <?php if ($game['id'] !== $lastgame): ?>
            <?php if ($lastgame !== null): ?>
                </blockquote>
            <?php endif; ?>
            <div class="game">
                <blockquote>
                    <ul>
                        <li><img class="game_image" src="images/<?= $game['game_image_url'] ?>"></li>
                        <li>Game Name: <?= htmlspecialchars($game['game_name'], ENT_QUOTES, 'UTF-8') ?></li>
                        <li>Game Price: <?= htmlspecialchars($game['game_price'], ENT_QUOTES, 'UTF-8') ?></li>
                        <li>Game Company: <?= htmlspecialchars($game['game_company_name'], ENT_QUOTES, 'UTF-8') ?></li>
                        <li>Game Category: <?= htmlspecialchars($game['category_name'], ENT_QUOTES, 'UTF-8') ?></li>
                        <li>Console Played On: <?= htmlspecialchars($game['console_played_on']) ?>
                    </ul>
                    <div class=" game-actions">
                        <form action="deletegame.php" method="post">
                            <input type="hidden" name="id" value="<?= $game['id'] ?>">
                            <input
                                onclick="return confirm('deleting game will permenantly delete from database would you like to continue: ')"
                                type="submit" value="Delete">
                        </form>
                        <form action="editgame.php" method="post">
                            <input type="hidden" name="id" value="<?= $game['id'] ?>">
                            <input type="submit" value="Edit">
                        </form>
                    </div>
                    <h3>Reviews</h3>
                    <form action="addreview.php" method="post" id="add_other_review">
                        <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
                        <input type="submit" value="Add Another Review">
                    </form>
                    <?php $lastgame = $game['id']; ?>
                <?php endif; ?>
                <div class="review-box">
                    <?php if (!isset($game['review_content'])): ?>
                        <form action="addreview.php" method="post">
                            <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
                            <input type="submit" value="Add">
                        </form>
                    <?php else: ?>
                        <?= htmlspecialchars($game['review_content']) ?>
                        </br>
                        Replayability rating: <?= htmlspecialchars($game['replayability_rating']) ?>%
                        </br>
                        Enjoyment rating: <?= htmlspecialchars($game['enjoyment_rating']) ?>%
                        </br>
                        Plot rating: <?= htmlspecialchars($game['plot_rating']) ?>%
                        </br>
                        Percentage played: <?= htmlspecialchars($game['percentage_played']) ?>%
                        </br>
                        Overall rating: <?= htmlspecialchars($game['Overall_rating']) ?>%
                        </br>
                        Reviewer Name: <?= htmlspecialchars($game['reviewer_name']) ?>
                        </br>
                        Reviewer Email: <a href="mailto:<?= htmlspecialchars($game['reviewer_email']) ?>"><?= htmlspecialchars($game['reviewer_email']) ?></a>
                        <div id="review-actions">
                            <form action="deletereview.php" method="post">
                                <input type="hidden" name="id" value="<?= $game['review_id'] ?>">
                                <input
                                    onclick="return confirm('deleting review will permenantly delete from database would you like to continue: ')"
                                    type="submit" value="Delete">
                            </form>
                            <form action="editreview.php" method="post">
                                <input type="hidden" name="id" value="<?= $game['review_id'] ?>">
                                <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
                                <input type="submit" value="Edit">
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <?php if ($lastgame !== null): ?>
            </blockquote>
        <?php endif; ?>
    </div>