<?php include "../includes/header.php"; ?>
<?php include PROJECT_ROOT_PATH . "./includes/navigation.php"; ?>
<?php include PROJECT_ROOT_PATH . "./includes/sidenav.php"; ?>

            <div id="layoutSidenav_content">
                <!-- 3,500 Calories lost per pound -->
                <!-- BMR=66.4730 + 13.7516 x weight in kg + 5.0033 x height in cm – 6.7550 x age in years - men -->
                <!-- BMR=655.0955 + 9.5634 x weight in kg + 1.8496 x height in cm – 4.6756 x age - women -->
                <main>
                    <?php if(isset($_POST['select'])){
                        print_r($_POST);
                        unset($_POST['select']);
                        updateColumn('weight_goals', $_POST, 'weight_goal_id', $_GET['plan_id']);
                        header("Location: plans.php");
                    }
                    ?>
                    <div class="container-fluid px-4">
                        <?php 
                            function getDailyCalories($goalDays, $adjustedBMRS, $adjustedKey, $totalCalsToLose){
                                $sedentaryCaloriesForDuration =  $goalDays * $adjustedBMRS[$adjustedKey];
                                //I think this number is the amount of daily calories allowed
                                return ceil(($sedentaryCaloriesForDuration - $totalCalsToLose) / $goalDays);
                            }
                        ?>
                        <?php
                            $result = mysqli_fetch_assoc(getPlanAndUserData($_GET['plan_id']));
                            $kgs =  $result['user_weight'] / 2.205;
                            $cm =  $result['user_height'] * 2.54;
                            $birthDate = strtotime($result['user_dob']);
                            $now = new DateTime();
                            $now = json_decode(json_encode($now), true);
                            $now = strtotime(substr($now['date'],0,10));
                            $userAge = abs($now - $birthDate);
                            $userAge = floor($userAge / (365*60*60*24));
                            if($result['user_gender'] === "Male" || $result['user_gender'] === "male"){
                                $baseBMR = 66.4730 + 13.7516 * $kgs + 5.0033 * $cm - 6.7550 * $userAge;
                            } else {
                                $baseBMR = 655.0955 + 9.5634 * $kgs + 1.8496 * $cm - 4.6756 * $userAge;
                            }

                            $adjustedBMRS = ['sed' => $baseBMR * 1.2, 'light' => $baseBMR * 1.375, 'moderate' => $baseBMR * 1.55, 'very' => $baseBMR * 1.725, 'extra' => $baseBMR * 1.9];
                            $day_start = strtotime($result['weight_goal_start']);
                            $day_end = strtotime($result['weight_goal_end']);
                            $dateDiff = $day_end - $day_start;
                            $goalDays = round($dateDiff / (60 * 60 * 24));
                            $totalCaloriesToLose = 3500 * (-$result['weight_goal_change']);
                            $sedentaryCaloriesForDuration =  $goalDays * $adjustedBMRS['extra'];
                            //I think this number is the amount of daily calories allowed
                        ?>
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Goal Activity
                            </div>
                        <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col"></th>
                                <th scope="col">Sedentary</th>
                                <th scope="col">Lightly Active</th>
                                <th scope="col">Moderately Active</th>
                                <th scope="col">Very Active</th>
                                <th scope="col">Extra Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">Daily Calories</th>
                                <td><?php echo getDailyCalories($goalDays, $adjustedBMRS, 'sed', $totalCaloriesToLose); ?></td>
                                <td><?php echo getDailyCalories($goalDays, $adjustedBMRS, 'light', $totalCaloriesToLose); ?></td></td>
                                <td><?php echo getDailyCalories($goalDays, $adjustedBMRS, 'moderate', $totalCaloriesToLose); ?></td></td>
                                <td><?php echo getDailyCalories($goalDays, $adjustedBMRS, 'very', $totalCaloriesToLose); ?></td></td>
                                <td><?php echo getDailyCalories($goalDays, $adjustedBMRS, 'extra', $totalCaloriesToLose); ?></td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Excercise (Weekly)</th>
                                    <td>Little or No</td>
                                    <td>1-3 Days</td>
                                    <td>3-5 Days</td>
                                    <td>6-7</td>
                                    <td>Athlete, very physical</td>
                                </tr>
                                <tr>
                                <th scope="row">Choose</th>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="weight_goal_daily_calories" value=<?php echo getDailyCalories($goalDays, $adjustedBMRS, 'sed', $totalCaloriesToLose); ?>>
                                        <input type="submit" value="Select" class="btn btn-sm btn-success" name = "select">
                                    </form>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="weight_goal_daily_calories" value=<?php echo getDailyCalories($goalDays, $adjustedBMRS, 'light', $totalCaloriesToLose); ?>>
                                        <input type="submit" value="Select" class="btn btn-sm btn-success" name = "select">
                                    </form>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="weight_goal_daily_calories" value=<?php echo getDailyCalories($goalDays, $adjustedBMRS, 'moderate', $totalCaloriesToLose); ?>>
                                        <input type="submit" value="Select" class="btn btn-sm btn-success" name = "select">
                                    </form>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="weight_goal_daily_calories" value=<?php echo getDailyCalories($goalDays, $adjustedBMRS, 'very', $totalCaloriesToLose); ?>>
                                        <input type="submit" value="Select" class="btn btn-sm btn-success" name = "select">
                                    </form>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="weight_goal_daily_calories" value=<?php echo getDailyCalories($goalDays, $adjustedBMRS, 'extra', $totalCaloriesToLose); ?>>
                                        <input type="submit" value="Select" class="btn btn-sm btn-success" name = "select">
                                    </form>
                                </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </main>
                
<?php include PROJECT_ROOT_PATH . "./includes/footer.php"; ?>
<script src="<?php echo $link_path; ?>/scripts/add_workout.js"></script>