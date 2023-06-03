<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Demand</title>

  <link rel="stylesheet" href="../src/styles.css" />
</head>


//db connect
<?php
include("../php/dbconnect.php"); //DB connection
$branchQuery = "SELECT branch_id, branch_name FROM branch";
$branchResult = $conn->query($branchQuery);

$demandQuery = "SELECT demand_type_id, descrip FROM demandtype";
$demandResult = $conn->query($demandQuery);
?>

<body>
  <nav class="navbar">
    <img src="../assets/images/neaLogo.png" alt="Logo of NEA" class="logo-img" />

    <div class="nav-btn">
      <a href="../index.php"><button class="btn-primary" onclick="submit">HomePage</button></a>

      <button class="btn-primary" onclick="submit">Sign In</button>
    </div>
  </nav>

  <form class="container" action="" method="post">
    <h1>Add Customer Detail</h1>
    <div class="box">
      <input required type="text" name="scno" />
      <span>SC NO.</span>
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
        <!-- <option value="101">101</option>
        <option value="102">102</option>
        <option value="103">103</option> -->
        <?php
        while ($row = $branchResult->fetch_assoc()) {
          echo "<option value='" . $row['branch_id'] . "'>" . $row['branch_name'] . "</option>";
        }
        ?>
      </select>
    </div>

    <div class="box">
      <label for="demandTypeID">Demand Type ID: </label>
      <select name="demandTypeID">
        <!-- <option value="1">5AMP</option>
        <option value="2">10AMP</option>
        <option value="3">15AMP</option> -->
        <?php
        while ($row = $demandResult->fetch_assoc()) {
          echo "<option value='" . $row['demand_type_id'] . "'>" . $row['descrip'] . "</option>";
        }
        ?>
      </select>
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
  

  if (isset($_POST['submit'])) {
    $scnd = $_POST['scno'];
    $cusid = $_POST['cusid'];
    $fname = $_POST['fname'];
    $address = $_POST['address'];
    $mobno = $_POST['mobno'];
    $branchID = $_POST['branchID'];
    $demandTypeID = $_POST['demandTypeID'];

    $sql = "INSERT INTO `customer` (SCND, Fullname, AddressName, MobileNo, BranchId, demand_type_id) 
    VALUES ('$scnd', '$fname', '$address', '$mobno', '$branchID', '$demandTypeID')";

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