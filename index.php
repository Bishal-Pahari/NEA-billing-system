<?php
include('functions.php');

if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to Homepage!</title>
  <link rel="stylesheet" type="text/css" href="./src/styles.css">
</head>

<body>
  <?php
  $currentPage = basename($_SERVER['PHP_SELF']);
  include './components/navbar.php';
  ?>


  <div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])): ?>
      <div class="error success">
        <h3>
          <?php
          echo $_SESSION['success'];
          unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    <div class="container">

      <?php if (isset($_SESSION['user'])): ?>
        <h1>Hello,
          <?php echo $_SESSION['user']['username']; ?>
        </h1>
        <h3 style="text-align: center;">
          <i>(
            <?php echo ucfirst($_SESSION['user']['user_type']); ?>)
          </i>
        </h3>




      <?php endif ?>
    </div>

  </div>
</body>

</html>