<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/header.php"; ?>
<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/navigation.php"; ?>
<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/sidenav.php"; ?>

            <div id="layoutSidenav_content">
                <main>
                <?php 
                if(isset($_POST['add_meal'])){
                    $_POST['meal_datetime'] = $_POST['meal_date'] . " " . $_POST['meal_time'] . ":00";
                    $_POST['meal_user_id'] = $_SESSION['user_id'];
                    insertMeal($_POST);
                    header("Location: $link_path/index.php");
                }
                
                ?>
                    <div class="container-fluid px-4">
                    <h1 class="mt-4 text-center">Add Meal</h1>   
            
                    <form class = "px-5 py-5" action="" method="post">
                        <div class="mb-3">
                            <label for="meal_name" class="form-label">Meal Name:</label>
                            <input type="text" class="form-control" id="meal_name" name="meal_name">
                           
                        </div>
                        <div class="mb-3">
                            <label for="meal_ingredients" class="form-label">Ingredients (i.e chicken, rice, ketchup)</label>
                            <input type="text" class="form-control" id="meal_ingredients" name="meal_ingredients">
                        </div>
                        <div class="mb-3">
                            <label for="meal_calories" class="form-label">Calories</label>
                            <input type="number" class="form-control" id="meal_calories" name="meal_calories" placeholder=0>
                        </div>
                        <div class="mb-3 form-check">
                        <label for="meal_date">Date</label>
                            <input type="date" id="meal_date" name="meal_date" class="" value = "<?php echo $today; ?>">
                            <input type="time" id="meal_time" name="meal_time" class="">
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary" type="submit" name="add_meal">Add meal</button>

                        </div>  
                    </form>
                    </div>
                </main>
<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/footer.php"; ?>
<script src="scripts/add_workout.js"></script>