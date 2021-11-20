<?php include $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/includes/header.php"; ?>
<?php include $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/includes/navigation.php"; ?>
<?php include $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/includes/sidenav.php"; ?>

            <div id="layoutSidenav_content">
                <!-- 3,500 Calories lost per pound -->
                <main>
                    <div class="container-fluid px-4">
                        <?php
                            $result = mysqli_fetch_assoc(getPlanAndUserData($_GET['plan_id']));
                            print_r($result);
                        ?>
                    </div>
                </main>
                
<?php include $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/includes/footer.php"; ?>
<script>
   <?php require_once($_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/scripts/add_workout.js"); ?>
</script>