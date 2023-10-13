<?php session_start(); ?>
<?php
include 'connection.php';

if (isset($_POST['submit'])) {

    $errors = array();

    if (empty($errors)) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
       

        $sql = "SELECT * FROM userinfo WHERE email = '$email' AND password ='$password' LIMIT 1";

        $result = mysqli_query($con, $sql);

        if ($result) {

            if (mysqli_num_rows($result) == 1) {

                $userinfo = mysqli_fetch_assoc($result);
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['name'] = $userinfo['name'];
                
                header('Location: tour.php');


            }
            else
		{
            $errors[] = 'Invalid E-Mail/Password';
            header('Location: index1.php?errors=error');
		}
		}
        else {
            $errors[] = 'Database query failed'; 
            header('Location: index1.php?errors=failed');
        }  
}
}
?>