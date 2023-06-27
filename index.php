<?php
include('functions.php');

if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}

include './php/dbconnect.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to Homepage!</title>
  <link rel="stylesheet" type="text/css" href="./src/styles.css">

  <style>
    table,
    td,
    th {
      border: 1px solid;
      margin: 0.5rem 0 2rem;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    td {
      padding: 0.5rem 0;
      text-align: center;
    }
  </style>
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
      <?php endif ?>

      <form method="post" action="">
        <div class="box">
          <input type="text" name="name" id="name">
          <span>Name</span>
        </div>

        <div class="box">
          <input type="text" name="mobile" id="mobile">
          <span>Mobile No</span>
        </div>

        <div class="box">
          <input class="submit" type="submit" name="submit" value="Search" />
        </div>


      </form>
      <?php
      if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];

        $sql = "SELECT * FROM customer WHERE Fullname LIKE '%$name%' AND MobileNo LIKE '%$mobile%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          echo " <hr> <h1 style=margin:1rem 0;>Search Result</h1>";

          while ($row = mysqli_fetch_assoc($result)) {
            $fullName = $row['Fullname'];
            $mobileNo = $row['MobileNo'];
            $address = $row['AddressName'];
            $demandType = $row['demand_type_id'];

            $demandQuery = "SELECT descrip FROM demandtype WHERE demand_type_id = '$demandType'";
            $resultDemand = mysqli_query($conn, $demandQuery);
            $demand = mysqli_fetch_assoc($resultDemand);
            $demandDesc = $demand['descrip'];

            echo "<table>
              <tr>
                <td><strong>Full Name:</strong></td>
                <td>$fullName</td>
              </tr>
              <tr>
                <td><strong>Mobile No:</strong></td>
                <td>$mobileNo</td>
              </tr>
              <tr>
                <td><strong>Address:</strong></td>
                <td>$address</td>
              </tr>
              <tr>
                <td><strong>Demand Type:</strong></td>
                <td>$demandDesc</td>
              </tr>
            </table>";
          }
        } else {
          echo "<p>No customer found with the provided Name and Number.</p>";
        }
      }
      ?>
    </div>
  </div>
</body>

</html>