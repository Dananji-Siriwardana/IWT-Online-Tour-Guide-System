
<?php require "connection.php";
session_start();

if(isset($_POST['register'])){

 

    $name=$_POST['name'];
    
    $email=$_POST['email'];
    
    $password=$_POST['password'];
    
    $contactNo=$_POST['contactNo'];
    
    $country=$_POST['country'];
    
    $city=$_POST['city'];
    
    $gender=$_POST['gender'];



  $sql="INSERT INTO userinfo (name,email,password,contactNo,country,city,gender) VALUES ('$name','$email','$password','$contactNo','$country','$city','$gender')";

  $result=mysqli_query($con,$sql);

  if($result){

   echo "<script> alert('your feedback is done!'); window.location.href = 'index.php'; </script>";

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
    <div class="title">Registration</div>
    <div class="content">
      <form action="insert.php" method = "post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name ="name" placeholder="Enter your name" required>
          </div>
          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name = "email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name = "contactNo" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Country</span>
            <input type="text" name = "country" placeholder="Enter Country" required>
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <input type="text" name = "city" placeholder="Enter City" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="pass" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="gender-details" >
          <input type="radio" name="gender" id="dot-1" value = "male">
          <input type="radio" name="gender" id="dot-2" value = "female">
          <input type="radio" name="gender" id="dot-3" value = "not prefered">
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
          <input type="submit" value="Register" name="register">
        </div>
        <p>Already Have an Account?<a href = index1.php> LOGIN</a></p>
      </form>
    </div>
  </div>

</body>
</html>
