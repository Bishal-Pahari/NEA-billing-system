<?php

include '../php/dbconnect.php';

echo 'console.log("hello")';
if (isset($_GET['token'])) {
    $token = $_GET['token'];
}

if (isset($_GET['bill_id'])) {
    $bill_id = $_GET['bill_id'];
}

if (isset($_GET['amount'])) {
    $amount = $_GET['amount'];
}

$payload = array(
    "token" => $token,
    "amount" => $amount
);

$headers = array(
    "Authorization" => "key test_secret_key_5598b49d04674fcc9e4488cbb58ce896"
);

$amount = (int) $amount;

$URL = "https://khalti.com/api/v2/payment/verify/";
$headers = [
    "Authorization: Key test_secret_key_5598b49d04674fcc9e4488cbb58ce896",
    "Content-Type: application/json"
];

$payload = json_encode([
    "token" => $token,
    "amount" => $amount
]);

$options = [
    "http" => [
        "header" => implode("\r\n", $headers),
        "method" => "POST",
        "content" => $payload,
        "ignore_errors" => true // Optional: Ignore HTTP errors
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($URL, false, $context);

if ($response !== false) {
    // Request successful
    echo 'console.log("Request successful")';

    $sql = "UPDATE bill SET payment_status = 1 WHERE BID = '$bill_id'";
    $sql_update_payment = "INSERT INTO payment (BID, PAmount, PDate, Payment_Option_Id,Rebeat_Amt, Fine_Amt) VALUES ('$bill_id', '$amount',NOW(), 1, 0, 0)";
    $result = mysqli_query($conn, $sql);
    $result_update_payment = mysqli_query($conn, $sql_update_payment);


} else {
    // Request failed
    echo 'console.log("Request failed")';
}

?>