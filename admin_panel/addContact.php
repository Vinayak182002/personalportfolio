<?php
include 'config.php';
if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $sql = "insert into contact_details(name,email,subject,message) values('$name','$email','$subject','$message')";
        $query=mysqli_query($con,$sql);

        if($query){
            header('location: ../index.php');
        }
        else{
            echo "Please try again..";
        }
    }

?>
