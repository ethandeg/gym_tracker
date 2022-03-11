<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/header.php"; ?>
<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/navigation.php"; ?>
<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/sidenav.php"; ?>

            <div id="layoutSidenav_content">
                <main>
                    <?php
                    if(isset($_POST['add_weighin'])){
                        $_POST['weighin_user_id'] = $user_id;
                        logWeighin($_POST);
                        updateColumn('users', ['user_weight'=> (int)$_POST['weighin_weight']], 'user_id', (int)$user_id);
                        header("Location: $link_path/index.php");
                    }
                    
                    ?>
                    <div class="container-fluid px-4">
                    <h1 class="mt-4 text-center">Log Weigh In</h1>   
            
                    <form class = "px-5 py-5" action="" method="post">
                        <div class="mb-3">
                            <label for="weighin_weight" class="form-label">New Weight:</label>
                            <input type="number" class="form-control" id="weighin_weight" name="weighin_weight">
                           
                        </div>
                        <div class="mb-3 form-check">
                        <label for="weighin_date">Weigh In Date</label>
                            <input type="date" id="weighin_date" name="weighin_date" class="" value = "<?php echo $today; ?>">
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary" type="submit" name="add_weighin">Log Weigh In</button>
                        </div>  
                    </form>
                    </div>
                </main>
<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/footer.php"; ?>
<script src="scripts/add_workout.js"></script>

