<?php
session_start();
include 'connection.php';

?>




<!DOCTYPE html>

<html>

    <head>
    

        <title>My Account</title>

        <link rel="stylesheet" href="mystyles.css">

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
.w3-button {width:150px;}
</style>
    </head>

    <body >

        <div class = "container">

        <button class ="w3-button w3-orange" ><a href = "tour.php">Home</a>

    </button>
    <div class = "list">
    <table cellpadding = "25" class = "center">

  <tr>

    <th>ID</th>

    <th>NAME</th>

    <th>EMAIL</th>

    <th>Password</th>

    <th>Contact Number</th>

    <th>Country</th>

    <th>City</th>

    <th>Gender</th>

    <th>Actions</th>

  </tr>

  <?php

    $sql="Select * from userinfo where id = ".$_SESSION['id'];

    $result = mysqli_query($con,$sql);

    if($result){

        while($row=mysqli_fetch_assoc($result)){

            $id=$row['id'];

            $name=$row['name'];
    
            $email=$row['email'];
    
            $password=$row['password'];
    
            $contactNo=$row['contactNo'];
    
            $country=$row['country'];
    
             $city=$row['city'];
    
            $gender=$row['gender'];


            echo '<tr>

            <th>'.$id.'</th>

            <td>'.$name.'</td>

            <td>'.$email.'</td>

            <td>'.$password.'</td>

            <td>'.$contactNo.'</td>

            <td>'.$country.'</td>

            <td>'.$city.'</td>
            
            <td>'.$gender.'</td>

            <td>
            <div class="w3-container">
            <button class="w3-button w3-deep-orange"><a href ="update.php?updateid='.$id.'">UPDATE</a></button>

            <button class="w3-button w3-red"><a href ="remove.php?removeid='.$id.'">DELETE</a></button>
</div>
            </td>

            </tr>';

        }

    }

  ?>

 

 

 
  </div>
</table>



        </div>

       

    </body>

</html>