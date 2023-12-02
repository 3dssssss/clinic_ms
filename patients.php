<!DOCTYPE html>
<html>
<head>
    <title>Patients</title>
    <link rel="stylesheet" href="patient.css">
    <!--Boxicons link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/css.gg/icons/icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
<body style="margin: 10px;">

    <div class="sidebar">
        <div class="logo">
        <img src="BulSU-SC Logo.png" alt="BULSU-SC LOGO"> 
        <p class="logo_name">BULSU-SC CLINIC</p>
        </div>
            <ul class="nav-links">   
        <li>
            <a href="dashboard.php">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="my_profile.php">
                <i class='bx bx-user-circle'></i>
                <span class="link_name">My Profile</span>
         </li> 
        <li>
            <a href="patients.php">
                <i class='bx bx-user'></i>
                <span class="link_name">Patients</span>
            </a>
        </li>
        <li>
            <a href="users.php">
                <i class='bx bx-group' ></i>
                <span class="link_name">Users</span>
            </a>
        </li>
        <li>
            <a href="reports.php">
                <i class='bx bx-spreadsheet'></i>
                <span class="link_name">Reports</span>
            </a>
        </li>
        <li>
            <a href="settings.php">
                <i class='bx bx-cog' ></i>
                <span class="link_name">Settings</span>
            </a>
        </li>  
        <li>
        <div class="log_out">
                <a id="go" onclick="log_out()">
                <i class='bx bx-log-out'></i>
                <span class="link_name" id="logout">Log out</span></a>
            </div>
        </li>
        </ul>
    </div>
    
    
    <!--For search bar-->
    <section class="main">
        <nav>
            <div class="side">
                <i class='bx bx-user'></i>
                <span class="patients">Patients</span>
            </div>
            
            <form action="" method="get">
                <div class="search-box">
                    <input type="text" name="search" class="input_search" value="<?php if(isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Search...">
                    <button type="submit"><i class='bx bx-search' ></i></button>
                </div>
            </form>
  
        </nav>

        <div class="box2">
            <!--add students-->
            <button class="btn_form" onclick="openForm()">
                <i class='bx bx-plus'></i>
                <span>Add Patient</span>
            </button>

            <!--patients form-->
        <div class="form_popup" id="myForm">
                <form action="patient_config.php" method="post"  class="form-container" id="form_id">
                    <h2>Add Patient</h2> 
                    <button type="button" class="btncancel" onclick="closeForm()"><i class="gg-close form-close"></i></button>
                    <div class="row">
                        <div class="col">
                            <label for="form-label">Employee/Student No:</label>
                            <input type="text" class="form-control" id="input" name="stud_id" placeholder="Enter Student No/Employee" autocomplete="off" required>
                        </div>
                        
                        <div class="col">
                            <label for="form-label">Name:</label>
                            <input type="text" class="form-control" id="input" name="name" placeholder="Enter name" autocomplete="off" required>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="form-label">Program:</label>
                            <input type="text" class="form-control" id="input" name="course" placeholder="Enter Course/Program" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="form-label">Age:</label>
                            <input type="number" class="form-control" id="input" name="age" placeholder="Enter age" required>
                        </div>
                        
                        <div class="col">
                            <label for="form-label">Sex: </label> <br>
                            <input type="radio" class="form-check-input" id="input_m" name="sex" value="male">
                            <label for="form-check-label">Male</label>
                            
                            <input type="radio" class="form-check-input" id="input_f" name="sex" value="female">     
                            <label for="form-check-label">Female</label> 
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <label for="form-label">Illness/Disease:</label>
                            <input type="text" class="form-control" id="input" name="ill" placeholder="Enter the diagnosis" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="form-label">Weight:</label>
                            <input type="text" class="form-control" id="input" name="weight" placeholder="Enter weight" autocomplete="off">
                        </div>

                        <div class="col">
                            <label for="form-label">Height:</label>
                            <input type="text" class="form-control" id="input" name="height" placeholder="Enter height" autocomplete="off">
                        </div>
                    </div>

                    <div class="row">
                         <div class="col">
                            <label for="form-label">Temperature:</label>
                            <input type="text" class="form-control" id="input" name="temp" placeholder="Enter temperature" autocomplete="off">
                        </div>

                        <div class="col">
                            <label for="form-label">Blood Pressure(BP):</label>
                            <input type="text" class="form-control" id="input" name="bp" placeholder="Enter Blood Pressure(BP)" autocomplete="off">
                        </div>
                    </div>
                    
                    <div class="input_box">
                        <button type="submit" class="btnSubmit" name="btnSubmit">Submit</button>
                    </div>
                    <div class="input_box">
                        <button type="button" class="btnClear" onclick="clearForm()">Clear</button>  
                    </div>
                </form>
                
            </div>
        </div>

        <!--get data from database-->
        <table class="table table-hover text-center">
            <thead class="table-dark">
                 <tr>
                    <th>ID</th>
                    <th>Employee/Student No</th>
                    <th>Name</th>
                    <th>Program</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Disease</th>
                    <th>Temperature</th>
                    <th>Weight</th>
                    <th>Height</th>
                    <th>Blood Pressure</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php
                    $conn = new mysqli('localhost', 'root','','clinic_ms');
                    //check connection
                    if($conn->connect_error){
                        die('Connection Failed : '.$conn->connect_error);
                    } 
                    $sql = "SELECT * FROM add_patient;";
                    $result = $conn-> query($sql);
                    if(!$result){
                        die("Invalid query: ".$conn->error);
                    }
                    //read data
                    while($row = $result-> fetch_assoc()){
                        $id=$row['id'];
                        $stud_id=$row['student_id'];
                        $name=$row['name'];
                        $course=$row['course'];
                        $age=$row['age'];
                        $sex=$row['sex'];
                        $ill=$row['illness'];
                        $temp=$row['temp'];
                        $weight=$row['weight'];
                        $height=$row['height'];
                        $bp=$row['bp'];
                        $date=$row['date'];

                        echo "<tr>
                        <td>$id</td>
                        <td>$stud_id</td>
                        <td>$name</td>
                        <td>$course</td>
                        <td>$age</td>
                        <td>$sex</td>
                        <td>$ill</td>
                        <td>$temp</td>
                        <td>$weight</td>
                        <td>$height</td>
                        <td>$bp</td>
                        <td>$date</td>
                        
                        <td>
                            <a class='btn btn-primary btn-sm' href='viewpatient.php?updateid=$id'><i class='bi bi-eye'></i></a>
                            <a class='btn btn-danger btn-sm' href='delete.php?deleteid=$id'><i class='bx bx-trash'></i></a>
                        </td>
                        </tr>";
                    }
                ?> 
            </tbody> 
        </table>   
    </section>

    <!--button pop-up form on Add Patient-->
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";}

        function closeForm() {
            document.getElementById("myForm").style.display = "none";}

        function clearForm(){
            var element = document.getElementById("form_id");
            element.reset();
        } 

        function log_out(){
            if(confirm("Are you sure you want to log out?")){
                var a = document.getElementById("go");
                a.href="log_in.php";
            }
        }

    </script>
</body>

</html>