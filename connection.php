<?php

    
    //create the connection


    define ("DB_HOST" , "localhost");

    define ("DB_USER" , "root");

    define ("DB_PASSWORD" , "0779825509");

    define ("DB_DATABASE" , "user");

   

    $con = new mysqli(DB_HOST , DB_USER , DB_PASSWORD  , DB_DATABASE);

   

   

    if($con -> connect_error)

    {  

        die("Connection Failed , " .$con -> connect_error);

   

    }



   

   

   

?>