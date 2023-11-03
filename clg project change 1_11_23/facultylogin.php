<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "clg_project";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $user_password = $_POST['password'];

    //echo "Entered ID: " . $id . "<br>";
    //echo "Entered Password: " . $user_password . "<br>";

    $query = "SELECT pwd FROM faculty_details WHERE fid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_hashed_password = $row['pwd'];

        if (password_verify($user_password, $stored_hashed_password)) {
            echo "<script>alert('Login successful.');</script>";
            echo "<script>window.location = 'faculty.html';</script>"; 
        } else {
            echo "<script>alert('Login failed. Please check your password.');</script>";
            echo "<script>window.location = 'index.html';</script>"; 

        }
    } else {
       // echo "User not found in the database.<br>";
        echo "<script>window.location = 'usernotfound.html';</script>"; 

    }
}

$stmt->close();
$conn->close();
?>