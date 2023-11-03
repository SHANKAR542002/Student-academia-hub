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
    $fid = $_POST["fid"];  
    $sid = $_POST["sid"];
    $branch = $_POST["branch"];

      

    $checkDuplicate = "SELECT sid FROM faculty_subjects  WHERE sid = '$sid' AND fid='$fid'";
    $checkcorrectsid = "SELECT * FROM subjects  WHERE sid = '$sid'";
    $checkcorrectfid = "SELECT * FROM faculty_details  WHERE fid = '$fid'";


    $result = $conn->query($checkDuplicate);
    $result2 = $conn->query($checkcorrectsid);
    $result3 = $conn->query($checkcorrectfid);

    if ($result3->num_rows == 0 && $result2->num_rows == 0) {
        echo "<script>alert('Invalid faculty Id and subject Id try again');</script>";
        echo "<script>window.location = 'addfacsub.php';</script>"; 
    }
    else if ($result2->num_rows == 0) {
        echo "<script>alert('Invalid subject Id try again');</script>";
        echo "<script>window.location = 'addfacsub.php';</script>"; 
    }
    else if ($result3->num_rows == 0) {
        echo "<script>alert('Invalid faculty Id try again');</script>";
        echo "<script>window.location = 'addfacsub.html';</script>"; 
    }
    /*else  {
        echo "<script>alert('Data already exists');</script>";
        echo "<script>window.location = 'addfacsub.php';</script>"; 
    }*/

    $checkcorrecttotal = "SELECT fid FROM faculty_subjects  WHERE fid = '$fid' AND sid='$sid'";
    $result4 = $conn->query($checkcorrecttotal);
    if ($result4->num_rows >0) {
        echo "<script>alert('Combination already exists');</script>";
        echo "<script>window.location = 'addfacsub.html';</script>"; 
    }
else{
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
}
    


    $stmt->close();
}

$conn->close();
?>
                                                