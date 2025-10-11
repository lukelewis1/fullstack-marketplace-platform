<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

<?php

$username = $_POST['username'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$f_name = $_POST['fname'] ?? null;
$l_name = $_POST['lname'] ?? null;
$dob = $_POST['dob'] ?? null;
$admin = false;
$acc_status = 0;
$role = $_POST['role'] ?? null;
$credits = 5;

if ($username != null) {
    require_once './inc/dbconn.inc.php';

    $hashed_password = hash('sha256', $password);

    $sql = "
    INSERT INTO Users (user_name, email, hashed_password, f_name, l_name, dob, is_admin, acc_status, role, fuss_credit) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $sql);
    mysqli_stmt_bind_param(
            $statement, 'ssssssiisi',
            $username, $email, $hashed_password, $f_name, $l_name, $dob, $admin, $acc_status, $role, $credits
    );

    if (!mysqli_stmt_execute($statement)) {
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUSS</title>
    <link rel="stylesheet" href="login/style.css">
    <link rel="icon" href="images/site/flinderslogo.png">

</head>
<body>
<div class="step-wrapper">
<div class="container visible" id="step1">
    <div class="curved-shape"></div>
    <div class="curved-shape2"></div>
    <div class="form-box Login">
        <h2 id="login-btn" class="animation" style="--D:0; --S:21">Login</h2>
        <form action="login/loader.php" method="post">
            <div class="input-box animation" style="--D:1; --S:22">
                <input type="text" required name="username_log">
                <label for="">Username</label>
            </div>

            <div class="input-box animation" style="--D:2; --S:23">
                <input type="password" required name="password_log">
                <label for="">Password</label>
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
        <form method="post">
            <div class="input-box animation" style="--li:18; --S:1" id="reg-username">
                <input type="text" required name="username" id="username">
                <label for="">Username</label>
                <span class="error-msg" id="username-error"></span>
            </div>

            <div class="input-box animation" style="--li:19; --S:2">
                <input type="email" id="email" required name="email">
                <label for="">Flinders Uni Email</label>
                <span class="error-msg" id="email-error"></span>
            </div>

            <div class="input-box animation" style="--li:20; --S:4">
                <button class="btn" type="button" name="register" id="register-btn">Register</button>
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
<div class="register-form hidden" id="step2">
    <div class="full-reg-form">
        <form id="reg-form" method="post" action="index.php">
            <div class="reg-fields">
                <input type="text" name="username" id="final-username" readonly required>
                <label for="">Username</label>
            </div>

            <div class="reg-fields">
                <input type="text" name="email" id="final-email" readonly required>
                <label for="">Email</label>
            </div>

            <div class="reg-fields">
                <input type="password" name="password" required id="pass">
                <label for="">Password</label>
                <span class="error-msg "id="password-error"></span>
            </div>

            <div class="reg-fields">
                <input type="password" name="password-confirm" required id="pass-con">
                <label for="">Confirm Password</label>
                <span class="error-msg "id="password-confirm-error"></span>
            </div>

            <div class="reg-fields">
                <input type="text" name="fname" required id="fname">
                <label for="">First Name</label>
                <span class="error-msg "id="fname-error"></span>
            </div>

            <div class="reg-fields">
                <input type="text" name="lname" required id="lname">
                <label for="">Last Name</label>
                <span class="error-msg "id="lname-error"></span>
            </div>

            <div class="reg-fields">
                <input type="date" name="dob" required>
                <label for="">Date of Birth</label>
            </div>

            <div class="reg-fields">
                <input type="text" name="role" id="role">
                <label for="">Role/Degree</label>
                <span class="error-msg "id="role-error"></span>
            </div>

            <div class="reg-fields" id="tc">
                <label for="tc">Terms and Conditions</label>
                <input type="checkbox" id="tc" name="tc" required>
            </div>

            <div class="submit-btn">
                <button class="btn" type="submit" name="full-reg">Register</button>
            </div>
        </form>
    </div>
</div>
</div>

<script>
    console.log("Script loaded");

    document.getElementById('register-btn').addEventListener('click', function() {
        console.log("Register button clicked");
    });

    document.getElementById('register-btn').addEventListener('click', function() {
        const username = document.getElementById('username').value.trim();
        const email = document.getElementById('email').value.trim();


        document.getElementById('username-error').textContent = '';
        document.getElementById('email-error').textContent = '';

        fetch('./login/validate.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: new URLSearchParams({username, email})
        })
            .then(res => res.json())
            .then(data => {
                if (!data.valid) {
                    if (data.errors.username) {
                        document.getElementById('username-error').textContent = data.errors.username;
                    }
                    if (data.errors.email) {
                        document.getElementById('email-error').textContent = data.errors.email;
                    }
                } else {
                    document.getElementById('final-email').value = email;
                    document.getElementById('final-username').value = username;

                    const step1 = document.getElementById('step1');
                    const step2 = document.getElementById('step2');

                    step1.classList.remove('visible');
                    step1.classList.add('hidden');

                    setTimeout(() => {
                        step2.classList.remove('hidden');
                        step2.classList.add('visible');
                    }, 500);
                }
            })
            .catch(err => console.error("Validation error:", err));
    });
</script>

<script src="login/signup_validator.js"></script>

</body>
</html>
<script  src="login/script.js"></script>

