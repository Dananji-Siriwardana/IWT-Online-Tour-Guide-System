<?php  require "connection.php";  



session_start();

$id=$_GET['updateid'];

$sql="Select * from userinfo where id = ".$id;

$result=mysqli_query($con,$sql);

$row=mysqli_fetch_assoc($result);


            $name=$row['name'];
    
            $email=$row['email'];
    
            $password=$row['password'];
    
            $contactNo=$row['contactNo'];
    
            $country=$row['country'];
    
             $city=$row['city'];
    
            $gender=$row['gender'];

if(isset($_POST['update'])){

    $name=$_POST['name'];
    
    $email=$_POST['email'];
    
    $password=$_POST['password'];
    
    $contactNo=$_POST['contactNo'];
    
    $country=$_POST['country'];
    
    $city=$_POST['city'];
    
 





  $sql1="update userinfo set name='$name',email='$email',password='$password',contactNo='$contactNo',country='$country',city='$city',gender='$gender' where id =$id";

  $result1=mysqli_query($con,$sql1);
  
  if($result1){

   echo "<script> alert('your Account is updated!'); window.location.href = 'main.php'; </script>";

  }else{

    die(mysqli_error($con));

  }

}







?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="../css/slip.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">update Details</div>
    <div class="content">
      <form action="#" method = "post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name ="name" placeholder="Enter your name" value ="<?php echo $row['name']?>" >
          </div>
          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name = "email" placeholder="Enter your email" value ="<?php echo $row['email']?>" readonly >
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name = "contactNo" placeholder="Enter your number" value ="<?php echo $row['contactNo']?>">
          </div>
          <div class="input-box">
            <span class="details">Country</span>
            <input type="text" name = "country" placeholder="Enter Country"value ="<?php echo $row['country']?>">
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <input type="text" name = "city" placeholder="Enter City" value ="<?php echo $row['city']?>" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" value ="<?php echo $row['password']?>" required>
          </div>
          
        </div>
        <div class="gender-details" >
          <input type="radio" name="gender" id="dot-1" value = "male" value ="<?php echo $row['gender']?>">
          <input type="radio" name="gender" id="dot-2" value = "female" value ="<?php echo $row['gender']?>">
          <input type="radio" name="gender" id="dot-3" value = "not prefered" value ="<?php echo $row['gender']?>">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="update" name="update">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
