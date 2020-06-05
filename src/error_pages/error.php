<!DOCTYPE html>
<html lang='en'>

<head>
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            color: white;
            font-family: Trebuchet MS;
        }

        a {
            color: white;
            font-size: 20px;
            text-decoration: none;
        }

        #error {
            user-select: none;
            font-size: 150px;
            top: 50%;
            left: 50%;
            position: fixed;
            transform: translate(-50%, -50%)
        }
    </style>
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
</head>

<body background="images/big_bang.jpg">
    <div id='error'>
        <?php

        $response = http_response_code();

        ?>
        <span>Error <?php echo $response; ?></span>
    </div>
    <a href="home">Home</a>
</body>

</html>