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
    $branch = $_POST["branch"];

      

    $checkDuplicate = "SELECT sid FROM $branch  WHERE sid = '$sid' ";



    $result = $conn->query($checkDuplicate);
  
    if ($result->num_rows == 0) {
        echo "<script>alert('Invalid Subject Id try again');</script>";
        echo "<script>window.location = 'updatemarks.php';</script>"; 
    }
    else{
       
    }
    

    
/*else{
    $sql = "INSERT INTO faculty_subjects (fid, sid,sub_branch) VALUES (?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $fid, $sid,$branch);

    if ($stmt->execute()) {
        echo"<script>alert('Data Inserted successfully')</script>";
        echo "<script>window.location = 'addfacsub.html';</script>"; 
    } else {
        
        echo "<script>alert('" . $stmt->error . "');</script>";
    echo "<script>window.location = 'addfacsub.php';</script>"; 
    }
}*/
    


   
}

$conn->close();
?>
                                                