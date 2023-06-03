<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Payment Option</title>

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
    <h1>Payment Option Type</h1>


    <!-- <div class="box">
      <label for="paymentMethod">Payment Method: </label>
      <select name="paymentMethod">
        <option value="eSewa">eSewa</option>
        <option value="Khalti">Khalti</option>
        <option value="FonePay">FonePay</option>
      </select>
    </div> -->

    <div class="box">
      <input required type="text" name="Payment Method" />
      <span>Payment Method</span>
    </div>

    <div class="box checkbox-status">
      <label for="byear">Status: </label>
      <input type="checkbox" name="currStatus" value="1" />
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
    $poid = $_POST['poid'];
    $paymentMethod = $_POST['paymentMethod'];
    $currStatus = $_POST['currStatus'];

    $sql = "INSERT INTO `payment_option` (POID, paymentMethod, currStatus) VALUES ('$poid', '$paymentMethod', '$currStatus')";

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