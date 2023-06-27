<?php
include '../php/sessionVerify.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Billing</title>

    <link rel="stylesheet" href="../src/styles.css" />
    <script src="https://kit.fontawesome.com/43dcc20e7a.js" crossorigin="anonymous"></script>
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
    include '../components/navbar.php';
    ?>

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

    <div class="container homepage-container">
        <!-- search -->
        <form method="POST" action="">
            <label for="cusid">Customer ID:</label>
            <input type="text" name="cusid" id="cusid" required><br><br>
            <input type="submit" name="submit" value="Search Customer">
        </form>

        <?php
        include("../php/dbconnect.php");
        if (isset($_POST['submit'])) {
            $cusid = $_POST['cusid'];
            $sql = "SELECT * FROM customer WHERE cusid = '$cusid'";
            $querycus = "SELECT FullName, MobileNo, AddressName, demand_type_id, BranchId FROM customer WHERE CUSID = '$cusid'";

            $result = mysqli_query($conn, $querycus);

            if (mysqli_num_rows($result) > 0) {
                echo "<h2>Customer Details</h2>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $fullName = $row['FullName'];
                    $mobileNo = $row['MobileNo'];
                    $address = $row['AddressName'];
                    $DemandType = $row['demand_type_id'];
                    $Branch = $row['BranchId'];

                    $querybranch = "SELECT branch_name FROM branch WHERE branch_id = '$Branch'";
                    $resultquery = mysqli_query($conn, $querybranch);
                    $branch = mysqli_fetch_assoc($resultquery);
                    $branchname = $branch['branch_name'];

                    $demandquery = "SELECT descrip FROM demandtype WHERE demand_type_id = '$DemandType'";
                    $resultdemand = mysqli_query($conn, $demandquery);
                    $demand1 = mysqli_fetch_assoc($resultdemand);
                    $demanddescp = $demand1['descrip'];
                    echo "<table border='0' class='center' >

          <tr>
            <td>
              <strong> Full Name: </strong>
            </td>
            <td> $fullName <td>
          <tr>
            <td> <strong> Mobile No: </strong></td>
            <td> $mobileNo </td> 
          </tr>
          <tr>
          <td> <strong> Address: </strong> </td>
          <td> $address </td>
          </tr>;
          <tr>
          <td> <strong> Demand Type: </strong> </td>
          <td> $demanddescp </td>
          </tr>
          <tr>
          <td> <strong> Registered at: </strong> </td>
          <td>$branchname </td>
          </tr></table>";
                }
            } else {
                echo "<p>No customer found with the provided CUSID.</p>";
            }
            echo "<hr>";
            $querybill = "SELECT BID, BDate, BYear, Current_Reading, Prev_Reading, Bamount FROM bill WHERE CUSID='$cusid'";


            $result = mysqli_query($conn, $querybill);
            if (mysqli_num_rows($result) > 0) {
                $myarray = array();
                echo "<h2>Bill Details</h2>";
                echo "<table border = '1' class = 'center'>
      <tr>
        <td> Bill Number</td>
        <td> Bill Amount</td>
        <td> Bill Date</td>
        <td> Current Readings</td>
        <td> Previous Readings</td>
      </tr>
      ";

                while ($row = mysqli_fetch_assoc($result)) {


                    $BID = $row['BID'];
                    array_push($myarray, $BID);
                    $Bamount = $row['Bamount'];
                    $Byear = $row['BYear'];
                    $CReading = $row['Current_Reading'];
                    $PReading = $row['Prev_Reading'];

                    echo "
        <tr>
          <td> $BID </td>
          <td> $Bamount</td>
          <td> $Byear </td> 
          <td> $CReading</td> 
          <td> $PReading</td> 
        </tr>
        ";
                }
                echo "</table>";
            } else {
                echo "<p> No Bill Details found for the specified customer</p>";
            }
            echo "<hr>";

            $n = sizeof($myarray);

            //show the payment details
            echo "<h2>Payment Details</h2>";
            echo "<table border = '1' class = 'center'>
      <tr>
        <td>PID</td>
        <td> Bill ID</td>
        <td> Payment Amount</td>
        <td> Rebeat</td>
        <td> Fine</td>
        <td> Payment date</td>
      </tr>";
            for ($i = 0; $i < $n; $i++) {

                $BIDE = $myarray[$i];
                $querypay = "SELECT PID, PDate, PAmount, Rebeat_Amt, Fine_Amt FROM payment WHERE BID='$BIDE'";
                $result = mysqli_query($conn, $querypay);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $PID = $row['PID'];
                    $PDate = $row['PDate'];
                    $Pamount = $row['PAmount'];
                    $Ramt = $row['Rebeat_Amt'];
                    $Famt = $row['Fine_Amt'];
                    echo "
          <tr>
          <td> $PID </td>
          <td> $BIDE </td>
          <td> $Pamount </td>
          <td> $Ramt </td>
          <td> $Famt </td>
          <td> $PDate </td> 
          </tr>";

                } else {
                    echo "<p> No Payment Details found for the specified BID</p>";
                }
            }
            echo "</table>";
        }
        ?>
    </div>

    <?php include '../components/footer.php'; ?>


</body>

</html>