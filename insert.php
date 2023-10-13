<?php  require "connection.php";




session_start();


$name=$_POST['name'];

$email=$_POST['email'];

$password=$_POST['password'];

$contactNo=$_POST['contactNo'];

$country=$_POST['country'];

$city=$_POST['city'];

$gender=$_POST['gender'];




    $sql="INSERT INTO userinfo (name,email,password,contactNo,country,city,gender) VALUES ('$name','$email','$password','$contactNo','$country','$city','$gender')";




    if( $con -> query($sql) )

    {

        echo "<script> alert('You are registered successfully'); window.location.href = 'index.php'; </script>";



    }

    else{



        echo"Oops, Something went wrong!";

    }



   

?>