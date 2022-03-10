<?php
    if($_SERVER['REDIRECT_ENV'] === 'development') {
        define("PROJECT_ROOT_PATH", __DIR__ . "/../");
        $link_path = "/gym_tracker";
    }
    elseif($_SERVER['REDIRECT_ENV'] === 'production'){
        define("PROJECT_ROOT_PATH", $_SERVER['DOCUMENT_ROOT']);
        $link_path = "/gym_tracker";
    }

?>