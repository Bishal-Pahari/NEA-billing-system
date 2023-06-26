<?php include('functions.php') ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./src/styles.css">
</head>

<body>

    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    include './components/navbar.php';
    ?>


    <form class="container" method="post" action="login.php">
        <h1>Login</h1>

        <?php echo display_error(); ?>

        <div class="input-group box">
            <input type="text" name="username" required>
            <span>Username</span>
        </div>
        <div class="input-group box">

            <input type="password" name="password" required>
            <span>Password</span>

        </div>
        <div class="input-group box">
            <button type="submit" class="btn submit" name="login_btn">Login</button>
        </div>
        <p>
            Not yet a member? <a href="register.php"> <span style="color:#0C6D9E; font-weight:600"> Sign up</span> </a>
        </p>
    </form>


</body>

</html>


<!-- new -->