<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidenav.php"; ?>

            <div id="layoutSidenav_content">
                <main>
                <?php if(isset($_POST['add_workout'])){
                    $_POST['workout_user_id'] = $_SESSION['user_id'];
                    insert_workout($_POST);
                } 
                ?>
                    <div class="container-fluid px-4">
                    <h1 class="mt-4">Add Workout</h1>
                    <?php 
                        $month = date('m');
                        $day = date('d');
                        $year = date('Y');

                        $today = $year . '-' . $month . '-' . $day;
                    ?>               
                        

                    <form class = "px-5 pt-5" action="" method="post">
                        <div class="mb-3">
                            <label for="muscle_group" class="form-label">Muscle Group</label>
                            <input type="text" class="form-control" id="workout_muscle_group" name="workout_muscle_group">
                           
                        </div>
                        <div class="mb-3">
                            <label for="workout_gym" class="form-label">Gym</label>
                            <input type="text" class="form-control" id="workout_gym" name="workout_gym">
                        </div>
                        <div class="mb-3">
                            <label for="workout_length" class="form-label">Workout Length (In Minutes)</label>
                            <input type="number" class="form-control" id="workout_length" name="workout_length">
                        </div>
                        <div class="mb-3 form-check">
                        <label for="workout_date">Workout Date</label>
                            <input type="date" id="workout_date" name="workout_date" class="" value = "<?php echo $today; ?>">
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary" type="submit" name="add_workout">Add Workout</button>

                        </div>  
                    </form>
                    </div>
                </main>
<?php include "includes/footer.php"; ?>

