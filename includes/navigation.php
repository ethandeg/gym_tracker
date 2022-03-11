<?php if(!$_SESSION['user_id']){
        header("location: ./register.php");
    } else {
        $user_id = (int)$_SESSION['user_id'];
        $user = find_user('user_id', $user_id);
        $user_firstname = $user['user_firstname'];
        $user_lastname = $user['user_lastname'];
        $user_weight = $user['user_weight'];
        $username = $user['username'];
        $user_email = $user['user_email'];
        $user_goal_weight = $user['user_goal_weight'];
        $user_dob = $user['user_dob'];
        $user_gender = $user['user_gender'];
        $user_date_created = $user['user_date_created'];
        $user_height = $user['user_height'];
    }
    // echo "<pre>"; 
    // print_r($_SERVER);
    // echo "</pre>"; 
    ?>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?php echo $link_path; ?>/index.php">Gym Tracker</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" /> -->
                    <!-- <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo $link_path; ?>/edit_profile.php">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo $link_path; ?>/includes/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>