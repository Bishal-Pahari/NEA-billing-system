<?php
include '../php/sessionVerify.php';

?>

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
  <?php
  $currentPage = basename($_SERVER['PHP_SELF']);
  include '../components/navbar.php';
  ?>
  \
  <form class="container" action="" method="post">
    <h1>Bill</h1>


    <div class="box">
      <input required type="date" name="bdate" />
      <span>Bill Date</span>
    </div>

    <div class="box">
      <label for="byear">Bill Year: </label>
      <select name="byear">
        <option value="2080">2080</option>
        <option value="2079">2079</option>
        <option value="2078">2078</option>
        <option value="2077">2077</option>
        <option value="2076">2076</option>
        <option value="2075">2075</option>
        <option value="2074">2074</option>
        <option value="2073">2073</option>
        <option value="2072">2072</option>
        <option value="2071">2071</option>
        <option value="2070">2070</option>
        <option value="2069">2069</option>
      </select>
    </div>

    <div class="box">
      <label for="byear">Bill Month: </label>
      <select name="bmonth">
        <option value="Baisakh">Baisakh</option>
        <option value="Jestha">Jestha</option>
        <option value="Aasadh">Aasadh</option>
        <option value="Shrawan">Shrawan</option>
        <option value="Bhadra">Bhadra</option>
        <option value="Asoj">Asoj</option>
        <option value="Kartik">Kartik</option>
        <option value="Mangsir">Mangsir</option>
        <option value="Poush">Poush</option>
        <option value="Magh">Magh</option>
        <option value="Falgun">Falgun</option>
        <option value="Chaitra">Chaitra</option>
      </select>
    </div>

    <div class="box">
      <input required type="text" name="cusid" />
      <span>Customer ID</span>
    </div>

    <div class="box">
      <input required type="text" name="currRead" />
      <span>Current Reading</span>
    </div>

    <div class="box">
      <input required type="text" name="prevRead" />
      <span>Previous Reading</span>
    </div>

    <div class="box">
      <input required type="text" name="bamount" />
      <span>Bill Amount</span>
    </div>

    <div class="box">
      <input class="submit" type="submit" name="submit" />
    </div>
  </form>


  <?php include '../components/footer.php'; ?>

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
    $bid = $_POST['bid'];
    $bdate = $_POST['bdate'];
    $byear = $_POST['byear'];
    $bmonth = $_POST['bmonth'];
    $cusid = $_POST['cusid'];
    $currRead = $_POST['currRead'];
    $prevRead = $_POST['prevRead'];
    $billAmount = $_POST['bamount'];

    $sql = "INSERT INTO `bill` ( BDate, BYear,BMonth, CUSID, Current_Reading, Prev_Reading, Bamount) 
     VALUES ( '$bdate', '$byear', '$bmonth', '$cusid', 
     '$currRead', '$prevRead', '$billAmount')";

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