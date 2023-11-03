<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clg_project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sid = $_POST["sid"];
    $sname = $_POST["sname"];    
    $branchsub = $_POST["branchsub"];  

    $checkDuplicate = "SELECT * FROM $branchsub  WHERE sid = '$sid' OR sname='$sname'";
    $result = $conn->query($checkDuplicate);

    if ($result->num_rows > 0) {
        echo "<script>alert('Subject  already exists');</script>";
        echo "<script>window.location = 'addsubject.html';</script>"; 
        exit();
    }

    $sql = "INSERT INTO $branchsub (sid, sname) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $sid, $sname);

    if ($stmt->execute()) {
        echo"<script>alert('Subject inserted successfully ')</script>";
        echo "<script>window.location = 'addsubject.html';</script>"; 
    } else {
        
        echo "<script>alert('" . $stmt->error . "');</script>";
    echo "<script>window.location = 'addsubject.html';</script>"; 
    }


    $stmt->close();
}

$conn->close();
?>
