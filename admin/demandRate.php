<?php
include '../php/sessionVerify.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Option</title>

    <link rel="stylesheet" href="../src/styles.css" />
</head>

<?php
include("../php/dbconnect.php");

$demandQuery = "SELECT demand_type_id, descrip FROM demandtype";
$demandResult = mysqli_query($conn, $demandQuery);
?>

<body>
    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    include '../components/navbar.php';
    ?>

    <form class="container" action="" method="post">
        <h1>Add Demand Rate</h1>


        <div class="box">
            <input required type="text" name="demand-rate" />
            <span>Demand Rate</span>
        </div>

        <div class="box">
            <input required type="date" name="effective-date" />
            <span>Effective Date</span>
        </div>

        <div class="box checkbox-status">
            <label for="byear">Status: </label>
            <input type="checkbox" name="currStatus" value="1" />
        </div>

        <div class="box">
            <label for="paymentMethod">Demand Type: </label>
            <select name="demand-type">
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

    if (isset($_POST['submit'])) {
        $demandRate = $_POST['demand-rate'];
        $effectiveDate = $_POST['effective-date'];
        $currStatus = $_POST['currStatus'];
        $demandTypeID = $_POST['demand-type'];

        $sql = "INSERT INTO `demandrate` (demand_rate, effective_rate, is_current, demand_type_id) 
        VALUES ('$demandRate', '$effectiveDate', '$currStatus', '$demandTypeID')";

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