<?php session_start();
require_once($_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/config.php"); 
    unset($_SESSION['user_id']);
    header("Location: $link_path/login.php");
?>