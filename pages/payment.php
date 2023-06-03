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
    <img src="../assets/images/neaLogo.png" alt="Logo of NEA" class="logo-img" />

    <div class="nav-btn">
      <a href="../index.php"><button class="btn-primary" onclick="submit">HomePage</button></a>

      <button class="btn-primary" onclick="submit">Sign In</button>
    </div>
  </nav>

  <form class="container" action="" method="post">
    <h1>Payment Type</h1>


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
      <input class="submit" type="submit" value="Submit" name="submit" />
    </div>
  </form>

  <footer>
    <p>
      Copyright © <span id="year-change"></span> Nepal Electricity Authority ❘
      All Rights Reserved.
    </p>
  </footer>

  <?php
  // $servername = 'localhost';
  // $username = 'root';
  // $password = '';
  // $dbname = "billing_system";
  
  // $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  // if ($conn->connect_error) {
  //   die("Connection failed: " . $conn->connect_error);
  // }
  
  include("../php/dbconnect.php");

  if (isset($_POST['submit'])) {
    $pid = $_POST['pid'];
    $bid = $_POST['bid'];
    $pdate = $_POST['pdate'];
    $pamount = $_POST['pamount'];
    $paymentTypeId = $_POST['paymentTypeId'];
    $rebeatAmount = $_POST['rebeatAmount'];
    $fineAmount = $_POST['fineAmount'];

    $sql = "INSERT INTO `payment` ( BID, PDate, PAmount, Payment_Option_Id, Rebeat_Amt, Fine_Amt) 
    VALUES ( '$bid', '$pdate', '$pamount', '$paymentTypeId', '$rebeatAmount', '$fineAmount')";

    if ($conn->query($sql) === true) {
      echo '<script>alert("Data inserted successfully!")</script>';


    } else {
      echo "failed to add new records.";
    }
    $conn->close();
  }

  ?>
</body>

</html>