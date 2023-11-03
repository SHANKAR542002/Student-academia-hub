<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      padding: 20px;
    }

    h1 {
      background-color: #408697;
      color: white;
      padding: 10px;
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-radius: 10px;
      margin-top: 20px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    th,
    td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #7D94B5;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .faclist {
      margin-top: 70px;
      min-width: 400px;
    }

    .mid {
      margin-top: 40px;
      min-width: 400px;

    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Faculty</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Welcome Admin!!</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
        aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
        aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Welcome!!</h5>

          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="admin.html">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="index.html">Log Out</a>
            </li>

          </ul>

        </div>
      </div>
    </div>
  </nav>

  <div class="faclist">

    <h1>Fee details</h1>
    <table>
      <thead>
        <tr>
          <th>ROLL NUMBER</th>
          <th>NAME</th>
          <th>TERMS PAID</th>
          <th>YEAR</th>
          <th>BRANCH</th>



        </tr>
      </thead>
      <tbody>
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
          $roll_number = $_POST["roll_number"];
          $branch = $_POST["branch"];


          $sql = "SELECT roll_number, name,fee,year_of_join FROM student_details WHERE roll_number='$roll_number' AND branch='$branch'";
          $result = $conn->query($sql);
          $currentYear = date("Y");
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["roll_number"] . "</td>";
              echo "<td>" . $row["name"] . "</td>";
              echo "<td>" . $row["fee"] . "</td>";
              echo "<td>" . $currentYear - $row["year_of_join"] + 1 . "</td>";
              echo "<td>" . $branch . "</td>";
              echo "</tr>";
            }
          } else {
            echo "<script>alert('No student found with this id');</script>";
            echo "<script>window.location = 'updatefee.html';</script>";
          }
        }

        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

  <form action="feevalid.php" method="post">
    <div class="col-md-6" style=" margin-top:20px">
      <label class="form-label">Roll number</label>
      <input type="text" class="form-control" name="roll_number" id="srno" required>
    </div>
    <div class="col-12">
      <label class="form-label">Branch</label>
      <select class="form-select" name="branch" aria-label="Default select example" required>
        <option selected></option>
        <option value="cse">CSE</option>
        <option value="csm">CSM</option>
        <option value="csd">CSD</option>
        <option value="ece">ECE</option>
        <option value="mech">MECH</option>
        <option value="eee">EEE</option>
        <option value="civil">CIVIL</option>
      </select>
    </div>
    <div class="col-12 " style=" margin-top:20px">
      <button type="submit" name="updateFee" class="btn btn-primary">Update</button>
    </div>
  </form>
</body>


</body>

</html>