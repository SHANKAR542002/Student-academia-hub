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
            background-color: #f0f0f0;
        }
        h1 {
            background: linear-gradient(to right, #333,  #777, #c0c0c0, #7D94B5);
            padding: 10px;
            color: white;
            text-align: center;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4); /* Intensified shadow */
        }
        h2,h3,h4 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Intensified shadow */
        }
        th, td {
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
        .disp{
            display: none;
        }
        
        /* Add shadow and transition on hover for buttons */
        .btn {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Intensified shadow */
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4); /* Intensified shadow */
        }
    </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Subjects</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Welcome Admin!!</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Welcome!!</h5>
              
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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

   
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "clg_project";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $branch = $_POST["branch"];  
            if($branch=="cse_subjects")
            {
                echo"<h1>CSE SUBJECTS</h1>";
            }
            else if($branch=="ece_subjects")
            {
                echo"<h1>ECE SUBJECTS</h1>";
            }
            else if($branch=="eee_subjects")
            {
                echo"<h1>EEE SUBJECTS</h1>";
            }
            else if($branch=="csm_subjects")
            {
                echo"<h1>CSM SUBJECTS</h1>";
            }
            else if($branch=="csd_subjects")
            {
                echo"<h1>CSD SUBJECTS</h1>";
            }
            else if($branch=="civil_subjects")
            {
                echo"<h1>CIVIL SUBJECTS</h1>";
            }
            else if($branch=="mech_subjects")
            {
                echo"<h1>MECHANICAL SUBJECTS</h1>";
            }
            
            $sql = "SELECT sid, sname FROM $branch";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo"
                <table>
                    <thead>
                        <tr>
                            <th>SUBJECT ID</th>
                            <th>SUBJECT</th>
                        </tr>
                    </thead>
                    <tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["sid"] . "</td>";
                    echo "<td>" . $row["sname"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<h3>No subjects found</h3>.";
            }

            $conn->close();
            ?>
            </tbody>
        </table>
          </div>

        
    <div class="mid">
    <h1>SELECT SUBJECT</h1>
    </div>
    

    <div class="stuform">
          <form class="row g-3" action="show_and_update_marks.php" method="post" >
              <div class="col-md-6">
                  <label class="form-label"><h4>Subject id</h4></label>
                  <input type="text" class="form-control" name="sid" id="sid" placeholder="Select a subject ID" required>
              </div>
              <div class="col-md-6">
                  <label class="form-label disp"><h4>Subject Branch</h4></label>
                  <input type="text" class="disp " name="branch" id="branch" required value="<?php echo $branch; ?>" readonly>
              </div>
              <div class="col-12">
                  <button type="submit" class="btn btn-primary">Proceed</button>
              </div>
          </form>
      </div>
    </body>
        
      
</body>
</html>





