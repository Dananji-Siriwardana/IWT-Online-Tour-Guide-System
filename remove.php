<?php

    include 'connection.php';

    if(isset($_GET['removeid'])){

        $id=$_GET['removeid'];



        $sql="delete from userinfo where id = $id";

        $result=mysqli_query($con,$sql);

        if($result){

            echo "<script> alert('your account is deleted!'); window.location.href = 'index.php'; </script>";



        }else{

            die(mysqli_error($con));

        }

    }



?>

