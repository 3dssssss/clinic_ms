<?php
    include 'connection.php';
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="delete from add_patient where id=$id";
        $result=mysqli_query($conn,$sql);
        if($result){
           echo "<script> if (confirm('Are you sure you want to delete this?')) {
            window.location.href = 'patients.php';}</script>";
           //header('location:patients.php');
        }else{
            die(mysqli_error($conn));
        }
    } 
?>
<?php
    include 'connection.php';
    if(isset($_GET['deleteuser'])){
        $id=$_GET['deleteuser'];

        $sql="delete from users where id=$id";
        $result=mysqli_query($conn,$sql);
        if($result){
           echo "<script> if (confirm('Are you sure you want to delete this?')) {
            window.location.href = 'users.php';}</script>";
           //header('location:users.php');
        }else{
            die(mysqli_error($conn));
        }
    } 
?>
