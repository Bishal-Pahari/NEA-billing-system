<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>branch</title>

  <link rel="stylesheet" href="../src/styles.css" />
</head>

<body>
  <?php
  $currentPage = basename($_SERVER['PHP_SELF']);
  include '../components/navbar.php';
  ?>

  <form class="container" action="" method="post">
    <h1>Add Branch</h1>


    <div class="box">
      <input required type="text" name="bname" />
      <span>Branch Name</span>
    </div>

    <div class="box checkbox-status">
      <label for="byear">Status: </label>
      <input type="checkbox" name="status" value="1" />
    </div>

    <div class="box">
      <input class="submit" type="submit" name="submit" />
    </div>
  </form>

  <footer>
    <p>
      Copyright © <span id="year-change"></span> Nepal Electricity Authority ❘
      All Rights Reserved.
    </p>
  </footer>

  <?php
  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $dbname = "billing_system";
  
  // $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  // if ($conn->connect_error) {
  //   die("Connection failed: " . $conn->connect_error);
  // }
  include("../php/dbconnect.php");

  if (isset($_POST['submit'])) {
    $bid = $_POST['bid'];
    $bname = $_POST['bname'];
    $status = $_POST['status'];

    $sql = "INSERT INTO `branch` ( branch_name, currStatus) VALUES ( '$bname', '$status')";

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