<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clg_project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["confirm_update"])) {
    $roll_number = $_GET["roll_number"];
   

    
    if ($_GET["confirm_update"] === "yes") {
        $sql = "UPDATE student_details SET fee = fee + 1 WHERE roll_number = '$roll_number'";
        
        if ($conn->query($sql) === TRUE) {
          echo "Fee updated successfully";
            echo "<script>window.location = 'success.html';</script>"; 

        } else {
            echo "Error updating fee: " . $conn->error;
        }
    } else {
        echo "Fee update was not confirmed.";
    }
}

$conn->close();
?>
