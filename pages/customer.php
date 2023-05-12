<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Demand</title>

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
      <h1>Add Customer Detail</h1>
      <div class="box">
        <input required type="text" name="scno" />
        <span>SC NO.</span>
      </div>

      <div class="box">
        <input required type="text" name="cusid" />
        <span>Customer ID</span>
      </div>

      <div class="box">
        <input required type="name" name="fname" />
        <span>Full Name</span>
      </div>

      <div class="box">
        <input required type="name" name="address" />
        <span>Address</span>
      </div>

      <div class="box">
        <input required type="name" name="mobno" />
        <span>Mobile No</span>
      </div>

      <div class="box">
        <label for="branchID">Branch ID: </label>
        <select name="branchID">
            <option value="101">101</option>
            <option value="102">102</option>
            <option value="103">103</option>
        </select>
      </div>

      <div class="box">
        <label for="demandTypeID">Demand Type ID: </label>
        <select name="demandTypeID">
             <option value="5A">5AMP</option>
             <option value="10A">10AMP</option>
             <option value="15A">15AMP</option>
        </select>
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
