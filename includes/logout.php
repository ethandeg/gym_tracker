<?php session_start();
require_once(dirname(__DIR__) . "/includes/config.php"); 
    unset($_SESSION['user_id']);
    header("Location: $link_path/login.php");
?>