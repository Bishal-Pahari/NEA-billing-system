<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "billing_system";
$tablename = "bill";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $bid = $_POST["bid"];
    $bdate = $_POST["bdate"];
    $byear = $_POST["byear"];
    $bmonth = $_POST["bmonth"];
    $cusid = $_POST["cusid"];
    $curr_read = $_POST["currRead"];
    $prev_read = $_POST["prevDate"];
    $bamount = $_POST["bamount"];
    echo $bid;
}
//     $conn = new mysqli($servername, $username, $password, $dbname, $tablename);
    
//     if(!$conn){
//         die("Connection failed: " . mysqli_connect_error());
//     }
//     else{
//         echo "Connected successfully";
//     }
//     $bid = $_POST["bid"];
//     $bdate = $_POST["bdate"];
//     $byear = $_POST["byear"];
//     $bmonth = $_POST["bmonth"];
//     $cusid = $_POST["cusid"];
//     $curr_read = $_POST["currRead"];
//     $prev_read = $_POST["prevDate"];
//     $bamount = $_POST["bamount"];
//     $sql = "INSERT INTO $tablename
//      (BID, BDate, BYear, BMonth, CUSID, Current_Reading,Prev_Reading, Bamount) 
//      VALUES ('$bid', '$bdate', '$byear', '$bmonth',
//       '$cusid', '$curr_read','$prev_read' ,'$bamount')";
//     if(mysqli_query($conn, $sql)){
//         echo "New record created successfully";
//     }
//     else{
//         echo "Error!";
//     }
//     mysqli_close($conn);
// }
// else{
//     echo "Not a POST request";
// }


?>