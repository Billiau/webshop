<?php
//require __DIR__.'/vendor/autoload.php';
include('src/database.php');
include('src/inc.php');
include('src/navbar.php');
$db = new Database();
session_start();
//Good practice to declare arrays for readability
$errors = [];
$results = [];

//set onlyOne to true to make sure you can only order one broodje
$_SESSION['onlyOne'] = true;
if (isset($_SESSION['user_id'])) {
    header("Location:index.php");
}
//LOGIN PROCESS//
//1. Check if login button is clicked
if (isset($_POST['login'])) {

    //2. Trim $_POST to remove accidental extra whitespace and put in variable
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

    //3. Check if fields are empty
    if (empty($email)) {
        $errors[] = "Email is required!";
    }
    if (empty($password)) {
        $errors[] = "Password is required!";
    }
    //4. Validate email when there are no errors
    if (count($errors) == 0) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email is not valid!";
        } else {
            //5. Check to see if email exists in database
            $sql = "SELECT * FROM users WHERE email = :email";
            $db->query($sql);
            $db->bind(':email', $email);
            $db->execute();
            //6. Check if email is found in database
            if ($db->rowCount() == 0) {
                $errors[] = "Sorry, user with email : " . $email . " doesn't exist in our database";
            }
        }
        if (count($errors) == 0) {
            $results = $db->single();
            //7. Check if passwords match
            if (!password_verify($_POST['password'], $results['password'])) {
                $errors[] = "Password for " . $email . " is not correct";
            } else {
                $_SESSION['user_id'] = $results['ID'];
                $_SESSION['user_type'] = $results['user_type'];
                $_SESSION['blocked'] = $results['blocked'];
                header("Location:index.php");
            }
        }
    }
}
?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br>
                <div class="card">
                    <div class="card-header">Log in</div>                
                    <div class="card-body">
                        <form method="post" action="login.php">
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember">Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" name="login" class="btn btn-primary">Log in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>      
            <div class="col-md-8">
                <a class="btn btn-link float-left" href="#">Forgot password?</a>    
                <a class="btn btn-link float-right" href="register.php">Don't have an account?</a>
            </div>
        </div>
    </div>
</body>