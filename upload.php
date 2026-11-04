<?php
function image_upload($name) {
    $tmp = $_FILES['new_game_image']['tmp_name'];

    move_uploaded_file($tmp, "images/" . $name);
};
?>