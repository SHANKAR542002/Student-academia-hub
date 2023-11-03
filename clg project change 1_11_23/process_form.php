<?php
try {
    // Establish a database connection (You need to replace these with your actual database credentials)
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'clg_project';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        throw new Exception("Database connection failed: " . $conn->connect_error);
    }

    // Get data from the form
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $branch = $_POST['branch'];
    $ph_no = $_POST['ph_no'];
    $password = $_POST['password'];

    $checkDuplicate = "SELECT roll_number FROM student_details WHERE name = '$name'";
    $result = $conn->query($checkDuplicate);

    if ($result->num_rows > 0) {
        echo "<script>alert('Student already exists.');</script>";
        echo "<script>window.location = 'addstudent.html';</script>"; 
    } else {
        $sql = "INSERT INTO student_details (name, dob, address,branch, ph_no, password) VALUES ( '$name', '$dob', '$address','$branch', '$ph_no', '$password')";
        
        if ($conn->query($sql) === FALSE) {
            throw new Exception("Error: " . $sql . "<br>" . $conn->error);
        }
        //$checkn = "SELECT roll_number FROM student_details WHERE name = '$name'";

        echo "<script>alert('inserted successfully');</script>";
    echo "<script>window.location = 'addstudent.html';</script>";
    }

    // Close the database connection
    $conn->close();
} catch (Exception $e) {
    echo "<script>alert('" . $e->getMessage() . "');</script>";
    echo "<script>window.location = 'addstudent.html';</script>"; // Redirect using JavaScript
}
?>
