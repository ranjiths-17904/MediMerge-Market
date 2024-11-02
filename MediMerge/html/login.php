<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Sign Up | Log In</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">
                Account
            </div>
            <div class="title signup">
                Account
            </div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">SignUp</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form action="login1.php" method="POST" class="login">
                    <div class="field">
                        <input type="text" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="pass-link">
                        <a href="#">Reset password?</a>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login">
                    </div>
                    <div class="signup-link">
                        Don't Have Account? <a href="">Create A New</a><br>
                        <a href="medico.html">Home</a>
                    </div>
                </form>
                <form action="signup.php" method="POST" class="signup">
                    <div class="field">
                        <input type="text" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="field">
                        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="SignUp"><br><br>
                    </div>
                    <a style="padding-left: 44%; padding-top: 2px;" href="medico.html">Home</a>
                </form>
            </div>
        </div>
    </div>
    <script src="style.js"></script>
</body>
</html>
