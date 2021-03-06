<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/header.php"; ?>
<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/navigation.php"; ?>
<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/sidenav.php"; ?>

            <div id="layoutSidenav_content">
                <main>

                    <div class="container-fluid px-4">
                    <h1 class="mt-4 text-center">We made it to the plans route</h1>   
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Plans
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Daily Calories</th>
                                            <th>User Id</th>
                                            <th>Goal Weight Change</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                            <?php 
                                                $results = getAllPlans($user_id);
                                                while($row = mysqli_fetch_assoc($results)){
                                                    $weight_goal_id = $row['weight_goal_id'];
                                                    $weight_goal_name = $row['weight_goal_name'];
                                                    $weight_goal_start = $row['weight_goal_start'];
                                                    $weight_goal_end = $row['weight_goal_end'];
                                                    $weight_goal_user_id = $row['weight_goal_user_id'];
                                                    $weight_goal_change = $row['weight_goal_change'];
                                                    $weight_goal_daily_calories = $row['weight_goal_daily_calories']
                                                    ?>
                                                    <tr>
                                                        <td><a href="plan_detail.php?plan_id=<?php echo $weight_goal_id; ?>"><?php echo $weight_goal_id;?></a></td>
                                                        <td><?php echo $weight_goal_name;?></td>
                                                        <td><?php echo $weight_goal_start;?></td>
                                                        <td><?php echo $weight_goal_end;?></td>
                                                        <td><?php echo $weight_goal_daily_calories;?></td>
                                                        <td><?php echo $weight_goal_user_id;?></td>
                                                        <td><?php echo $weight_goal_change;?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </main>
<?php include $_SERVER['REDIRECT_GYM_TRACKER_ROOT'] . "/includes/footer.php"; ?>
<script>"<?php echo $link_path; ?>/scripts/add_workout.js"</script>