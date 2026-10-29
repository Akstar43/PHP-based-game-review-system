<?php
function image_upload($name) {
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "images/" . $name);
};
?>