<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUSS</title>
    <link rel="icon" href="../images/site/flinderslogo.png">
    <link rel="stylesheet" href="signup_style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="full-reg-form">
    <div id="title-msg">
        Looks like this is your first time signing up, if you would like you can upload a profile picture and a bio. If not that's all good just hit the submit button.
    </div>

    <div class="div-with-line">
    </div>

    <form id="full-sign" method="post" action="first_time_loader.php" enctype="multipart/form-data">

        <div class="first-time-su">
            <p class="upload-label">Upload a Profile Picture:</p>
            <label id="drop-area">
                <img src="../images/site/upload-icon.jpg" alt="Upload Icon" class="upload-icon">
                <span>Drag & drop or click to upload</span>
                <input type="file" name="pfp" accept="image/*" id="pfp" hidden>
            </label>
        </div>

        <br>

        <div class="div-with-line">
        </div>

        <div class="first-time-su" id="bio-box">
            <label for="bio">
                Enter a bio about yourself, mention any skills you may be interested in.
                <span id="char-remaining">500</span> characters remaining:
            </label><br>
            <textarea name="bio" id="bio" maxlength="500"></textarea>
        </div>

        <br>

        <div class="first-time-su">
            <button class="btn" type="submit" name="first-time">Submit</button>
        </div>

    </form>
</div>

<script>

    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('pfp');

    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('dragover');
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('dragover');
    });

    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dropArea.classList.remove('dragover');
        if (e.dataTransfer.files.length) {
            fileInput.files = e.dataTransfer.files;
            console.log("File selected:", fileInput.files[0]);
        }
    });

    const bio = document.getElementById('bio');
    const charRemaining = document.getElementById('char-remaining');
    const submitBtn = document.querySelector('button[name="first-time"]');
    const maxLength = 500;

    bio.addEventListener('input', () => {
        const remaining = maxLength - bio.value.length;
        charRemaining.textContent = remaining;

        if (remaining < 0) {
            submitBtn.disabled = true;
            submitBtn.style.opacity = "0.5";
            submitBtn.style.cursor = "not-allowed";
        } else {
            submitBtn.disabled = false;
            submitBtn.style.opacity = "1";
            submitBtn.style.cursor = "pointer";
        }
    });

</script>

</body>
</html>
