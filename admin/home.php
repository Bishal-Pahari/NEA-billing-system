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
        <h1>Admin PANEL</h1>
        <ul>
            <li><a class="pages-redirect" href="./bill.php">Add Bill</a></li>
            <li>
                <a class="pages-redirect" href="branch.php">Add Branch</a>
            </li>
            <li>
                <a class="pages-redirect" href="customer.php">Add Customer Details</a>
            </li>
            <li>
                <a class="pages-redirect" href="demand.php">Add Demand type</a>
            </li>
            <li>
                <a class="pages-redirect" href="demandRate.php">Add Demand Rate</a>
            </li>
            <li>
                <a class="pages-redirect" href="payment.php">Add Payment</a>
            </li>
            <li>
                <a class="pages-redirect" href="paymentOption.php">Add Payment Option</a>
            </li>
            <li>
                <a class="pages-redirect" href="search.php">Search</a>
            </li>
        </ul>



        <!-- search -->

    </div>

    <?php include '../components/footer.php'; ?>


</body>

</html>