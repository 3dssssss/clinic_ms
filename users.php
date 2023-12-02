<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="users.css">
    <!--Boxicons link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/css.gg/icons/icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
    
</head>
<body>
    <div class="box">
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
                <p class="link_name">My Profile</p>
         </li> 
        <li>
            <a href="patients.php">
                <i class='bx bx-user'></i>
                <p class="link_name">Patients</p>
            </a>
        </li>
        <li>
            <a href="users.php">
                <i class='bx bx-group' ></i>
                <p class="link_name">Users</p>
            </a>
        </li>
        <li>
            <a href="reports.php">
                <i class='bx bx-spreadsheet'></i>
                <p class="link_name">Reports</p>
            </a>
        </li>
        <li>
            <a href="settings.php">
                <i class='bx bx-cog' ></i>
                <p class="link_name">Settings</p>
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
    </div>

    <!--For search bar-->
    <section class="main">
        <nav>
            <div class="side">
                <i class='bx bx-user'></i>
                <span class="users">Users</span>
            </div>
            
            <form action="" method="get">
                <div class="search-box">
                    <input type="text" name="u_name" placeholder="Search..." class="input_search" required>
                    <button type="submit" name="btnSearch"><i class='bx bx-search' ></i></button>
                </div>
            </form>
        </nav>

        <div class="box2">
            <!--add users-->
            <button class="btn_form" onclick="openForm()">
                <i class='bx bx-plus'></i>
                <span>Add Users</span>
            </button>

            <div class="form_popup" id="myForm">
                <form action="user_config.php" method="post"  class="form-container" id="form_id">
                    <h2>Add Users</h2> 
                    <button type="button" class="btncancel" onclick="closeForm()"><i class="gg-close form-close"></i></button>
                    <div class="input_box">
                        <label for="firstname">First Name:</label>
                        <input type="text" class="input_field" id="input" name="firstname" placeholder="Enter first name" autocomplete="off" required>
                    </div> 
                    <div class="input_box">
                    <label for="lastname">Last Name:</label>
                        <input type="text" class="input_field" id="input" name="lastname" placeholder="Enter last name" autocomplete="off" required>
                    </div>
                    <div class="input_box">
                        <label for="email">Email:</label>
                        <input type="text" class="input_field" id="input" name="email" placeholder="Enter email" required>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>           </th>
            
                </tr>
            </thead>
        
            <tbody class="table-group-divider">
                <?php
                    $conn = new mysqli('localhost', 'root','','clinic_ms');
                    //check connection
                    if($conn->connect_error){
                        die('Connection Failed : '.$conn->connect_error);
                    } 
                    $sql = "SELECT * FROM users;";
                    $result = $conn-> query($sql);
                    if(!$result){
                        die("Invalid query: ".$conn->error);
                    }
                    //read data
                    while($row = $result-> fetch_assoc()){
                        $id=$row['id'];
                        $firstname=$row['firstname'];
                        $lastname=$row['lastname'];
                        $email=$row['email'];
                        

                        echo "<tr>
                        <td>$id</td>
                        <td>$firstname</td>
                        <td>$lastname</td>
                        <td>$email</td>
                    
                        
                        <td>
                            <a class='btn btn-primary btn-sm' href='view_user.php?updateid=$id'><i class='bi bi-eye'></i></a>
                            <a class='btn btn-danger btn-sm' href='delete.php?deleteuser=$id'><i class='bx bx-trash'></i></a>
                        </td>
                        </tr>";
                    }
                ?> 
            </tbody> 
        </table>   
    </section>

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
            var txt;
            if(confirm("Are you sure you want to log out?")){
                var a = document.getElementById("go");
                a.href="log_in.php";
            }
        }
    </script>
</body>
</html>