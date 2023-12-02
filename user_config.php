<?php
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        

        //database connection
        $conn = new mysqli('localhost', 'root','','clinic_ms');
        //check connection
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        } else{
            $stmt = $conn->prepare("insert into users(firstname, lastname, email)
            values(?,?,?)");
            $stmt->bind_param("sss", $firstname, $lastname, $email);
            $stmt->execute();
            header('location: users.php');
            $stmt->close();
            $conn->close();
        }

?>
