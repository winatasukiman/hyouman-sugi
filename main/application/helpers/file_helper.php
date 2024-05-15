<?php

function delete_file($filepath) {
    if (file_exists($filepath)) {
        chown($filepath, 777);
        unlink($filepath);
    }
}

function delete_file_if_exists($filepath) {
    if (file_exists($filepath)) {
        chown($filepath, 777);
        unlink($filepath);
    }
}

?>