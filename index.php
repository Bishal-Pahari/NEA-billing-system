<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Billing</title>

    <link rel="stylesheet" href="./src/styles.css" />
  </head>
  <body>
    <nav class="navbar">
      <img
        src="./assets/images/neaLogo.png"
        alt="Logo of NEA"
        class="logo-img"
      />

      <button class="btn-primary" onclick="submit">Sign In</button>
    </nav>

    <div class="container homepage-container">
      <h1>Admin PANEL</h1>
      <ul>
        <li><a class="pages-redirect" href="./pages/bill.php">Add Bill</a></li>
        <li>
          <a class="pages-redirect" href="./pages/branch.php">Add Branch</a>
        </li>
        <li>
          <a class="pages-redirect" href="./pages/customer.php"
            >Add Customer Details</a
          >
        </li>
        <li>
          <a class="pages-redirect" href="./pages/demand.php"
            >Add Demand type</a
          >
        </li>
        <li>
          <a class="pages-redirect" href="./pages/payment.php">Add Payment</a>
        </li>
        <li>
          <a class="pages-redirect" href="./pages/paymentOption.php"
            >Add Payment Option</a
          >
        </li>
      </ul>
    </div>

    <footer>
      <p>
        Copyright © <span id="year-change"></span> Nepal Electricity Authority ❘
        All Rights Reserved.
      </p>
    </footer>

    <script src="/src/index.js"></script>
  </body>
</html>
