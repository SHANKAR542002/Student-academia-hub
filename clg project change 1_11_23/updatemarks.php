<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Branch Selection</title>
<link rel="stylesheet" href="brselectupdatemarks.css">
</head>
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
                </li>
              </ul>
            
            </div>
          </div>
        </div>
      </nav>

<body>


    <!-- Form to submit the selected branch value -->
    <form action="subject_selection.php" method="post">
    <div class="card-container">
    <div class="card">
                <label for="branch1">
                    <img src="cse-image1.png" alt="CSE">
                    <div class="card-text">
                        CSE
                        <input type="radio" id="branch1" name="branch" value="cse_subjects" required>
                    </div>
                </label>
            </div>

            <div class="card">
                
                <label for="branch2">
                    <img src="ece-image.png" alt="ECE">
                    <div class="card-text">ECE
                    <input type="radio" name="branch" value="ece_subjects"  >
                    </div>
                </label>
            </div>

            <div class="card">
                <label for="branch3">
                    <img src="csm-image1.png" alt="CSM">
                    <div class="card-text">CSM
                                      <input type="radio" name="branch" value="csm_subjects"  >

                    </div>
                </label>
            </div>

            <div class="card">
                <label for="branch4">
                    <img src="csd-image.png" alt="CSD">
                    <div class="card-text">CSD
                                      <input type="radio" name="branch" value="csd_subjects"  >

                    </div>
                </label>
            </div>

            <div class="card">
                <label for="branch5">
                    <img src="civil-image (2).png" alt="CIVIL">
                    <div class="card-text">CIVIL
                                      <input type="radio" name="branch" value="civil_subjects"  >

                    </div>
                </label>
            </div>

            <div class="card">
                <label for="branch6">
                    <img src="mech-image.png" alt="MECHANICAL">
                    <div class="card-text">MECHANICAL
                                      <input type="radio" name="branch" value="mech_subjects"  >

                    </div>
                </label>
            </div>

            <div class="card">
                <label for="branch7">
                    <img src="eee-image.png" alt="EEE">
                    <div class="card-text">EEE
                                      <input type="radio" name="branch" value="eee_subjects"  >

                    </div>
                </label>
            </div>
        </div>

        <input type="submit" value="Submit" >
    </form>
</body>
</html>




