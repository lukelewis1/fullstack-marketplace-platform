
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUSS Welcome Page</title> 
    <link rel="stylesheet" href="./login_start/style.css">
    <link rel="icon" href="images/flinderslogo.png">

</head>
<body>
<div class="step-wrapper">
<div class="container visible" id="step1">
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
        <form method="post">
            <div class="input-box animation" style="--li:18; --S:1" id="reg-username">
                <input type="text" required name="username" id="username">
                <label for="">Username</label>
                <span class="error-msg" id="username-error"></span>
                <box-icon type='solid' name='user' color="gray"></box-icon>
            </div>

            <div class="input-box animation" style="--li:19; --S:2">
                <input type="email" id="email" required name="email">
                <label for="">Flinders Uni Email</label>
                <span class="error-msg" id="email-error"></span>
                <box-icon name='envelope' type='solid' color="gray"></box-icon>
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
        <form>
            <div class="reg-fields">
                <input type="text" name="username" id="final-username" readonly required>
                <label for="">Username</label>
            </div>

            <div class="reg-fields">
                <input type="text" name="email" id="final-email" readonly required>
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
    document.getElementById('register-btn').addEventListener('click', function() {
        const username = document.getElementById('username').value.trim();
        const email = document.getElementById('email').value.trim();

        // clear old errors
        document.getElementById('username-error').textContent = '';
        document.getElementById('email-error').textContent = '';

        fetch('./login_start/validate.php', {
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
                    // ✅ Hide step1 and show step2

                    // ✅ Transition out step1, transition in step2
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


</body>
</html>
<script  src="./login_start/script.js"></script>

