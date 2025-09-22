<?php

$conn = require_once './inc/dbconn.inc.php';

$user = $_POST['username'] ?? "Oliver";
$email = $_POST['email'] ?? "email@flinders.edu.au";
//$valid_email = true;
//$valid_user = true;
//$username_error = '';
//$email_error = '';
//
//if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//    $valid_email = false;
//} else if (!str_ends_with($email, "@flinders.edu.au")) {
//    $valid_email = false;
//}
//
//if ($valid_email) {
//    $sql = 'SELECT user_name, email FROM Users WHERE user_name = ? OR email = ?;';
//    $statement = mysqli_stmt_init($conn);
//    mysqli_stmt_prepare($statement, $sql);
//    mysqli_stmt_bind_param($statement, 'ss', $user, $email);
//
//    if (mysqli_stmt_execute($statement)) {
//        $result = mysqli_stmt_get_result($statement);
//
//        if ($result && $result->num_rows > 0) {
//            while ($row = $result->fetch_assoc()) {
//                if ($row['user_name'] == $user) {
//                    $valid_user = false;
//                    $username_error = "This username is currently associated with another account please try something else";
//                }
//                if ($row['email'] == $email) {
//                    $valid_email = false;
//                    $email_error = "This email is already associated with an account, if this is your email please try logging in";
//                }
//            }
//        } else if ($result && $result->num_rows == 0) {
//            //transform page into full form sign in
//        }
//    } else {
//        echo mysqli_error($conn);
//    }
//} else {
//    $email_error = "Invalid email address ensure you're using a @flinders.edu.au address";
//}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUSS Welcome Page</title> 
    <link rel="stylesheet" href="./login_start/style.css">

</head>
<body>
<div class="container">
    <div class="curved-shape"></div>
    <div class="curved-shape2"></div>
    <div class="form-box Login">
        <h2 id="login-btn" class="animation" style="--D:0; --S:21">Login</h2>
        <form action="#">
            <div class="input-box animation" style="--D:1; --S:22">
                <input type="text" required>
                <label for="">Username</label>
                <box-icon type='solid' name='user' color="gray"></box-icon>
            </div>

            <div class="input-box animation" style="--D:2; --S:23">
                <input type="password" required>
                <label for="">Password</label>
                <box-icon name='lock-alt' type='solid' color="gray"></box-icon>
            </div>

            <div class="input-box animation" style="--D:3; --S:24">
                <button class="btn" type="submit">Login</button>
            </div>

            <div class="regi-link animation" style="--D:4; --S:25">
                <p>Don't have an account? <br> <a href="#" class="SignUpLink">Sign Up</a></p>
            </div>
        </form>
    </div>

    <div class="info-content Login">
        <h2 class="animation" style="--D:0; --S:20">WELCOME BACK!</h2>
        <p class="animation" style="--D:1; --S:21">Flinders University Skill Share is excited to see you back. <br>Login to see what's been happening and what new skills are being shared.</p>
    </div>

    <div class="form-box Register">
        <h2 id="register" class="animation" style="--li:17; --S:0">Register</h2>
        <form action="index.php" method="post">
            <div class="input-box animation" style="--li:18; --S:1">
                <input type="text" required name="username">
                <label for="">Username</label>
                <box-icon type='solid' name='user' color="gray"></box-icon>
            </div>

            <div class="input-box animation" style="--li:19; --S:2">
                <input type="email" id="email" required name="email">
                <label for="">Flinders Uni Email</label>
                <box-icon name='envelope' type='solid' color="gray"></box-icon>
            </div>

            <div class="input-box animation" style="--li:20; --S:4">
                <button class="btn" type="submit" name="register">Register</button>
            </div>

            <div class="regi-link animation" style="--li:21; --S:5">
                <p>Already have an account? <br> <a href="#" class="SignInLink">Sign In</a></p>
            </div>
        </form>
    </div>

    <div class="info-content Register">
        <h2 class="animation" style="--li:17; --S:0">WELCOME!</h2>
        <p class="animation" style="--li:18; --S:1">Flinders University Skill Share is always excited to see new faces. If your new to flinders and need help <a id="click-me" href="https://students.flinders.edu.au/support" target="_blank">click me.</a></p>
    </div>

</div>
<div class="register-form">
    <div class="full-reg-form">
        <form>
            <div class="reg-fields">
                <input type="text" name="username" value="<?php echo htmlspecialchars($user); ?>" readonly required>
                <label for="">Username</label>
            </div>

            <div class="reg-fields">
                <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly required>
                <label for="">Email</label>
            </div>

            <div class="reg-fields">
                <input type="password" name="password" required>
                <label for="">Password</label>
            </div>

            <div class="reg-fields">
                <input type="password" name="password-confirm" required>
                <label for="">Confirm Password</label>
            </div>

            <div class="reg-fields">
                <input type="text" name="fname" required>
                <label for="">First Name</label>
            </div>

            <div class="reg-fields">
                <input type="text" name="lname" required>
                <label for="">Last Name</label>
            </div>

            <div class="reg-fields">
                <input type="date" name="dob" required>
                <label for="">Date of Birth</label>
            </div>

            <div class="reg-fields">
                <input type="text" name="role">
                <label for="">Role/Title</label>
            </div>

            <div class="reg-fields">
                <label for="tc">Terms and Conditions</label>
                <input type="checkbox" id="tc" name="tc" required>
            </div>

            <div class="submit-btn">
                <button class="btn" type="submit" name="full-reg">Register</button>
            </div>
        </form>
    </div>
</div>

<script src="index.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</body>
</html>
<script  src="./login_start/script.js"></script>

