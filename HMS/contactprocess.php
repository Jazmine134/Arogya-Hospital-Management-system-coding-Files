<?php

//validation 1 - Leave feild empty 

$name = $_POST['name']?? "";
$email = $_POST['email']?? "";
$message = $_POST['message']?? "";

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];



//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//generate sql
$sql = "INSERT INTO messages( name, email, message) 
        VALUES ('$name', '$email', '$message');";

//send sql to database management system
$res = mysqli_query($con,$sql);
if($res){
    //redirect back to registration form
    header("location:contact.php");
}else{
    $errors = mysqli_error($con);
    die($errors);
}