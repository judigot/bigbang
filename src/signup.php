<?php require './app/Initialize/Start.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require './app/Setup/Initial.php'; ?>
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <script src="js/signup.js" type="text/javascript"></script>
</head>

<body id="signup-body">
    <div id="modal-backdrop">
        <div id="modal-body">
            <div id="form-body">
                <a href="index"><img class="quickform-nav" src="images/favicon.png" alt="App logo"></a>
                <br><br>
                <div>
                    <input type="text" id="firstName" placeholder="First name" class="field">
                    <input type="text" id="lastName" placeholder="Last name" class="field">
                    <input type="email" id="email" placeholder="Email" class="field">
                    <input type="password" id="password" placeholder="Password" class="field">
                    <input type="password" id="confirmPassword" placeholder="Confirm password" class="field">
                    <div id="login-result">&nbsp;</div>
                    <button id="signup-button" class="btn submit-button">SIGN UP</button>
                    <br><br>
                    <span>If you already have an account then <a href="login" id="login-button">log in</a>.</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php require './app/Initialize/End.php'; ?>