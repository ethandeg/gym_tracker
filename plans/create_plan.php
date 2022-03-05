<?php include "../includes/config.php";?>
<?php include "../includes/header.php"; ?>
<?php include PROJECT_ROOT_PATH . "./includes/navigation.php"; ?>
<?php include PROJECT_ROOT_PATH . "./includes/sidenav.php"; ?>

            <div id="layoutSidenav_content">
                <main>
                    <?php 
                        if(isset($_POST['create_goal'])){
                            $id = insertWeightGoal($user_id,$_POST);
                            header("Location: $link_path/plans/plan_detail.php?" . "plan_id=" . $id);
                        }
                    ?>
                    <div class="container-fluid px-4">
                    <h1 class="mt-4 text-center">Create Weight Plan</h1>   
            
                    <form class = "px-5 py-5" action="" method="post">
                        <div class="mb-3">
                            <label for="weight_goal_name" class="form-label">Goal Name:</label>
                            <input type="text" class="form-control" id="weight_goal_name" name="weight_goal_name">
                           
                        </div>
                        <div class="mb-3">
                            <label for="weight_goal_change" class="form-label">Weight Change</label>
                            <input type="number" class="form-control" id="weight_goal_change" name="weight_goal_change">
                        </div>
                        <div class="mb-3 form-check">
                        <label for="weight_goal_start">Start Date</label>
                            <input type="date" id="weight_goal_start" name="weight_goal_start" class="" value = "<?php echo $today; ?>">
                        </div>
                        <div class="mb-3 form-check">
                        <label for="weight_goal_end">End Date</label>
                            <input type="date" id="weight_goal_end" name="weight_goal_end" class="" value = "<?php echo $today; ?>">
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary" type="submit" name="create_goal">Create Goal</button>

                        </div>  
                    </form>
                    </div>
<?php include PROJECT_ROOT_PATH . "./includes/footer.php"; ?>
<script src="<?php echo $link_path; ?>/scripts/add_workout.js"></script>