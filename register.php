<?php include('functions.php') ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="./src/styles.css">
</head>

<body>
    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    include './components/navbar.php';
    ?>

    <form class="container" method="post" action="register.php">
        <h1>Register</h1>
        <?php echo display_error(); ?>

        <div class="input-group box">
            <input type="text" name="username" value="<?php echo $username; ?>">
            <span>Username</span>
        </div>
        <div class="input-group box">
            <input type="email" name="email" value="<?php echo $email; ?>">
            <span>Email</span>
        </div>
        <div class="input-group box">
            <input type="password" name="password_1">
            <span>Password</span>

        </div>
        <div class="input-group box">
            <input type="password" name="password_2">
            <span>Confirm Password</span>
        </div>
        <div class="input-group box">
            <button type="submit" class="btn submit" name="register_btn">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php"><span style="color:#0C6D9E; font-weight:600"> Sign in</span> </a>
        </p>
    </form>
</body>

</html>