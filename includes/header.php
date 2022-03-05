<?php ob_start(); ?>
<?php session_start(); ?>
<?php require_once(dirname(__DIR__) . "/includes/config.php"); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?php echo $link_path;?>/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo $link_path;?>/scripts/helpers.js"></script>
        <script>document.cookie = "formattedDate = " + getTodaysDate()</script>
    </head>
    <body class="sb-nav-fixed">

        <?php include PROJECT_ROOT_PATH . "./includes/db.php"; ?>
        <?php include PROJECT_ROOT_PATH . "./functions.php";?>