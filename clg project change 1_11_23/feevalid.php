<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clg_project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateFee"])) {
    $roll_number = $_POST["roll_number"];
    $branch = $_POST["branch"];

    
    // Display a confirmation dialog
    echo "<script>";
    echo "if (confirm('Are you sure you want to update the fee?')) {";
    echo "  window.location.href = 'feevalid2.php?confirm_update=yes&roll_number=$roll_number';";
    echo "} else {";
    echo "  window.location.href = 'notsuccess.html';";
    echo "}";
    echo "</script>";
}


$conn->close();
?>
