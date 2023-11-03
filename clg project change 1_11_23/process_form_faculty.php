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
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $ph_no = $_POST["ph_no"];
    $branch = $_POST["branch"];
    $qual = $_POST["qual"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 
    

    $checkDuplicate = "SELECT name FROM faculty_details WHERE name = '$name'";
    $result = $conn->query($checkDuplicate);

    if ($result->num_rows > 0) {
        echo "<script>alert('Faculty already exists');</script>";
        echo "<script>window.location = 'addfaculty.html';</script>";
    }
else{
    $sql = "INSERT INTO faculty_details (name, dob, address, ph_no, core_branch, qualification, pwd) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $dob, $address, $ph_no, $branch, $qual, $password);

}
    

    if ($stmt->execute()) {
        echo "<script>alert('Faculty details inserted successfully');</script>";
        echo "<script>window.location = 'addfaculty.html';</script>"; 
    } else {
        
        echo "<script>alert('" . $stmt->error . "');</script>";
    echo "<script>window.location = 'addfaculty.html';</script>"; 
    }

    $stmt->close();
}



$conn->close();
?>
