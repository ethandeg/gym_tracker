<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidenav.php"; ?>
<?php $password = $user['password'];?>
            <div id="layoutSidenav_content">
                <main>
                    <?php 
                    if(isset($_POST['edit_profile'])){
                        unset($_POST['edit_profile']);
                        $_POST['user_weight'] = (int)$_POST['user_weight'];
                        $_POST['user_firstname'] = mysqli_real_escape_string($connection, $_POST['user_firstname']);
                        $_POST['user_lastname'] = mysqli_real_escape_string($connection, $_POST['user_lastname']);
                        $_POST['password'] = mysqli_real_escape_string($connection, $_POST['password']);
                        // $_POST['user_email'] = mysqli_real_escape_string($connection, $_POST['user_email']);
                        updateColumn('users', $_POST);
                        header("Location: edit_profile.php");
                    }
                    ?>
                    <div class="container-fluid px-4">
                    <h1 class="mt-4 text-center">Add Workout</h1>   
            
                    <form class = "px-5 py-5" action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value = "<?php echo $username; ?>" disabled>
                           
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="user_firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="user_firstname" name="user_firstname" value="<?php echo $user_firstname; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="user_lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="user_lastname" name="user_lastname" value="<?php echo $user_lastname; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="user_email" name="user_email" value="<?php echo $user_email; ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="user_weight" class="form-label">Weight</label>
                            <input type="number" class="form-control" id="user_weight" name="user_weight" value="<?php echo $user_weight; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="user_goal_weight" class="form-label">Goal Weight</label>
                            <input type="number" class="form-control" id="user_goal_weight" name="user_goal_weight" value="<?php echo $user_goal_weight; ?>">
                        </div>
                        <!-- <div class="mb-3 form-check">
                        <label for="workout_date">Workout Date</label>
                            <input type="date" id="workout_date" name="workout_date" class="" value = "<?php echo $today; ?>">
                        </div> -->
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary" type="submit" name="edit_profile">Edit Profile</button>
                        </div>  
                    </form>
                    </div>
                </main>
<?php include "includes/footer.php"; ?>
<script src="scripts/add_workout.js"></script>
