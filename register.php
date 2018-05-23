<?php
//require __DIR__.'/vendor/autoload.php';
include('src/database.php');
include('src/inc.php');
include('src/navbar.php');
session_start();
$db = new Database();
//Good practice to declare arrays for readability
$errors = [];

//REGISTRATION PROCESS//
//1. Check is register button is clicked
if (isset($_POST['register'])) {

    //2. Trim $_POST to remove accidental extra whitespace and put in variable
    $firstname = !empty($_POST['firstname']) ? trim($_POST['firstname']) : null;
    $lastname = !empty($_POST['lastname']) ? trim($_POST['lastname']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $passwordConfirm = !empty($_POST['passwordConfirm']) ? trim($_POST['passwordConfirm']) : null;
    $adminCheck = !empty($_POST['adminCheck']) ? trim($_POST['adminCheck']) : null;

    //3. Check if fields are empty
    if (empty($firstname)) {
        $errors[] = "First name is required!";
    }
    if (empty($lastname)) {
        $errors[] = "Last name is required!";
    }
    if (empty($email)) {
        $errors[] = "Email is required!";
    }
    if (empty($password)) {
        $errors[] = "Password is required!";
    }
    if (empty($passwordConfirm)) {
        $errors[] = "Confirm your password!";
    }
    //only continue when there are no errors
    if (count($errors) == 0) {

        //4. Check if username consists only of letters and spaces
        $result = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[A-Za-z\s]*$/")));

        if ($result == false) {
            $errors[] = "Incorrect name!";
        }
        //5. Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email is not valid!";
        } else {
            // 6. Check if user with this email already exists
            $db = new Database();
            $sql = 'SELECT * FROM users WHERE email = :email';
            $db->query($sql);
            $db->bind(':email', $email);
            $db->execute();
            if ($db->rowCount() > 0) {
                $errors[] = "User with this email already exist!";
            }
        }
        // 6) Check if passwords match
        if ($password != $passwordConfirm) {
            $errors[] = "Passwords don't match";
        }
        //7. If no errors -> Enter the new user in the database
        if (count($errors) == 0) {
            $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)";
            $db->query($sql);
            $db->bind(':firstname', $firstname);
            $db->bind(':lastname', $lastname);
            $db->bind(':email', $email);
            $db->bind(':password', password_hash($password, PASSWORD_BCRYPT));

            if ($db->execute()) {
                $message = 'Successfully created new user';
            } else {
                $message = 'Sorry there must have been an issue creating your account';
            }
            $db = null;
        }
    }
}

if (!empty($message)) :
    ?>
    <p><?= $message ?></p>
<?php endif; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br><br>
            <div class="card">
                <div class="card-header">Create an account</div>

                <!-- implode —> Join array elements with a string and use seperator <br><br> in this case (showing the different error messages under each other)-->
                <p><?php echo implode("<br><br>", $errors); ?></p>

                <div class="card-body">
                    <form method="POST" action="register.php">

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">First name</label>
                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Last name</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passwordConfirm" class="col-md-4 col-form-label text-md-right">Confirm password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="passwordConfirm" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a class="btn btn-link float-right" href="login.php">Already have an account?</a>
        </div>
    </div>
</div>
</html>