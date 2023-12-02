<?php 
    include 'connection.php';
    //$id=$_GET['updateid'];
    $id="";
    $firstname="";
    $lastname="";
    $email="";
    if($_SERVER['REQUEST_METHOD']=='GET'){
        //$id=$_GET['updateid']; //get method shows the data of the client
        if(isset($_GET['id'])) {
            header('location:users.php');
            exit;
        }
        $id=$_GET['updateid'];
        //read the row
        $sql = "SELECT * FROM users WHERE id=$id";
        $result = $conn->query( $sql );
        $row = $result->fetch_assoc();

        if(!$row){
            header('location:users.php');
            exit;
        }

        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
        $email=$row['email'];
        
    } else {
        //post method
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
    
        do{
            if(empty($id) || empty($firstname) || empty($lastname) || empty($email)) {
                echo "all the fields are required";
             }

            /*$sql = "UPDATE add_patient ".
                    "SET id='$id', student_id='$stud_id', name='$name', course='$course', age='$age', sex='$sex', 
                    illness='$ill', temp='$temp', weight='$weight', height='$height', bp='$bp' ".
                    "WHERE id=$id";*/

                    $sql="UPDATE users set id='$id', firstname='$firstname', lastname='$lastname', email='$email'";
                    $result=mysqli_query($conn,$sql);
                if(!$result){
                    die("Invalid query: ".$conn->error);
                }

            header('location:users.php');
        }while(true);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="view_user.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">

        <div class ="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px">
            <h2>View and Edit Users</h2> <br>
            <input type="hidden" name="id" value="<?php echo $id;?>">
                <div class="row">
                    <div class="col">
                        <label for="form-label">First Name:</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $firstname;?>">
                    </div>  
                </div>
                <div class="row">
                    <div class="col">
                        <label for="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $lastname;?>">
                    </div>
                    <div class="col">
                        <label for="form-label">Email:</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                    </div>
                </div>
                <div class="btn" style="margin-top: 5px;">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="cancel" class="btn btn-danger">Cancel</button>
                </div>
                </form>
        </div>
    </div>
</body>
</html>