<?php
include '../php/sessionVerify.php';

?>
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
  <?php
  $currentPage = basename($_SERVER['PHP_SELF']);
  include '../components/navbar.php';
  ?>

  <form class="container" action="" method="post">
    <h1>Demand Type</h1>
    <div class="box">
      <input required type="text" name="demandTypeID" />
      <span>Demand Type</span>
    </div>



    <div class="box checkbox-status">
      <label for="byear">Status: </label>
      <input required type="checkbox" name="status" value="1" />
    </div>

    <div class="box">
      <input class="submit" type="submit" value="submit" name="submit" />
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
    $demandID = $_POST['demandID'];
    $demandTypeID = $_POST['demandTypeID'];
    $status = $_POST['status'];

    $sql = "INSERT INTO `demandtype` (demand_type_id, descrip, currStatus)
     VALUES ('$demandID', '$demandTypeID', '$status')";

    if ($conn->query($sql) === true) {
      echo '<script>alert("Data inserted successfully!")</script>';


    } else {
      echo "failed to add new records.";
    }
    $conn->close();
  }

  ?>
  <script src="../src/index.js"></script>
</body>

</html>