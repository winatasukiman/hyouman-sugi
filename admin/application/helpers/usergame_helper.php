<?php

function delete_image($image_name) {
    $photo = $image_name;
                
    if (file_exists("assets/uploads/user/".$photo)){
        chown("assets/uploads/user/".$photo, 777);
        unlink("assets/uploads/user/".$photo);
    }
}

?>