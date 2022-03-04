<?php include "includes/header.php"; ?>
<?php
if(isset($_POST['create_account'])){
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    if($password === $password_confirm){
       create_user($_POST);
       $user = find_user('username', $_POST['username']);
       $_SESSION['user_id'] = $user['user_id'];
       header("Location: index.php");
    } else {
        echo "<h6>Passwords must match</h6>";
    }
}

?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                        <div class="form-floating mb-3">
                                                <input class="form-control" id="username" type="text" placeholder="username" name="username"/>
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="user_firstname" type="text" placeholder="Enter your first name" name="user_firstname" />
                                                        <label for="user_firstname">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="user_lastname" type="text" placeholder="Enter your last name" name="user_lastname"/>
                                                        <label for="user_lastname">Last name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="user_email" type="email" placeholder="name@example.com" name="user_email"/>
                                                <label for="user_email">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password" type="password" placeholder="Create a password" name="password"/>
                                                        <label for="password">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password_confirm" type="password" placeholder="Confirm password" name="password_confirm"/>
                                                        <label for="password_confirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type = "submit" class="btn btn-primary btn-block" name="create_account">Create Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <?php include "includes/footer.php"; ?>