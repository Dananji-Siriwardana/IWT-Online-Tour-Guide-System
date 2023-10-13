

<?php require "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>LOGIN</title>
<link rel="stylesheet" href="mystyles.css">
</head>
<body>



<!-- <form action ="insert" method = "post"> -->

<!-- Total OT <input type = "text" name = "tot"><br> -->
<!-- Total Leave Taken <input type = "text" name = "tlt"><br> -->
<!-- Month <input type = "text" name = "month"><br> -->
<!-- Total Days Worked <input type = "text" name = "tdw"><br> -->
<h1 font color = "white"><center>LOGIN IN TO YOUR ACCOUNT</center></h1>
<div class="formdiv">
<?php 
                 if (isset($_GET['errors'])) {
                    echo '<script type="text/javascript"> alert ("Invalid Username or password ") </script>' ;
                }
            ?>
 
      <form action="log.php" method = "post">
     <h2> LOGIN</h2>
     
     
     <table>

			<tr>
				<td>Enter E-mail</td>
				<td><input type="text" name = "email" placeholder="Enter Email" required></td>
			</tr>
			<tr>
				<td>Enter Password</td>
				<td><input type="text" name = "password" placeholder="Enter Password" required></td>
			</tr>
			

			
			
<!--       Employee ID<input type="text" name = "sid" placeholder="enter" required> -->
         
<!--      Total Over Time<input type="text" name = "tot" placeholder="Twenty 20h" required><br> -->
<!--         Total Leave Taken<input type="text" name = "tlt" placeholder="Enter Days in Words(*)" required> -->
<!--           Month<select name = "month" required> -->
<!--             <option value = "january">January</option> -->
<!--             <option value = "febrary">February</option> -->
<!--             <option value = "january">March</option> -->
<!--             <option value = "january">April</option> -->
<!--             <option value = "january">May</option> -->
<!--             <option value = "january">June</option> -->
<!--             <option value = "january">July</option> -->
<!--             <option value = "january">August</option> -->
<!--             <option value = "january">September</option> -->
<!--             <option value = "january">October</option> -->
<!--             <option value = "january">November</option> -->
<!--             <option value = "january">December</option> -->
<!--             </select> -->
<!--           Total Days Worked<input type="text" name = "tdw" placeholder="Enter Date" required> -->
            
<tr>
<td colspan="2"><input type="submit" name="submit" value="LOGIN"> </td>
</tr>

    
 </table>
 
 <p><center>Don't have an account?<a href="index.php">SIGN UP</a></center></p>
      </form>
    </div>

</body>
</html>