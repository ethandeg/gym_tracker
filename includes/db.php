<?php
    if($_SERVER['REDIRECT_ENV'] === 'development'){
        $db['db_host'] = 'localhost';
        $db['db_user'] = 'root';
        $db['db_pass'] = '';
        $db['db_name'] = 'gym_tracker';
    }
    elseif($_SERVER['REDIRECT_ENV'] === 'production'){
        $db['db_host'] = 'localhost';
        $db['db_user'] = 'edegenhardt';
        $db['db_pass'] = 'hmu1KKuXvvsURgYu';
        $db['db_name'] = 'gym_tracker';
    }


    foreach($db as $key => $value){
        define(strtoupper($key), $value);
    }
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$connection){
        die("There seems to be a problem with the database" . mysqli_error($connection));
    }

?>