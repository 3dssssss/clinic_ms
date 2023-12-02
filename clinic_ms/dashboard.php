
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="db.css">
    <!--Boxicons link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
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

     <!--header title-->
     <section class="main">
        <nav>
            <div class="side">
                <i class='bx bxs-dashboard'></i>
                <span class="dashboard">Dashboard</span>
            </div>
        </nav>

        <div class="row">
             <div class="col-md-3 mb-4">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Patients</p>
                    <h5 class="font-weight-bolder mb-0">
                        <?= getCount('add_patients') ?>
                    </h5>
                </div>
             </div>
             <div class="col-md-3 mb-4">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Users</p>
                    <h5 class="font-weight-bolder mb-0">
                    <?= getCount('user') ?>
                    </h5>
                </div>
             </div>
             <div class="col-md-3 mb-4">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Beds</p>
                    <h5 class="font-weight-bolder mb-0">
                        4
                    </h5>
                </div>
             </div>
        </div>

    </section>
    
    <script>
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