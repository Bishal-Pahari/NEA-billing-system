<?php
include('functions.php');

if (isset($_GET['billid'])) {
    $bill_id = $_GET['billid'];
}

if (isset($_GET['amount'])) {
    $amount = $_GET['amount'];
}

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

include './php/dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay with Khalti</title>
    <link rel="stylesheet" type="text/css" href="./src/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>


</head>

<body>
    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    include './components/navbar.php';
    ?>


    <div class="container">
        <h1>Payment</h1>
        <button class="submit" id="payment-button">Pay with Khalti</button>
    </div>

    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_0e533fccfe364a938c5428bd7aecd699",
            "productIdentity": "<?php echo $bill_id; ?>",
            "productName": "Bill Payment",
            "productUrl": "http://localhost/bill/.php",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
            ],
            "eventHandler": {
                onSuccess(payload) {
                    console.log(payload);
                    axios.defaults.baseURL = 'http://localhost/bill/php/';
                    axios.get("verify.php", {
                        params: {
                            "token": payload.token,
                            "bill_id": <?php echo $bill_id; ?>,
                            "amount": payload.amount,
                        }
                    }).then(function (resp) {
                        console.log(resp.data);
                        window.location.href = "./index.php";
                    })

                },
                onError(error) {
                    console.log(error);
                },
                onClose() {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({ amount: <?php echo $amount; ?> });
        }
    </script>

</body>

</html>