<?php

//File to establish connection. Include this file to connect to database.    
//To connect to database, use the following method.
    $connection = mysqli_connect('localhost', 'root', '', 'sample_project');
    
    //Checking if connection established.
    if(!$connection){
        die("Connection failed");//die("Message") stops execution immediately and echoes the error message.
    }
    /*else{
        echo "Connection established";
    }*/

?>