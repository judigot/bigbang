<?php require './app/Initialize/Start.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require './app/Setup/Initial.php'; ?>
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <script src="js/login.js" type="text/javascript"></script>
</head>

<body id="login-body">
    <div id="modal-backdrop">
        <div id="modal-body">
            <div id="form-body">
                <a href="index"><img class="quickform-nav" src="images/favicon.png" alt="App logo"></a>
                <span id="first-name"></span>
                <div>
                    <input id="email" class="field" type="email" placeholder="Email" <?php echo isset($_SESSION["userEmail"]) ? " value=\"{$_SESSION["userEmail"]}\"" : false; ?>>
                    <input id="password" class="field" type="password" placeholder="Password">
                    <div id="login-result"></div>
                    <button class="btn submit-button" id="login-button">LOG IN</button>
                    <br><br>
                    <span>If you don't have an account then <a href="signup">sign up</a>.</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php require './app/Initialize/End.php'; ?>