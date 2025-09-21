<?php
$conn = include("./inc/dbconn.inc.php");

$error_username = "";
$error_email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);

    // Check username
    $stmt = $conn->prepare("SELECT id FROM Users WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $error_username = "This username is already in use.";
    }
    $stmt->close();

    // Check email
    $stmt = $conn->prepare("SELECT id FROM Users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $error_email = "This email already has an account.";
    }
    $stmt->close();

    // If no errors → redirect
    if (empty($error_username) && empty($error_email)) {
        header("Location: login_start/sign_up.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Animated Login &amp; Register Form</title>
    <link rel="stylesheet" href="./login_start/style.css">

</head>
<body>
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

<script src="index.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</body>
</html>
<script  src="./login_start/script.js"></script>

</body>
</html>
