<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search</title>

    <link rel="stylesheet" href="../src/styles.css" />
</head>

<body>
    <nav class="navbar">
        <img src="../assets/images/neaLogo.png" alt="Logo of NEA" class="logo-img" />

        <div class="nav-btn">
            <a href="../index.php"><button class="btn-primary">HomePage</button></a>

            <button class="btn-primary">Sign In</button>
        </div>
    </nav>

    <form class="container" action="" method="GET">
        <h1>Search</h1>

        <div class="box">
            <input required type="text" name="customer_id" />
            <span>Enter Customer ID</span>
        </div>

        <div class="box">
            <input class="submit" type="submit" value="Submit" name="submit" />
        </div>
    </form>

    <?php
    include("../php/dbconnect.php");
    // Process the form submission
    if (isset($_POST['submit'])) {
        $cusid = $_POST['cusid'];

        $query = "SELECT FullName, MobileNo, AddressName, demand_type_id, BranchId FROM customer WHERE CUSID = '$cusid'";
        $result = mysqli_query($conn, $query);




        if (mysqli_num_rows($result) > 0) {
            // Display the customer information
            echo "<h2>Customer Details</h2>";

            while ($row = mysqli_fetch_assoc($result)) {
                $fullName = $row['FullName'];
                $mobileNo = $row['MobileNo'];
                $address = $row['AddressName'];
                $DemandType = $row['demand_type_id'];
                $Branch = $row['BranchId'];
                //get the name of the associated branch 
                $querybranch = "SELECT Name FROM branch WHERE branch_id = '$Branch'";
                $resultquery = mysqli_query($conn, $querybranch);
                $branch = mysqli_fetch_assoc($resultquery);
                $branchname = $branch['Name'];

                //get the demand type description
                $demandquery = "SELECT Description FROM demandtype WHERE demand_type_id = '$DemandType'";
                $resultdemand = mysqli_query($conn, $demandquery);
                $demand1 = mysqli_fetch_assoc($resultdemand);
                $demanddescp = $demand1['descrip'];
                echo "<table border = '0' class = 'center'>
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
          </tr>
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
        // Show Bill Data
        $querybill = "SELECT BID,BYear, BMonth,Current_Reading,Prev_Reading, Bamount FROM bill WHERE CUSID='$cusid'";
        $result = mysqli_query($conn, $querybill);
        if (mysqli_num_rows($result) > 0) {
            $myarray = array();
            echo "<h2>Bill Details</h2>";
            echo "<table border = '1' class = 'center'>
      <tr>
        <td>Bill Number</td>
        <td> Bill Amount</td>
        <td> Bill Year</td>
        <td> Bill Month </td>
        <td> Current Readings</td>
        <td> Previous Readings</td>
      </tr>
      
      
      ";
            while ($row = mysqli_fetch_assoc($result)) {


                $BID = $row['BID'];
                array_push($myarray, $BID);
                $Bamount = $row['Bamount'];
                $Byear = $row['BYear'];
                $BMonth = $row['BMonth'];
                $CReading = $row['Current_Reading'];
                $PReading = $row['Prev_Reading'];

                echo "
          <tr>
            <td> $BID </td>
            <td> $Bamount</td>
            <td> $Byear </td> 
            <td> $BMonth </td> 
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

    <footer>
        <p>
            Copyright © <span id="year-change"></span> Nepal Electricity Authority ❘
            All Rights Reserved.
        </p>
    </footer>



    <script src="../src/index.js"></script>
</body>

</html>