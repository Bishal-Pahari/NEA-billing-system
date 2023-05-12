<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment</title>

    <link rel="stylesheet" href="../src/styles.css" />
  </head>
  <body>
    <nav class="navbar">
      <img
        src="../assets/images/neaLogo.png"
        alt="Logo of NEA"
        class="logo-img"
      />

      <button class="btn-primary" onclick="submit">Sign In</button>
    </nav>

    <form class="container" action="" method="post">
      <h1>Payment Type</h1>
      <div class="box">
        <input required type="text" name="pid" />
        <span>Payment ID</span>
      </div>

      <div class="box">
        <input required type="text" name="bid" />
        <span>Bill ID</span>
      </div>

      <div class="box">
        <input required type="date" name="pdate" />
        <span>Payment Date</span>
      </div>

      <div class="box">
        <input required type="text" name="pamount" />
        <span>Payment Amount</span>
      </div>

      <div class="box">
        <input required type="text" name="paymentTypeId" />
        <span>Payment type ID</span>
      </div>

      <div class="box">
        <input required type="text" name="rebeatAmount" />
        <span>Rebeat Amount</span>
      </div>

      <div class="box">
        <input required type="text" name="fineAmount" />
        <span>Fine Amount</span>
      </div>
     
      <div class="box">
        <input class="submit" type="submit" value="Submit" />
      </div>
    </form>

    <footer>
      <p>
        Copyright © <span id="year-change"></span> Nepal Electricity Authority ❘
        All Rights Reserved.
      </p>
    </footer>

    <script src="../src/index.js"></script>
  </body>
</html>
