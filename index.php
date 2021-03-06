

<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/header.php"; ?>
<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/navigation.php";
//We grab user variables here, as well as authorization if user is logged in
?>
<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/sidenav.php"; 
?>



            <div id="layoutSidenav_content">
                <main>
                    <?php 
                        $results = get_workout_length_report(7, $user_id);
                        $workoutLengthByDate = [];
                        while($row = mysqli_fetch_assoc($results)){
                            array_push($workoutLengthByDate, $row);
                        }
                        $results = getMealCalorieReport(7, $user_id);
                        $mealCaloriesByDate = [];
                        while($row = mysqli_fetch_assoc($results)){
                            array_push($mealCaloriesByDate, $row);
                        }
                    ?>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <!-- includes/navigation.php has the logic for obtaining user information, as well as redirecting if no user in session -->
                            <li class="breadcrumb-item active"><?php echo "{$user_firstname} {$user_lastname}" ?></li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <?php $workouts = get_num_workouts($user_id);?>
                                    <div class="card-body"><?php echo $workouts; ?> Total Workouts</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="add_workout.php">Log Workout</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <?php $meals = getNumMealsByUserAndDate($user_id, $_COOKIE['formattedDate']); ?>
                                    <div class="card-body"><?php echo $meals; ?> Meals Today</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="add_meal.php">Log a meal</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Current Weight: <?php echo (!empty($user_weight)) ? $user_weight : 'Not configured'; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="add_weighin.php">Log Weigh In</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Goal Weight: <?php echo (!empty($user_goal_weight)) ? $user_goal_weight : 'Not configured'; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="edit_profile.php">Change Goal</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Workout Time by Minutes
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Muscle Group</th>
                                            <th>Workout Length</th>
                                            <th>Gym</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $result = grabAllWorkoutsByUser($_SESSION['user_id']);
                                        while($row = mysqli_fetch_assoc($result)){
                                            $workout_date = $row['workout_date'];
                                            $workout_muscle_group = $row['workout_muscle_group'];
                                            $workout_length = $row['workout_length'];
                                            $workout_gym = $row['workout_gym'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $workout_date; ?></td>
                                                    <td><?php echo $workout_muscle_group; ?></td>
                                                    <td><?php echo $workout_length; ?></td>
                                                    <td><?php echo $workout_gym; ?></td>
                                                </tr>
                                                <?php
                                        }   
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <script type="text/javascript">
                    const workoutLengthByDate = <?php echo json_encode($workoutLengthByDate) ?>;
                    const mealCaloriesByDate = <?php echo json_encode($mealCaloriesByDate); ?>;
                </script>       
<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/footer.php"; ?>
<script src="./assets/demo/chart-area-demo.js"></script>
<script src="./assets/demo/chart-bar-demo.js"></script>
